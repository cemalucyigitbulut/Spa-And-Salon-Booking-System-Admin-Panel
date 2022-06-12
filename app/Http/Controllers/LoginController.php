<?php

namespace App\Http\Controllers;

use App\models\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(Request $request){
        $reservations = Booking::paginate(10);
        return view('reservations.index',['reservations'=>$reservations]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('status' ,'Invalid credentials');
        }
        $reservations = Booking::paginate(10); // Collection
        return view('reservations.index',[
            'reservations'=>$reservations
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $reservations = Booking::query()
        ->where('name_surname','LIKE',"%{$search}%")
        ->paginate(10);

        return view('reservations.index',['reservations'=>$reservations]);
    }

    public function inputServed(Request $request){
        $id = $request->input("served");
        DB::table('bookings')->where('id',$id)->update(['status'=>'Served']);

        return back();
    }

    public function inputCancelled(Request $request){
        $id = $request->input("cancelled");
        DB::table('bookings')->where('id',$id)->update(['status'=>'Cancelled']);

        return back();
    }
}
