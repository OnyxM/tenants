<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureElectricity extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'indice',
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
