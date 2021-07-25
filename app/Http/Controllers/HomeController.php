<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Student;
use DB;

class HomeController extends Controller
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
    public function index()
    {
        $students =  DB::table('students')->where('status','!=','deleted')->count(); 
        $enrolled = Student::where('status','=','enrolled')->count();
        $pending = Student::where('status','=','pending')->count();
        $unenrolled = Student::where('status','=','unenrolled')->count();
        return view('home',compact('students', 'enrolled', 'pending', 'unenrolled'));
        
    }

    function UpdateInfo(Request $request){
           
        $validator = \Validator::make($request->all(),[
         'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
         'first_name'=>'required',
         'last_name'=>'required',
            
        ]);

        if(!$validator->passes()){
            return back()->with('error', 'Incompete fields');
        }else{
             $query = User::find(Auth::user()->id)->update([
                 'email'=>$request->email,
                 'first_name'=>$request->first_name,
                 'last_name'=>$request->last_name,
             ]);

             if(!$query){
                 return back()->with('success','Profile Not Updated');
             }else{
                 return back()->with('error','Profile Updated');
             }
        }
}

}
