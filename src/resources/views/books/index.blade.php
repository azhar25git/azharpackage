@extends('azhar-package::layout')
@section('page-title', 'Books')
@section('content')
@if ($errors->any())
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="mx-auto w-50 my-2">
            <a class="btn btn-success" href="{{ route('books.create') }}"> Add New +</a>
        </div>
    </div>
</div>
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