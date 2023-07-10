<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    // protected $fillable = 
    // [ 
    //     'eventName',
    //     'eventDate',
    //     'poster', 
    //     'eventLocation', 
    //     'isPaid', 
    //     'regisStartDate', 
    //     'regisEndDate', 
    //     'certificate', 
    //     'certificateStartDate', 
    //     'kategoriEvent'
    // ];

    protected $guarded = ['id'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speaker()
    {
        return $this->hasMany(Speaker::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}
