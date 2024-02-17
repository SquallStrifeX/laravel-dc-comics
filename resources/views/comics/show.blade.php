<div class="container">
    <div class="card">
        <img class="card-img-top" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <p class="card-text">{{ $comic->description }}</p>
            <p class="card-text"><strong>Prezzo:</strong> {{ $comic->price }}</p>
            <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
            <p class="card-text"><strong>Data di pubblicazione:</strong> {{ $comic->sale_date }}</p>
            <p class="card-text"><strong>Tipologia:</strong> {{ $comic->type }}</p>
            <!-- Puoi anche decodificare e visualizzare i dati JSON se necessario -->
            <p class="card-text"><strong>Artisti:</strong> {{ implode(', ', json_decode($comic->artists, true)) }}</p>
            <p class="card-text"><strong>Scrittori:</strong> {{ implode(', ', json_decode($comic->writers, true)) }}</p>
            <a href="{{ route('comics.index') }}" class="btn btn-primary">Torna all'elenco</a>
        </div>
    </div>
</div>
