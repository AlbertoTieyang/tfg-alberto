<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Edición platos - Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1 py-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-lg-6 order-2 order-lg-1">    
                @foreach ($dishes as $dish)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <h6 class="card-subtitle mb-3 text-muted"> {{ $dish->price }}€ - {{ $dish->dishCategory->category ?? 'No tiene categoria' }} </h6>
                            <form action="{{ route('plato.active', $dish->id) }}" method="POST" class="mb-3">
                                @csrf
                                @method('PUT')
                                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-2">
                                    <div class="form-check form-switch mb-0">
                                        <input name="active" class="form-check-input" type="checkbox" id="active_{{ $dish->id }}"
                                            @if($dish->active) checked @endif>
                                        <label class="form-check-label" for="active_{{ $dish->id }}"> Activar/desactivar plato </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"> Actualizar </button>
                                </div>
                            </form>
                            <a href="{{ route('plato.edit', $dish->id) }}" class="btn btn-primary mb-3"> Editar </a>
                            @if ($dish->allergens->isNotEmpty())
                                <div class="border-top pt-2">
                                    @foreach ($dish->allergens as $allergen)
                                        <span class="badge bg-warning text-dark mb-1">
                                            {{ $allergen->type }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <h3 class="text-center mb-3">Añade un plato</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('plato.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    </div>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Introduce el nombre del plato">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="price" class="form-label">Precio</label>
                            <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" id="price" placeholder="Introduce el precio del plato">
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="dish_category_id" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->category }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block"> Selecciona los alérgenos del plato: </label>
                        <div class="row g-2">
                            @foreach ($allergens as $allergen)
                                <div class="col-12 col-sm-6">
                                    <div class="form-check">
                                        <input name="allergens[]" type="checkbox" class="form-check-input" id="allergen_{{ $allergen->id }}" value="{{ $allergen->id }}">
                                        <label class="form-check-label" for="allergen_{{ $allergen->id }}"> {{ $allergen->type }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Añade una descripción</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input name="active" class="form-check-input" type="checkbox" id="active_create">
                        <label class="form-check-label" for="active_create">¿Activar plato?</label>
                    </div>
                    <div class="d-grid">
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
