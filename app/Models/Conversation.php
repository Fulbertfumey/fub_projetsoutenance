<?php


// app/Models/Conversation.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conversation extends Model {
    protected $fillable = ['reservation_id'];
    public function users(): BelongsToMany { return $this->belongsToMany(User::class)->withTimestamps(); }
    public function messages(): HasMany { return $this->hasMany(Message::class); }
    public function reservation(): BelongsTo { return $this->belongsTo(Reservation::class); }
}