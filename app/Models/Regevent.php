<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regevent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = 
    [
        'nama',
        'notelp', 
        'asal_instansi', 
        'sumberinfo' 
        
    ];
}
