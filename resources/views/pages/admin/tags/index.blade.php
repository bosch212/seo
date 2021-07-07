@extends('layouts.admin')
@section('sub-judul', 'Tags')
@section('title', 'Tags')

@section('content')

    <a href="{{ route('tag.create') }}" class="btn btn-primary mb-2 btn-sm">Create Tag</a>
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Name Tag</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            @foreach ($tag as $item)
            <tbody>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">
                        <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <a href="{{ route('tag.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>   
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
@endsection