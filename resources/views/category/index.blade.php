@extends('layouts.app')

@section('content')
<div class="container --content">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h2>Categories</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                {{-- <button type="submit" class="btn btn-primary m-1">Sort</button> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="container">
                                        <div class="row">

                                            {{-- <div class="col-4"> --}}
                                                {{-- <button type="submit" class="btn btn-primary m-1">results in page</button> --}}
                                                {{-- <a href="{{route('c_index')}}" class="btn btn-secondary m-1">Reset</a> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($categories as $category)
                        <li class="list-group-item">
                            <div class="categories-list">
                                <div class="content">
                                    <h2>{{$category->title}}</h2>
                                </div>
                                <div class="buttons">
                                    <a href="{{route('c_show', $category)}}" class="btn btn-info">Show</a>
                                    <a href="{{route('c_edit', $category)}}" class="btn btn-success">Edit</a>
                                    <form action="{{route('c_delete', $category)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No categories found</li>
                        @endforelse
                    </ul>
                </div>
                <div class="me-3 mx-3">
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection