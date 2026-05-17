<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss'])
    <title>Registro</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    <main class="flex-grow-1">
        <h2 class="text-center">Registro</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    @if (session('no-user'))
                        <div class="alert alert-warning">
                            {{ session('no-user') }}
                        </div>
                    @endif
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input name="name" type="text" id="name" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Correo electrónico" value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password') <small class="text-danger"> {{ $message }}</small> @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="password_confirmation">Repite la contraseña</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn end-0">Registrarse</button>
                    </form>
                    <a href="{{ route('login') }}">Tengo ya una cuenta</a>
                </div>        
            </div>
        </div>
    </main>
    @include("components.footer")
</body>
</html>