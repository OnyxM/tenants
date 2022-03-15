<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureEau extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'amount',
        'famille_id',
    ];

    protected $hidden=[
        'created_at', 'updated_at',
    ];

    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }
}
