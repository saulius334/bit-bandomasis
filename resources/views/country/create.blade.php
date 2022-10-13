@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    <h2>New Country</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('c_store')}}" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name of the Country</span>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Season</span>
                            <input type="text" name="season" class="form-control" value="{{old('season')}}">
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
