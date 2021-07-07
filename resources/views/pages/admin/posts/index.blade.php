@extends('layouts.admin')
@section('sub-judul', 'Post')
@section('title', 'Posts')

@section('content')

    <a href="{{ route('post.create') }}" class="btn btn-primary mb-2 btn-sm">Create Post</a>
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Post</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">tag</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            @foreach ($post as $item)
            <tbody>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->judul }}</td>
                    <td class="text-center">{{ $item->category->name }}</td>
                    <td class="text-center"><img src="{{ asset($item->gambar) }}" class="img-fluid" style="width: 100px"></td>
                    {{-- <td class="text-center">
                        @foreach ($item->tags as $tag)
                            <ul>
                                <li>{{$tag->name}}</li>
                            </ul>
                        @endforeach
                    </td> --}}
                    <td class="text-center">
                        <form action="{{ route('post.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <a href="{{ route('post.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>   
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
@endsection