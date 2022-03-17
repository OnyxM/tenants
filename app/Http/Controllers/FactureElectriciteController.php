<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\FactureElectricity;

class FactureElectriciteController extends Controller
{
    public function add($famille_slug)
    {
        $famille = Famille::whereSlug($famille_slug)->first();

        if(is_null($famille)){
            return redirect()->route('index');
        }

        $data = [
            'title' => "Nouvelle facture d'électricité - ",
            'famille' => $famille,
            'l_indice' => $famille->factureElectricities()->orderBy('id', "DESC")->first()->indice ?? 0,
            'tva_value' => Setting::where('name', 'tva')->first()->value,
            'elec_unit_prices' => Setting::where('name', 'elec_unit_prices')->first()->value,
        ];

        return view("famille.elect.add", $data);
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

        FactureElectricity::updateOrCreate(['date' => $request->month, 'famille_id' => $request->famille],[
            'date' => $request->month,
            'indice' => $request->indice,
            'amount' => $request->price,
            'famille_id' => $request->famille,
        ]);

        return redirect()->route('famille.details', ['famille_slug' =>$famille->slug ]);
    }

    public function delete($famille_slug, $facture_id)
    {
        $facture = FactureElectricity::find($facture_id);

        if(isset($facture) && $facture->famille->slug === $famille_slug){
            $facture->delete();
        }

        return redirect()->route('famille.details', ['famille_slug' => $facture->famille->slug ]);
    }
}
