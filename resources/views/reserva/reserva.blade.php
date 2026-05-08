<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Reserva - Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <h2 class="text-center">Haz tu reserva</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                <form action="{{ route('reserva.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Correo</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico" >    
                        </div>
                        <p></p>
                        <div class="form-group">
                            <label for="type" class="form-label">Tipo de reserva</label>
                            <input name="type" type="radio" class="radio @error('radio') is-invalid @enderror" id="table"> Mesa
                            <input name="type" type="radio" class="radio @error('radio') is-invalid @enderror" id="event"> Evento
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Seleccione una fecha para la reserva o evento</label>
                            <input type="date" name="date" id="date" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Escribe alguna nota que tengamos que tener en cuenta</label>
                            <textarea id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="people" class="form-label">Indica el número de personas en la reserva</label>
                            <input for="people" name="people" type="number" id="people" class="number" min="1" required>
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
