@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Hotel</h2>
                </div>
                <div class="card-body">
                    <div class="movie-show">
                        <div class="line"><small>Hotel Name:</small>
                            <h5>{{$hotel->hotelName}}</h5>
                        </div>
                        <div class="line"><small>Price:</small>
                            <h5>{{$hotel->price}}</h5>
                        </div>
                        <div class="line"><small>Duration:</small>
                            <h5>{{$hotel->durationStart}} - {{$hotel->durationEnd}}</h5>
                        </div>
                        <div class="line"><small>Available ?</small>
                            <h5>{{$hotel->taken}}</h5>
                        </div>
                        {{-- <div class="line"><small>Photo:</small>
                            <h5>{{$hotel->photo}}</h5>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection