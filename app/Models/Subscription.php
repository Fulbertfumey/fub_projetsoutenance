<?php


// app/Models/Subscription.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model {
    protected $fillable = ['user_id','plan','date_debut','date_fin','actif'];
    protected $casts = ['date_debut'=>'date','date_fin'=>'date','actif'=>'boolean'];
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}