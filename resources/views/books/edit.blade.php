@extends('layout')

@section('content')
    <h1>Modifier un livre</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="{{ $book->title }}" required>
        </div>
        <div>
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}" required>
        </div>
        <div>
            <label for="year">Année</label>
            <input type="number" name="year" id="year" value="{{ $book->year }}" required>
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ $book->genre }}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
