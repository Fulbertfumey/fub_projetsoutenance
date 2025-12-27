<?php

// app/Models/Offer.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offer extends Model {
    protected $fillable = ['user_id','category_id','titre','description','prix','statut','vues','clics'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function reservations(): HasMany { return $this->hasMany(Reservation::class); }
}
