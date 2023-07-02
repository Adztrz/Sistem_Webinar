<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
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

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
