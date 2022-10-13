@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Country</h2>
                </div>
                <div class="card-body">
                    <div class="movie-show">
                            <h1>{{$country->name}}</h1>
                        <div class="line"><small>Season:</small>
                            <h5>{{$country->season}}</h5>
                        </div>
                        <div class="hotelsList">
                            @forelse($country->getHotels as $hotel)
                    <li class="list-group-item">
                        {{$hotel->hotelName}}
                    </li>
                    @empty
                    <li class="list-group-item">No hotels found</li>
                    @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection