<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Location;
use App\Models\Relationship;
use App\Models\Personality;
use App\Models\Religion;
use App\Models\Diet;
use App\Models\Allergy;
use App\Models\Language;
class User extends Authenticatable
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
        'password',
        'name', 
        'age', 
        'location_id',
        'relationship_id',
        'personality_id',
        'language_id',
        'religion_id', 
        'dietary_id',
        'allergy_id'

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

     public function location()
    {
        return $this->belongsTo(Location::class);
    }
      public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }
     public function personality()
    {
        return $this->belongsTo(Personality::class);
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }
       public function diet()
    {
        return $this->belongsTo(Diet::class);
    }
    public function allergy()
    {
        return $this->belongsTo(Allergy::class);
    }
     public function languages()
    {
        return $this->hasMany(Language::class);
    }
}
