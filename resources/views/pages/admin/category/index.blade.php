@extends('layouts.admin')
@section('sub-judul', 'Category')
@section('title', 'Category')

@section('content')

    <a href="{{ route('category-create') }}" class="btn btn-primary mb-2 btn-sm">Create Category</a>
        <table id="table_id" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Name Category</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            @foreach ($category as $item)
            <tbody>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">
                        <form action="{{ route('category-delete', $item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                                <a href="{{ route('category-edit', $item->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
@endsection