<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_notifikasi';
    protected $fillable = 
    [
        'event_id', 
        'namaEvent', 
        'tanggal', 
        'topikMateri', 
        'sertifikat'
    ];

  // Relationships
  public function event()
  {
      return $this->belongsTo(Event::class);
  }
}
