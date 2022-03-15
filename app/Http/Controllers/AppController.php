<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Gestion des Locataires - ",
            'familles' => Famille::all(),
        ];

        return view("app.index", $data);
    }
}
