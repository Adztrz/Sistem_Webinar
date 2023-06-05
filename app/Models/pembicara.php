<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembicara extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pembicara';
    protected $fillable = [
        'event_id',
        'namaPembicara',
        'asalInstansi',
        'topikMateri'
    ];

    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id', 'id_event');
    }

}
