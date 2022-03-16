<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    public function details($fam_slug)
    {
        $famille = Famille::whereSlug($fam_slug)->first();

        if(is_null($famille)){
            return redirect()->route('index');
        }

        $data = [
            'title' => "Détails de la famille ".$famille->name. " - ",
            'famille' => $famille
        ];

        return view("famille.details", $data);
    }
}
