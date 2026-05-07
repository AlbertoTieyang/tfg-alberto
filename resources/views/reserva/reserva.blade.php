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
        <div class="container">
            <div class="row align-content-between">
                <form action="reserva.store" method="post">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico">    
                        </div>
                        <p></p>
                        <div class="form-group">
                            <label for="type">Tipo de reserva</label>
                            <input name="type" type="radio" class="radio @error('radio') is-invalid @enderror" id="table"> Mesa
                            <input name="type" type="radio" class="radio @error('radio') is-invalid @enderror" id="event"> Evento
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @include("components.footer")
</body>
</html>
