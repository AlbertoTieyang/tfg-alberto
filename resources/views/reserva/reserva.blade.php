<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Reserva - Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1 mt-3">
        <h2 class="text-center">Haz tu reserva</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                <form action="{{ route('reserva.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" type="email" class=" form-control @error('email') is-invalid @enderror" id="email" required>
                            @error("email")
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <p></p>
                        <div class="form-group">
                            <label class="form-label">Tipo de reserva: </label>
                            <div class="form-check">
                                <input name="type" type="radio" class="form-check-input @error('radio') is-invalid @enderror" id="table" value="table"> Mesa
                                <label class="form-check-label" for="table">Mesa</label>
                            </div>
                            <div class="form-check">
                                <input name="type" type="radio" class="form-check-input @error('radio') is-invalid @enderror" id="event" value="event"> Evento
                                <label class="form-check-label" for="event">Evento</label>
                            </div>
                            @error("radio")
                                <small class="text-danger d-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="date" class="form-label">Seleccione una fecha para la reserva o evento</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                            @error("date")
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="people" class="form-label">Indica el número de personas en la reserva</label>
                            <input for="people" name="people" type="number" id="people" class="number" min="1" max="25" required>
                            @error("people")
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Escribe alguna nota que tengamos que tener en cuenta</label>
                            <textarea id="description" name="description" rows="3" style="resize: none;"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary mb-3" type="submit">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="carruselInicio" class="carousel slide mt-3 mb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/unnamed.jpg') }}" class="d-block w-80 carrusel-img" alt="Restaurante">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/dentro.jpg') }}" class="d-block w-80 carrusel-img" alt="Comida">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carruselInicio" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carruselInicio" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </main>
    @include("components.footer")
</body>
</html>
