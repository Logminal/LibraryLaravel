<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Expectation;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {

        for ($i = 1; $i < 10; $i++) {
            $idBook[] = '#tb' . $i;
        }

        // dd($idBook);

        return view('main', [
            'id_book' => $idBook,
            'data' => Book::all(),
        ]);
    }

    public function addPersonBook()
    {
        return view('books.addPersonBook', [
            'categories' => Category::all(),
        ]);
    }

    public function addPersonBookStore(BookRequest $request)
    {
        $data = $request->validated();

        $data['img'] = $request['img']->store('/images', 'public');
        $orNameBook = $request->file('book')->getClientOriginalName();
        // dd($orNameBook);
        $data['book'] = $request['book']->storeAs('/books', $orNameBook, 'public');

        Expectation::create($data);
        return redirect(route('home'));
    }
}
