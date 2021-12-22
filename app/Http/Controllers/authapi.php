<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class authapi extends Controller
{
    public function chackname (Request $request) {
        $email =$request->input("name");
      $users = DB::table('users')->where('email', $email)->count();
      if($users < 1){
    return 0;
      }else{
         $getuser= DB::table('users')->where('email', $email)->first();
         return $getuser->name;
      }
    
    
    }
    public function chackpass (Request $request) {
        $email =$request->input("email");
        $pass =$request->input("pass");
      $users = DB::table('users')->where('password', $pass)->where('email', $email)->count();
      if($users < 1){
    return 0;
      }else{
        return 1;
      }
    
    
    }
    public function chackinfo (Request $request) {
        $email =$request->input("email");
        $pass =$request->input("pass");
      $users = DB::table('users')->where('password', $pass)->where('email', $email)->count();
      
      if($users < 1){
    return 0;
      }else{
          
        return 1;

      }
    
    
    }
    public function setcookie(Request $request){
        $minite = 5;

        $name =$request->input("name");
        $email =$request->input("email");
        $response=new Response($email);
        $response->withCookie(cookie("name","name",$minite));
        
        return $response;
        
    }
    public function myuser(Request $request){

        $email =$request->input("email");
        
        $getuser= DB::table('users')->where('email', $email)->get();
         return $getuser;
        
        
    }
    public function getcookie(Request $request){

        $value =$request->cookie("name");
        
        return $value ;
        
    }
    public function postadd(Request $request){

       $title= $request->file("title") ;
       $dis=  $request->input("dis") ;

       if ( $request->hasFile('title')){

      
            $file = $request->file('title');
            $name = $file->getClientOriginalName();
            $file->move('images' , $name);
            $inputs = $request->all();
            $inputs['path'] = $name;
    
    }else{
      $name =$title ;
    }


       $sql=DB::table('post')->insert([
        'post_titile' => $name,
        'post_dis' => $dis
    ]);
    if($sql){
      return "Done";
  }
        
    }
    public function postget(Request $request ){
      $GETDATA= DB::table('post')->get();
         return $GETDATA;
    }

    public function newaccount(Request $request){

        $name =$request->input("name");
        $email =$request->input("email");
        $pass =$request->input("pass");


        $users = DB::table('users')->where('email', $email)->count();
      if($users < 1){

        $sql=DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $pass
        ]);
        if($sql){
            return $name;
        }

      }else{
        return 1;
      }


        
        
        
    }

    
}
