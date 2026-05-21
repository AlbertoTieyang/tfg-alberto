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
    <main class="flex-grow-1">
        <div class="container">
            <div class="row justify-content-center mt-3">
                <div class="col-6">
                    <form action="{{ route('plato.update', $dish->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="text" name="image" class="form-control" value="{{ old('image', $dish->image) }}">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $dish->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" name="price" class="form-control" value="{{ old('price', $dish->price) }}">
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
                            <textarea name="description" class="form-control">{{ old('description', $dish->description) }}</textarea>
                        </div>
                        <div class="form-check form-switch">
                            <label for="active" class="form-check-label">¿Activar plato?</label>
                            <input class="form-check-input" type="checkbox" name="active" @if($dish->active) checked @endif>
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</body>
</html>
