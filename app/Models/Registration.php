<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pendaftaran';
    // protected $fillable = 
    // [
    //     'user_id', 
    //     'asal_instansi', 
    //     'isPaid', 
    //     'paymentProof'
    // ];
    protected $guarded =['id'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
