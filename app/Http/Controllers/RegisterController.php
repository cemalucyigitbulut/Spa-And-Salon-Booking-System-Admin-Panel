<?php

namespace App\Http\Controllers;

use App\models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index() 
     {
         return view('register.index');
     }

     public function store(Request $request){
         //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);
        
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        //sign-in -> Redirect
        auth()->attempt($request->only('email','password')); // User

        $reservations = Booking::paginate(10); // Collection

        return view('reservations.index',[
            'reservations'=>$reservations
        ]);
     }
}