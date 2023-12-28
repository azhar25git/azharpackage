<?php

namespace Azhar25git\AzharPackage\Controllers;

use Azhar25git\AzharPackage\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Azhar25git\AzharPackage\Requests\BookStoreRequest;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->limit(20)->get();

        return view('azhar-package::books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('azhar-package::books.single');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookStoreRequest $request)
    {
        $validated = $request->safe()->all();

        DB::beginTransaction();
        try {
            $newBook = new Book;
            $newBook->title = $validated['title'];
            $newBook->description = $validated['description'];
            $newBook->author = $validated['author'];
            
            $newBook->save();

            return $newBook;
        }

        catch (\Exception $e) {
            // Whoopsy
            DB::rollBack();
        }

        // return var_export($users);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('azhar-package::books.single', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('azhar-package::books.single', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookStoreRequest $request, Book $book)
    {
        $validated = $validated = $request->safe()->all();

        DB::beginTransaction();
        try {
            $existingBook = $book;
            $existingBook->title = $validated['title'];
            $existingBook->author = $validated['author'];
            $existingBook->description = $validated['description'];
            
            $existingBook->save();

            DB::commit();
        }

        catch (\PDOException $e) {
            // Whoopsy
            DB::rollBack();
        }
        
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book) {
            $book->delete();
        }
        return redirect()->route('books.index');
    }
}