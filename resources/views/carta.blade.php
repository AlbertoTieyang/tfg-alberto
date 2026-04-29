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
                <form action="{{ route('plato.search') }}"></form>
                <label for="nombre">Nombre</label>
                <input type="text">
            </div>
            <div></div>
            @foreach ($platos as $plato)
            <div class="col-3 mb-3">
                <div class="card" style="width: 18rem; min-height: 200px;">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $plato->nombre }}</h5>
                    <h6 class="card-subtitle">{{ $plato->precio }}€</h6>
                    <p class="card-text text-justify">{{ $plato->descripcion }}</p>
                    @auth
                    <a href="{{ route('plato.create') }}" class="btn btn-primary">Editar</a>
                    @endauth
                </div>
                </div>  
            </div>
                @endforeach
        </div>    
    </div>
</body>
@include("components.footer")
</html>