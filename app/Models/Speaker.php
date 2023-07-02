<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembicara';
    protected $fillable = 
    [
        'event_id',
        'namaPembicara',
        'asalInstansi',
        'topikMateri'
    ];

     // Relationships
     public function event()
     {
         return $this->belongsTo(Event::class);
     }

}
