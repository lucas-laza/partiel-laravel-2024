@extends('layout')

@section('content')
    <h1>Ajouter un livre</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titre</label>
            <input required type="text" name="title" id="title" >
        </div>
        <div>
            <label for="author">Auteur</label>
            <input required type="text" name="author" id="author" >
        </div>
        <div>
            <label for="year">Année</label>
            <input required type="number" name="year" id="year">
        </div>
        <div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre">
        </div>
        <button type="submit">Sauvegarder</button>
    </form>
@endsection
