<?php

namespace App\Http\Controllers;

use App\Models\FactureEau;
use App\Models\Famille;
use App\Models\Setting;
use Illuminate\Http\Request;

class FactureEauController extends Controller
{
    public function add($famille_slug)
    {
        $famille = Famille::whereSlug($famille_slug)->first();

        if(is_null($famille)){
            return redirect()->route('index');
        }

        $data = [
            'title' => "Nouvelle facture d'eau - ",
            'famille' => $famille,
            'l_indice' => $famille->factureEaux()->orderBy('id', "DESC")->first()->indice ?? 0,
            'meter_cube_price' => Setting::where('name', 'water_meter_cube_price')->first()->value,
            'tva_value' => Setting::where('name', 'water_tva')->first()->value,
        ];

        return view("famille.eau.add", $data);
    }

    public function store(Request $request, $famille_slug)
    {
        $this->validate($request, [
            'famille' => "required|exists:familles,id",
            'month' => "required",
            'indice' => "required",
            'price' => "required",
        ]);

        $famille = Famille::find($request->famille);

        FactureEau::updateOrCreate(['date' => $request->month, 'famille_id' => $request->famille],[
            'date' => $request->month,
            'indice' => $request->indice,
            'amount' => $request->price,
            'famille_id' => $request->famille,
        ]);

        return redirect()->route('famille.details', ['famille_slug' =>$famille->slug ]);
    }

    public function delete($famille_slug, $facture_id)
    {
        $facture = FactureEau::find($facture_id);

        if(isset($facture) && $facture->famille->slug === $famille_slug){
            $facture->delete();
        }

        return redirect()->route('famille.details', ['famille_slug' => $facture->famille->slug ]);
    }
}
