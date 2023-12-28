@extends('azhar-package::layout')
@section('page-title', 'Books')
@section('content')
<table>
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
            <form action="POST">
                @action('DELETE')
                <input type="hidden" value="{{$book->id}}">
                <input type="submit" placeholder="Delete" class="px-4 py-2 text-white bg-red-500 hover:bg-red-700">
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection