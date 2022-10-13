@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Country</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_update', $country)}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Country Name</span>
                            <input type="text" name="name" class="form-control" value="{{old('name', $country->name)}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Season</span>
                            <input type="text" name="season" class="form-control" value="{{old('season', $country->season)}}">
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