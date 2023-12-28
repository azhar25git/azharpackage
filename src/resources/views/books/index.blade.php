@extends('azhar-package::layout')
@section('page-title', 'Books')
@section('content')
@if ($errors->any())
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered mx-auto w-50">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th> - </th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td><button>Edit</button>
            <form action="{{ route('books.destroy' , $book->id) }}" method="POST">
                @method('DELETE')
                <input type="hidden" value="{{$book->id}}">
                <input type="submit" placeholder="Delete" class="px-4 py-2 text-white bg-red-500 hover:bg-red-700">
            </form>
        </td>
        <td>
            <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
  
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection