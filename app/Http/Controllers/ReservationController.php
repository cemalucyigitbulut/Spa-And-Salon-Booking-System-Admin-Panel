<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Booking;

class ReservationController extends Controller
{
    public function index(){
        $reservations = Booking::orderBy('created_at','desc'); // Collection
        
        return view('reservations.index',[
            'reservations'=>$reservations
        ]);
    }
}
