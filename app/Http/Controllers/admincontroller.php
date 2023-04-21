<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use DateTimeZone;
use DateTime;

use Cviebrock\EloquentSluggable\Services\SlugService;

class admincontroller extends Controller
{
    //
    function index(Request $request )
    { 
        $email=$request->session()->get('email');
        $login = DB::table('users')->where('email',$email)->get();

        return view('dashboard', (compact('login')));
    }
    
    public function post(){
        return view('post');
    }

    function login_check(Request $request){
        $email = $request->input('email'); 
        // $password=$request->input('password'); 
        $row=count(User::select(['email'])
        // ->where('password',"$password")
        ->where('email',"$email")->get());
 
               if($row>0){ 
                $user_type = DB::table('users')->where('email', "$email")->value('user_type');
                $request->session()->put('user_type',$user_type);
                $request->session()->put('email',"$email");  
                 $dt = new DateTime();
                 $tz = new DateTimeZone('Asia/Kolkata'); // or whatever zone you're after
                 $dt->setTimezone($tz);
                 $date=$dt->format('Y-m-d H:i:s');
                 
                 User::where('email', $email)
                 ->update(['login' => $date]);
                
                
                return redirect('dashboard');

                }else{

                   return redirect('login');
                   }
    }



    public function adminprofile(Request $request)
    {
    $email=$request->session()->get('email');
    $user =DB::table('users')->get()->where('email',$email); 
    return view('/adminprofile',(['user'=>$user]));
    }

    public function editadmin($id)
     { 
       $da = DB::table('users')->where('id', "$id")->get();
       return view('editadmin',compact('da'));
     }

     function editadmin_check(Request $request){
         $id=$request->id; 
         $fullname= $request->fullname;
         $phone= $request->phone; 
         $dob=$request->dob; 
         $pass=$request->pass;
          
  
         $obj = User::find($id);
         
        $obj->fullname=$fullname;
        $obj->phone=$phone;
      
        $obj->birthday=$dob;
    
        $obj->password=$pass;
      
         $k=$obj->save();
         if($k){
                 return redirect('adminprofile');
         }else{
             return "Error in Updating";
         }
     }

     public function addPost(){
        Post::create(['title'=>request('title')]);
        return redirect()->back();
    }

    public function getSlug(){

      $slug =  SlugService::createSlug(Post::class,'slug',request('title'));

      return response()->json(['slug'=>$slug]);
    }


    public function getpost(Request $request){

        $post =DB::table('posts')->get();

        return view('/post',(['post'=>$post]));



    }
     
}
