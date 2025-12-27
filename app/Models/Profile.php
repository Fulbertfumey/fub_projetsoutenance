<?php

// app/Models/Profile.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model {
    protected $fillable = ['user_id','bio','photo','competences','disponibilites','document'];
    protected $casts = ['competences'=>'array','disponibilites'=>'array'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}