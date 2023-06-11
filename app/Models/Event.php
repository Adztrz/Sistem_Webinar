<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'user_id', 
        'eventDate', 
        'eventLocation', 
        'isPaid', 
        'regisStartDate', 
        'regisEndDate', 
        'certificate', 
        'certificateStartDate', 
        'kategoriEvent'

    ];


}
