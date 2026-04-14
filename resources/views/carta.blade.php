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
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($platos as $plato)
                <p>{{ $plato->nombre }}</p>
            
                @endforeach
            </div>
        </div>
    </div>
</body>
@include("components.footer")
</html>