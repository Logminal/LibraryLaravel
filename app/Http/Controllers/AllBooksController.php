<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Expectation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AllBooksController extends Controller
{
    public function index()
    {
        return view('books.allBooks', [
            'data' => Book::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request, $id)
    {
        $path = Book::find($id);
        $pathBook = $path->book;
        $url = Storage::url($pathBook);
        return response()->download(public_path($url));
    }

    public function storeExDown(Request $request, $id)
    {
        $path = Expectation::find($id);
        $pathBook = $path->book;
        $url = Storage::url($pathBook);
        return response()->download(public_path($url));
    }
}
