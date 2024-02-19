<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>


<div class="container">
    <div class="row">
        <a href="{{ route('comics.create') }}"><button type="button" class="btn btn-primary my-5">Aggiungi un Fumetto</button></a>


@foreach ($comics as $comic)
<div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top img" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">{{ $comic->description }}</p>
                            <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Leggi di più</a>
                        </div>
                    </div>
                </div>
   @endforeach
    </div>
</div>



</html>
