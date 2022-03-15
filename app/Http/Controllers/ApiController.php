<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getFamilles()
    {
        return response()->json([
            'famiiles' => Famille::all()
        ]);
    }
}
