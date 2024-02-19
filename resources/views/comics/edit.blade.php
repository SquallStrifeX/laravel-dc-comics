
<div class="container">
    <h1>Aggiungi un nuovo fumetto</h1>
    <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">URL Immagine di Copertina</label>
            <input type="url" class="form-control" id="thumb" name="thumb" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" required>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data di Vendita</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="mb-3">
            <label for="artists" class="form-label">Artisti (separa i nomi con una virgola)</label>
            <input type="text" class="form-control" id="artists" name="artists[]" required>
        </div>
        <div class="mb-3">
            <label for="writers" class="form-label">Scrittori (separa i nomi con una virgola)</label>
            <input type="text" class="form-control" id="writers" name="writers[]" required>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>

