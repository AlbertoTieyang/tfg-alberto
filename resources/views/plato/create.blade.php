<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss'])
    <title>Edición platos - Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    @foreach ($dishes as $dish)
                            <div class="card mb-3" style="min-height:150px; max-height: 250px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <h6 class="card-subtitle mb-1">{{ $dish->price }}€ - {{ $dish->dishCategory->category ?? 'No tiene categoria' }}</h6>
                                    <p class="card-text">
                                        <form action="{{ route('plato.active', $dish->id) }}" method="POST"> 
                                            @csrf
                                            @method('PUT')
                                            <div class="form-check form-switch">
                                                <input name="active" class="form-check-input" type="checkbox" id="active" @if($dish->active) checked @endif>
                                                <label class="form-check-label" for="active">Activar/desactivar plato</label>
                                                <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                            </div>
                                        </form>
                                    </p>
                                    <a href="{{ route('plato.edit', $dish->id) }}" class="btn btn-primary mb-2">Editar</a>
                                    @if ($dish->allergens->isNotEmpty())
                                        <div class="card-footer">
                                        @foreach ($dish->allergens as $allergen)
                                            {{ $allergen->type }}
                                        @endforeach 
                                        </div>
                                    @endif

                                </div>
                            </div>
                    @endforeach
                </div>
                <div class="col-6 ">
                    <h3 class="text-center">Añade un plato</h3>
                    <form action="{{ route("plato.store") }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="text" class="form-control" id="image" name="image">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label">Nombre</label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Introduce el nombre del plato">
                            </div>
                            <div class="col">
                                <label for="price" class="form-label">Precio</label>
                                <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Introduce el precio del plato">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="dish_category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option id="{{ $category->id }}" value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-group">Selecciona los alergenos del plato: </label>
                                @foreach ($allergens as $allergen)
                                    <input name="allergens[]" type="checkbox" class="form-check-input" id="allergen_{{ $allergen->id }}" value="{{ $allergen->id }}">
                                    <label class="form-check-label">{{ $allergen->type }}</label>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Añade una descripción</label>
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="active">¿Activar plato?</label>
                            <input name="active" class="form-check-input" type="checkbox" id="active">
                        </div>
                    </div>
                    <div class="d-grid gap-2">  
                        <button class="btn btn-primary" type="submit">Crear</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </main>
    @include("components.footer")
</body>

</html>
