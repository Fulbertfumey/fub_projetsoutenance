<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan',
        'title',
        'description',
        'image',
        'link',
        'statut', // ✅ important
    ];

    // Relation avec l’utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}