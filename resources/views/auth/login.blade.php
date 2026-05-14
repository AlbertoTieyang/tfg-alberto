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
        <h2 class="text-center">Inicia sesión</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Contraseña</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password') <small class="text-danger"> {{ $message }}</small> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                    </form>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('password.request') }}"><p>He olvidado mi contraseña</p></a>
                        </div>
                        <div class="col">
                            <a href="{{ route('register') }}"><p>No tengo una cuenta</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include ('components.footer')
</body>
</html>