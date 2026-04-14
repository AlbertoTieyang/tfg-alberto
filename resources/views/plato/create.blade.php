<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edición platos - Bar Restaurante Palacios</title>
</head>
@include("components.header")

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                @foreach ($platos as $plato)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $plato->imagen }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plato->nombre }}</h5>
                            <p class="card-text">{{ $plato->precio }}.</p>
                            <a href="#" class="btn btn-primary">Editar</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <h3 class="text-center">Añade un plato</h3>
                <form action="{{ route("plato.store") }}" method="POST">
                <div class="form-row">
                    <div class="form-group row col-md-6">
                        <label for="nombre">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Introduce el nombre del plato">
                    </div>
                    <div class="fomr-group row col-md-6">
                        <label for="categoria">Categoria</label>
                        <select class="form-control">
                            @foreach ($plato->categoria as $categoria)
                                <option>{{ $categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
@include("components.footer")

</html>