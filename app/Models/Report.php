<?php

// app/Models/Report.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model {
    protected $fillable = ['reservation_id','reported_user_id','reporter_id','motif','details','statut'];
    public function reservation(): BelongsTo { return $this->belongsTo(Reservation::class); }
    public function reportedUser(): BelongsTo { return $this->belongsTo(User::class, 'reported_user_id'); }
    public function reporter(): BelongsTo { return $this->belongsTo(User::class, 'reporter_id'); }
}