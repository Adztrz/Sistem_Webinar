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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function pembicaras()
    {
        return $this->hasMany(Pembicara::class, 'event_id', 'id_event');
    }

    public function notifikasi()
    {
        return $this->hasOne(Notifikasi::class, 'event_id', 'id_event');
    }
}
