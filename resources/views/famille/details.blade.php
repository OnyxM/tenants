@extends("famille.layout")

@section("page-wrapper")
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Historique des Factures d'Eau</h3>
                </div>
                <div class="col-auto text-right">
                    <a href="{{route('famille.fac_eau.add', ['famille_slug'=>$famille->slug])}}" class="btn btn-primary add-button ml-3">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Indice du Mois</th>
                                    <th>Montant</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($famille->factureEaux as $watter_bill)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$watter_bill->date}}</td>
                                        <td>{{$watter_bill->indice}}</td>
                                        <td>{{$watter_bill->amount}}</td>
                                        <td class="text-right">
                                            <a href="{{route('famille.fac_eau.delete',['famille_slug' => $famille->slug,'id' => $watter_bill->id])}}" class="btn btn-sm bg-success-light mr-2">	<i class="fa fa-trash mr-1"></i></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Historique des Factures d'Electricité</h3>
                </div>
                <div class="col-auto text-right">
                    <a href="{{route('famille.fac_electricite.add', ['famille_slug'=>$famille->slug])}}" class="btn btn-primary add-button ml-3">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Indice du Mois</th>
                                    <th>Montant</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $j = 1; @endphp
                                @foreach($famille->factureElectricities as $elect_bill)
                                    <tr>
                                        <td>{{$j}}</td>
                                        <td>{{$elect_bill->date}}</td>
                                        <td>{{$elect_bill->indice}}</td>
                                        <td>{{$elect_bill->amount}}</td>
                                        <td class="text-right">
                                            <a href="{{route('famille.fac_electricite.delete',['famille_slug' => $famille->slug,'id' => $elect_bill->id])}}" class="btn btn-sm bg-success-light mr-2">	<i class="fa fa-trash mr-1"></i></a>
                                        </td>
                                    </tr>
                                    @php $j++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
