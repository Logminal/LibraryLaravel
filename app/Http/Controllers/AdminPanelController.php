<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Expectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminPanel', [
            'data' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.addBook', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Book $book, BookRequest $request)
    {
        // dd($request['book']);
        // $data = $request['img']->store('upload', 'public');

        $data = $request->validated();
        // dd($data);
        $data['img'] = $request['img']->store('/images', 'public');
        // $orNameBook = $data['book'];
        // dd($orNameBook);
        $data['book'] = $request['book']->store('/books', 'public');
        // dd($data);
        Book::create($data);
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, $id)
    {
        $book = Book::find($id);

        $book->name_book = $request->name_book;
        $book->desk = $request->desk;
        $book->author = $request->author;
        $book->category = $request->category;

        if ($request->file('img')) {
            $book['img'] = $request['img']->store('/images', 'public');
            $book->img = $book['img'];
        }

        if ($request->file('book')) {
            $orName = $request->file('book')->getClientOriginalName();
            $book['book'] = $request['book']->storeAs('/books', $orName, 'public');
            $book->book = $book['book'];
        }

        $book->update();

        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book, $id)
    {
        Book::find($id)->delete();

        return redirect(route('admin.index'));

        // return view('adminPanel', [
        //     'data' => Book::all()
        // ]);
    }

    public function formUpdate(Request $request, $id)
    {
        $book = Book::find($id);
        // dd($book);

        return view('books.updateBook', [
            'book_info' => $book,
            'categories' => Category::all(),
        ]);
    }

    public function allBooks()
    {
        return view('books.ExpectationsBooks', [
            'data' => Expectation::all(),
        ]);
    }

    public function allBooksAccept(Request $request, $id)
    {
        $book = Expectation::find($id);

        $book = Book::create([
            'name_book' => $book->name_book,
            'img' => $book->img,
            'desk' => $book->desk,
            'author' => $book->author,
            'category' => $book->category,
            'book' => $book->book,
        ]);

        Expectation::find($id)->delete();
        return redirect(route('admin.index'));
    }

    public function allBooksReject($id)
    {
        Expectation::find($id)->delete();

        return redirect(route('allBooks'));
    }
}
