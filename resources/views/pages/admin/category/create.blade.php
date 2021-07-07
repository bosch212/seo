@extends('layouts.admin')
@section('sub-judul', 'Add Category')
@section('title', 'Create Category')

@section('content')

@if (Session::has ('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('category-store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name Category</label>
        <input type="text" class="form-control" name="name" id="name">
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Save Category</button>
    </div>

</form>
@endsection