@extends('layouts.landing')

@section('content')
    <!--- Map Vue --->
    <div class="map">
        <leaflet-map _markers="{{ $markers }}"></leaflet-map>
    </div>
@endsection
