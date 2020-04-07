<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MailController;

use App\Mail\ConnectTalent;
use Illuminate\Http\Request;
use App\User;


use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sourcePath= $request->path();
        $welcomeName = Auth::user();
        
       return view('/user/profile',compact('welcomeName'));
}
    public function publicProfile(){
        $welcomeName = Auth::user();
        return view('/user/publicprofile',compact('welcomeName'));
    }
    public function updateProfile(Request $request){
        
        
        // $user = App\User::find(1);
        
        $welcomeName = Auth::user();
        
      
        $user = User::find($welcomeName->id);
        $user -> email = $request->email;
        $user -> username = $request->name;
        
        // $user -> password = $request->password;
        $user -> phone = $request->phone;
        $user -> location = $request->location ;
        $user -> talent = $request -> talent;
        $user -> about = $request -> about;
        $user -> first_name = $request -> firstname;
        $user -> last_name = $request -> lastname;

        $user -> update();
 
    
    

         
    
       

        return view('user/publicprofile',compact('welcomeName'));

}

}

