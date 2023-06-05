<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = ['user_id', 'noIdentitas', 'noTelp', 'asalInstansi', 'isPaid', 'paymentProof'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
