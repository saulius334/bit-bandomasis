@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Hotel</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('h_store')}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                        <select name="country_id" class="form-select mt-3">
                            <option value="0">Choose Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($country->id == old('country_id')) selected @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name of the Hotel</span>
                            <input type="text" name="hotelName" class="form-control" value="{{old('hotelName')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Duration of availability</span>
                            <input type="text" name="durationStart" class="form-control" value="{{old('durationStart')}}">
                            <input type="text" name="durationEnd" class="form-control" value="{{old('durationEnd')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price of stay</span>
                            <input type="text" name="price" class="form-control" value="{{old('price')}}">
                        </div>
                        <div data-clone class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
