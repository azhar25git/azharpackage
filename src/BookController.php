<?php

namespace Azhar25git\AzharPackage;

use Azhar25git\AzharPackage\Book;
use Illuminate\Routing\Controller;
use Azhar25git\AzharPackage\BookStoreRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->limit(20)->get();

        return view('azhar-package::books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('azhar-package::books.single');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(BookStoreRequest $request)
    {
        $validated = $request->validated();

        $newBook = new Book;
        $newBook->title = $validated['title'];
        $newBook->description = $validated['description'];
        $newBook->author = $validated['author'];
        
        $newBook->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Azhar25git\AzharPackage\Book  $book
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(Book $book)
    {
        return view('azhar-package::books.single', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Azhar25git\AzharPackage\Book  $book
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Book $book)
    {
        return view('azhar-package::books.single', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Azhar25git\AzharPackage\BookStoreRequest  $request
     * @param  Azhar25git\AzharPackage\Book  $book
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        $validated = $request->validated();
        $existingBook = $book;
        $existingBook->title = $validated['title'];
        $existingBook->author = $validated['author'];
        $existingBook->description = $validated['description'];
        
        $existingBook->save();
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Azhar25git\AzharPackage\Book  $book
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function destroy(Book $book)
    {
        if($book) {
            $book->delete();
        }
        return redirect()->route('books.index');
    }
}