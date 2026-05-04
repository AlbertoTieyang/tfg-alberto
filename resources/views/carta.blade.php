<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Carta - Bar Restaurante Palacios</title>
</head>
@include("components.header")
<body>
    <h1 class="text-center">Nuestra carta</h1>
    @auth
        <button type="button"><a href="{{ route('plato.create') }}">Editar</a></button>
    @endauth
    <div class="container">
        <div class="row">
            <div class="col mb-3">
                <form action="{{ route('carta') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Buscar plato..." value="{{ $nombre ?? '' }}">
                        <select name="category_id" class="form-control">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categoria as $cat)
                                <option value="{{ $cat->id }}"
                                    @if($categoriaId == $cat->id)
                                        selected
                                    @endif>{{ $cat->categoria }}
                                </option>
                            @endforeach
                        </select>
                        <select name="allergen_id" class="form-control">
                            <option value="">Selecciona los alérgenos</option>
                            @foreach ($alergenos as $ale)
                                <option value="{{ $ale->id }}"@if ($alergenosId == $ale->id) selected @endif> 
                                {{ $ale->tipo }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <div></div>
            @foreach ($platos as $plato)
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem; min-height: 250px; max-height:250px;">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plato->name }}</h5>
                            <h6 class="card-subtitle">{{ $plato->price }}€ - {{ $plato->dishesCategory->category ?? 'No tiene categoria' }}</h6>
                            <p class="card-text text-justify">{{ $plato->description }}</p>
                            @auth
                                <a href="{{ route('plato.create') }}" class="btn btn-primary">Editar</a>
                            @endauth
                        </div>
                        @if ($plato->allergens->isNotEmpty())
                            <div class="card-footer">
                                @foreach ($plato->allergens as $alergeno)
                                    {{ $alergeno->type }}
                                @endforeach 
                            </div>
                        @endif
                    </div>  
                </div>
            @endforeach
        </div>    
    </div>
</body>
@include("components.footer")
</html>