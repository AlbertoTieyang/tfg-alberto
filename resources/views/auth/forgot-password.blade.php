<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar sesion</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <h2 class="text-center">Recuperar constraseña</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label mb2">Correo electrónico</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar correo</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @include ('components.footer')
</body>
</html>
