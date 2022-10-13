@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit hotel</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('h_update', $hotel)}}" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Hotel Name</span>
                            <input type="text" name="hotelName" class="form-control" value="{{old('title', $hotel->hotelName)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Duration of availability</span>
                            <input type="date" name="durationStart" class="form-control" value="{{old('durationStart')}}">
                            <input type="date" name="durationEnd" class="form-control" value="{{old('durationEnd')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="text" name="price" class="form-control" value="{{old('price', $hotel->price)}}">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Photo</span>
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-text">Reserve ? </span>
                            <input type="checkbox" name="taken" class="form-control">
                        </div>
                        <div class="img-small-ch mt-3">
                            @if($hotel->photo)
                            <div class="img">
                                <img src="{{ Storage::url($hotel->photo) }}" />
                            </div>
                            @empty
                            <h2>No photos yet.</h2>
                            @endforelse
                        </div>
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-secondary mt-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection