<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function caterings(): HasMany
    {
        return $this->hasMany(Catering::class);
    }

    public function eventComments(): HasMany
    {
        return $this->hasMany(EventComment::class);
    }

    public function createByEmail(array $params): self
    {
        $firstName = $params['first_name'] ?? null;
        $lastName  = $params['last_name'] ?? null;

        $fullName = (empty($firstName) && empty($lastName)) ?
                        explode('@', $params['email'])[0] :
                        "{$firstName} {$lastName}";

        return $this->updateOrCreate([
            'email'  => $params['email'],
        ], [
            'name'  => $fullName,
            'password'  => Str::random(40),
        ]);

    }

    // On crude
    public function hideOnCrude()
    {
        return [
            'email_verified_at',
        ];
    }

}
