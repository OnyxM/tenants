<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
    ];

    protected $hidden=[
        'created_at', 'updated_at',
    ];

    public function factureEaux()
    {
        return $this->hasMany(FactureEau::class);
    }

    public function factureElectricities()
    {
        return $this->hasMany(FactureElectricity::class);
    }
}
