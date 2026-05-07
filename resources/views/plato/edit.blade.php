<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar plato | Bar Restaurante Palacios</title>
</head>
<body>
    @include('components.header')
    <main class="flex-grow-1">
        <div class="container">
            <div class="row aling-items-center">
                <div class="col-6">
                    <form action="{{ route('plato.update', $plato->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ $plato->name }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input name="price" type="number" class="form-control" id="price" value="{{ $plato->name }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
</body>
</html>
