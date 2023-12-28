@extends('azhar-package::layout')
@section('page-title', 'Book - ' . ($title ?? 'New'))
@section('content')
@if ($errors->any())
  <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Danger</span>
    <div>
        <ul class="mt-1.5 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
      </ul>
    </div>
  </div>
@endif
<div class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ (empty($book) ? route('books.store') : route('books.update', ['book'=>$book->id]))}}">
        @csrf
        <input type="text" name="title" value="{{$book->title ?? ''}}" placeholder="Title">
        <input type="text" name="author" value="{{$book->author ?? ''}}" placeholder="Author">
        <input type="text" name="description" value="{{$book->description ?? ''}}" placeholder="Description">
        <input type="submit" placeholder="Save">
    </form>

</div>
@endsection