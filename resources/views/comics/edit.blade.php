<div class="container">
    <h1>Modifica Fumetto</h1>

    <form action="{{ route('comics.update', $comic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
        <div class="alert alert-danger py-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<button type="submit" class="btn btn-primary">Aggiorna</button>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $comic->title) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $comic->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">URL Immagine di Copertina</label>
            <input type="url" class="form-control" id="thumb" name="thumb" value="{{ old('thumb', $comic->thumb) }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $comic->price) }}" required>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ old('series', $comic->series) }}" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di Vendita</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date', $comic->sale_date ? $comic->sale_date->format('Y-m-d') : '') }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $comic->type) }}" required>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Artisti (separa i nomi con una virgola)</label>
        @if (old('artists'))
        <input type="text" class="form-control" id="artists" name="artists" value="{{(is_array(old('artists'))) ? implode(', ', old('artists')) : old('artists')}}" >
        @else
        <input type="text" class="form-control" id="artists" name="artists" value="{{ implode(', ', json_decode($comic->artists, true))  }}" >

        @endif

            {{-- <input type="text" class="form-control" id="artists" name="artists" value="{{ old('artists', is_array(old('artists')) ? implode(', ', old('artists')) : (is_array(json_decode($comic->artists, true)) ? implode(', ', json_decode($comic->artists, true)) : '')) }}" required> --}}

        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Artisti (separa i nomi con una virgola)</label>
            @if (old('writers'))
        <input type="text" class="form-control" id="writers" name="writers" value="{{(is_array(old('writers'))) ? implode(', ', old('writers')) : old('writers')}}" >
        @else
        <input type="text" class="form-control" id="writers" name="writers" value="{{ implode(', ', json_decode($comic->writers, true))  }}" >
        @endif
        </div>

    </form>
</div>
