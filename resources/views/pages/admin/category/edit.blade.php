@extends('layouts.admin')
@section('sub-judul', 'Edit Category')
@section('title', 'Edit Category')

@section('content')

@if (Session::has ('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('category-update', $category->id) }}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name Category</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Category</button>
    </div>

</form>
@endsection