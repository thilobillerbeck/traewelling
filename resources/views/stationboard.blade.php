@extends('layouts.app')

@section('content')
    @include('includes.station-autocomplete')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Stationboard</div>

                <div class="card-body">
                    <table class="table table-dark table-borderless table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Line</th>
                                <th>Destination</th>
                                <th>Departure</th>
                                <th>Delay</th>
                            </tr>
                        </thead>
                    @foreach($departures as $departure)
                        <tr>
                            <td>@if (file_exists(public_path('img/'.$departure->line->product.'.svg')))
                                    <img class="product-icon" src="{{ asset('img/'.$departure->line->product.'.svg') }}">
                                @else
                                    <i class="fa fa-train"></i>
                                @endif</td>
                             {{dd($departure)}}
                            <td>{{ $departure->line->name }}</td>
                            <td>{{ $departure->direction }}</td>
                            <td>{{ date('H:i', strtotime($departure->when)) }} Uhr</td>
                            <td>{{ $departure->delay }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
