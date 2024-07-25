<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'genre' => 'nullable',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Livre créé');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if ($book) {
            return view('books.edit', compact('book'));
        } else {
            // rediriger si le livre n'existe pas
            return $this->index();
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'genre' => 'nullable',
        ]);

        $book = Book::find($id);
        if ($book) {
            $book->update($request->all());
            return redirect()->route('books.index')->with('success', 'Livre modifié');
        }
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Livre supprimé');
        }
    }
}
