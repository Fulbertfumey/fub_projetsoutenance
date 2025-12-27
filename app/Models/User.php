<?php

// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use Notifiable;
       use HasFactory;  

    protected $fillable = [
        'nom','prenom','email','telephone','password','role'
    ];

    protected $hidden = ['password','remember_token'];

    public function profile(): HasOne {
        return $this->hasOne(Profile::class);
    }

    public function offers(): HasMany {
        return $this->hasMany(Offer::class);
    }

    public function reservations(): HasMany {
        return $this->hasMany(Reservation::class, 'client_id');
    }

    public function conversations() {
    return $this->belongsToMany(Conversation::class)->withTimestamps();
}

public function user()
{
    return $this->belongsTo(User::class);
}


public function reports() {
    return $this->hasMany(Report::class, 'reporter_id');
}

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isPrestataire(): bool { return $this->role === 'prestataire'; }
    public function isClient(): bool { return $this->role === 'client'; }
}
