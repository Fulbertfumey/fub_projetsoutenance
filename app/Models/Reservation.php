<?php

// app/Models/Reservation.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model {
    protected $fillable = ['offer_id','client_id','type','date_souhaitee','statut','message'];
    protected $casts = ['date_souhaitee'=>'datetime'];
    public function offer(): BelongsTo { return $this->belongsTo(Offer::class); }
    public function client(): BelongsTo { return $this->belongsTo(User::class, 'client_id'); }
}
