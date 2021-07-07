@extends('layouts.admin')
@section('sub-judul', 'Edit Post')
@section('title', 'Edit Post')

@section('content')

@if (Session::has ('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('post.update', $post->id) }}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Name Post</label>
        <input type="text" class="form-control" name="judul" value="{{$post->judul}}">
        @if ($errors->has('judul'))
            <span class="text-danger">{{$errors->first('judul')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id" id="category_id">
            <option value="#" holder>Pilih Kategori</option>
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{$item->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="text-danger">{{$errors->first('category_id')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label>Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tag[]">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
      </div>

    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" name="content" id="content" cols="50" rows="10">{{$post->content}}</textarea>
        @if ($errors->has('content'))
            <span class="text-danger">{{$errors->first('content')}}</span>
        @endif
    </div>

    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" class="form-control" name="gambar">
        @if ($errors->has('gambar'))
            <span class="text-danger">{{$errors->first('gambar')}}</span>
        @endif
    </div>

    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Post</button>
    </div>

</form>
@endsection