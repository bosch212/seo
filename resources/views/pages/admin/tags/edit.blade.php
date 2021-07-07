@extends('layouts.admin')
@section('sub-judul', 'Edit Tag')
@section('title', 'Edit Tag')

@section('content')

@if (Session::has ('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('tag.update', $tag->id) }}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name Tag</label>
        <input type="text" class="form-control" name="name" value="{{$tag->name}}">
        @if ($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Tag</button>
    </div>

</form>
@endsection