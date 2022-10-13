@extends('layouts.app')
@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Available Hotels</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($hotels as $hotel)
                        <li class="list-group-item">
                            <div class="movies-list">
                                <div class="content">
                                    <h3><span>Country: </span>{{$hotel->getCountry->name}}</h2>
                                    <h3><span>Hotel Name: </span>{{$hotel->hotelName}}</h2>
                                    <h3><span>Stay duration: </span>{{$hotel->durationStart}} - {{$hotel->durationEnd}}</h2>
                                    <h3><span>Hotel Name: </span>{{$hotel->hotelName}}</h2>
                                    <h3><span>Price: </span>{{$hotel->price}}</h4>
                                    <h3><span>Reserved: </span>{{$hotel->taken ? "Yes" : "No"}}</h4>
                                    {{-- @if($hotel->getPhotos()->count())
                                    <h5><a href="{{$hotel->lastImageUrl()}}" target="_BLANK">Photos[{{$hotel->getPhotos()->count()}}]</a></h5>
                                    @endif --}}
                                </div>
                                <div class="buttons">
                                    <a href="{{route('h_show', $hotel)}}" class="btn btn-info">Show</a>
                                    @if(Auth::user()->role >= 10)
                                    <a href="{{route('h_edit', $hotel)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('h_delete', $hotel)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No hotels found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection