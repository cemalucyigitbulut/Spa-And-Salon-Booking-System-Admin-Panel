<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name_surname',
        'date',
        'service',
        'period',
        'persons',
        'payment_id',
        'status'
    ];

}