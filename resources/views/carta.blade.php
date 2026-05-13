<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Carta - Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <h1 class="text-center">Nuestra carta</h1>
        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    @auth
                        <button type="button"><a href="{{ route('plato.create') }}">Crear</a></button>
                    @endauth
                    <form action="{{ route('carta') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Buscar plato..." value="{{ $name ?? '' }}">
                            <select name="category_id" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->id }}"
                                        @if($categoryId == $cat->id) selected @endif>{{ $cat->category }}
                                    </option>
                                @endforeach
                            </select>
                            <select name="allergen_id" class="form-control">
                                <option value="">Selecciona los alérgenos</option>  
                                @foreach ($allergens as $allergen)
                                    <option value="{{ $allergen->id }}"
                                        @if ($allergenId == $allergen->id) selected @endif>{{ $allergen->type }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
                <div></div>
                @foreach ($dishes as $dish)
                    @if ($dish->active)
                        <div class="col-3 mb-3">
                            <div class="card" style="width: 18rem; min-height: 250px; max-height:250px;">
                                <img src="" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dish->name }}</h5>
                                    <h6 class="card-subtitle">{{ $dish->price }}€ - {{ $dish->dishCategory->category ?? 'No tiene categoria' }}</h6>
                                    <p class="card-text text-justify">{{ $dish->description }}</p>
                                    @auth
                                        <a href="{{ route('plato.edit', $dish->id) }}" class="btn btn-primary">Editar</a>
                                    @endauth
                                </div>
                                @if ($dish->allergens->isNotEmpty())
                                    <div class="card-footer">
                                        @foreach ($dish->allergens as $allergen)
                                            {{ $allergen->type }}
                                        @endforeach 
                                    </div>
                                @endif
                            </div>  
                        </div>
                    @endif
                @endforeach
            </div>    
        </div>
    </main>
    @include("components.footer")
</body>
</html>
