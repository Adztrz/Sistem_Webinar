namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
class User extends Model
=======

class User extends Authenticatable
>>>>>>> parent of 1761990 (Recreated Models)
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events(){
        return $this->hasMany(events::class, 'user id', 'id_user');
    }

    public function pendaftaran(){
        return $this->hasMany(pendaftaran::class, 'user_id', 'id_user');
    }
<<<<<<< HEAD
    use HasFactory;
}
=======
}
>>>>>>> parent of 1761990 (Recreated Models)
