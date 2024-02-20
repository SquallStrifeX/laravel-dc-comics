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
            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-primary">Modifica Fumetto</a>
            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                @csrf <!-- Token CSRF per la sicurezza -->
                @method('DELETE') <!-- Direttiva Blade per specificare il metodo HTTP DELETE -->

                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo fumetto?')">Elimina</button>
            </form>

        </div>
    </div>
</div>
