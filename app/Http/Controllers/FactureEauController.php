<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FactureEauController extends Controller
{
    public function add($famille_slug)
    {
        $famille = Famille::whereSlug($famille_slug)->first();

        if(is_null($famille)){
            return redirect()->route('index');
        }

        die("Afficher la vue pour les infos d'une facture d'eau");
    }
}
