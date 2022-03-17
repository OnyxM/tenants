@extends("famille.layout")

@section("page-wrapper")
    <div class="content container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>Nouvel Enregistrement - Facture d'électricité</h2>
                    </div>
                    <div class="service-fields mb-3" onchange="hideResults();">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Choisir le Mois<span class="text-danger">*</span></label>
                                    <input class="form-control text-center" type="month" value="{{date('Y-m')}}" requried name="periode">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Indice du Mois Précédent<span class="text-danger">*</span></label>
                                    <input class="form-control text-center" type="number" value="{{$l_indice}}" name="last_indice" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Indice du Mois Actuel<span class="text-danger">*</span></label>
                                    <input class="form-control text-center" type="number" min="{{$l_indice}}" step="0.1" required name="indice">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Choisir le prix unitaire en fonction de la consommation<span class="text-danger">*</span></label>
                                    <select name="unit_price" class="form-control text-center" required>
                                        @foreach(explode(",", $elec_unit_prices) as $unit_price)
                                        <option value="{{$unit_price}}">{{$unit_price}} FCFA</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" id="calculations" type="button">Calculer</button>
                    </div>

                    <hr>

                    <form action="{{route('famille.fac_electricite.store', ['famille_slug'=>$famille->slug])}}" method="POST" class="mt-4 d-none" id="results">
                        @csrf
                        <div class="service-fields mb-3">
                            <div class="section-header text-center">
                                <h2>Récapitulatif</h2>
                                <input type="hidden" name="famille" value="{{$famille->id}}" required>
                                <input type="hidden" name="month" required>
                                <input type="hidden" name="indice" required>
                                <input type="hidden" name="price" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>La consommation pour le mois de <span id="month_info">...</span> est de <span id="indice_info"></span>m<sup>3</sup> </h3>
                                    <h3>Le montant à payer sera donc de <span id="price_info">---</span> </h3>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        function hideResults(){
            $("#results").addClass("d-none");
        }

        $(document).on('click', "#calculations", function(evt){
            $("#results").addClass("d-none");
            $("input[name='indice']").removeClass("is-invalid");
            let l_indice = $("input[name='last_indice']").val(),
                n_indice = $("input[name='indice']").val(),
                unit_price = 79;
            //unit_price = $("input[name='unit_price']").val(),

            if(n_indice == ""){
                $("input[name='indice']").addClass("is-invalid");
                return;
            }

            let conso = Math.round( (n_indice-l_indice + Number.EPSILON) * 10) / 10,
                tva = parseFloat("{{$tva_value}}".replace(",", ".")).toFixed(4);

            var prix1 = conso * unit_price,
                prix2 = prix1 * tva,
                prix4 = Math.round(prix1 + prix2);

            $("#month_info").html($("input[name='periode']").val()); $("input[name='month']").val($("input[name='periode']").val());
            $("#indice_info").html(conso); $("input[name='indice']").val(n_indice);
            $("#price_info").html(new Intl.NumberFormat().format(prix4) + " XAF"); $("input[name='price']").val(prix4);

            $("#results").removeClass("d-none");
        });
    </script>
@endsection
