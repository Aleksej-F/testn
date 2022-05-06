@extends('layouts.main')
@section('title') Список категорий @parent @stop
@section('content')
    <p>Категории новостей</p>
    <br />
    <hr>
    @foreach($categoriesList as $category)
    <div>

    <a href="{{ route('categories.show', ['id' => $category['id']]) }}">{{ $category['title'] }}</a>
        <br />
        <br />
    
    </div>

    @endforeach
@endsection