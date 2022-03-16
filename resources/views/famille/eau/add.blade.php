@extends("famille.layout")

@section("page-wrapper")
    <div class="content container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>Nouvel Enregistrement - Facture d'eau</h2>
                    </div>
                    <div class="service-fields mb-3">
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
                        </div>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn" id="calculations" type="button">Calculer</button>
                    </div>

                    <form action="{{route('famille.fac_eau.store', ['famille_slug'=>$famille->slug])}}" method="POST" class="mt-4 d-none" id="results">
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
        $(document).on('click', "#calculations", function(evt){
            $("#results").addClass("d-none");
            let l_indice = $("input[name='last_indice']").val(),
                n_indice = $("input[name='indice']").val(),
                conso = Math.round( (n_indice-l_indice + Number.EPSILON) * 10) / 10,
                meter_cube_price = parseInt("{{$meter_cube_price}}"),
                tva = parseFloat("{{$tva_value}}".replace(",", ".")).toFixed(4);

            var prix1 = conso * meter_cube_price,
                prix2 = prix1 * tva,
                prix3 = 350,
                prix4 = Math.round(prix1 + prix2 + prix3);

            $("#month_info").html($("input[name='periode']").val()); $("input[name='month']").val($("input[name='periode']").val());
            $("#indice_info").html(conso); $("input[name='indice']").val(n_indice);
            $("#price_info").html(new Intl.NumberFormat().format(prix4) + " XAF"); $("input[name='price']").val(prix4);

            $("#results").removeClass("d-none");
        });
    </script>
@endsection
