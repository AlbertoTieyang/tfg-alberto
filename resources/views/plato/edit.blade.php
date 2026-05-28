<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Editar plato | Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.header')
    <main class="flex-grow-1 mt-3">
        <div class="container">
            <div class="row justify-content-center mt-3">
                <div class="col-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('plato.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="image" class="form-label"></label>
                            <img src="{{ $dish->image ? asset('storage/' . $dish->image) : asset('images/unnamed.jpg') }}" alt="{{ $dish->name }}" class="img-fluid mb-2">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $dish->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $dish->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Categoría</label>
                            <select name="dish_category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($dish->dish_category_id == $category->id)>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="allergens" class="form-label">Alérgenos</label>
                            @foreach ($allergens as $allergen)
                                <input type="checkbox" name="allergens[]" value="{{ $allergen->id }}" @checked($dish->allergens->contains($allergen->id))>
                                <label>{{ $allergen->type }}</label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Descripción</label>                            
                            <button type="button" class="btn btn-outline-primary btn-sm mb-2 js-generate-description" data-url="{{ route('plato.generate-description') }}">Generar con IA</button>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $dish->description) }}</textarea>
                        </div>
                        <div class="form-check form-switch">
                            <label for="active" class="form-check-label">¿Activar plato?</label>
                            <input class="form-check-input" type="checkbox" name="active" @if($dish->active) checked @endif>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                    </form>
                    <form action="{{ route('plato.destroy', $dish->id) }}" method="post" class="mt-3 mb-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</body>
</html>
