<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro</title>
</head>
    @include("components.header")
<body>
    <h2>Registro</h2>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">nombre</label>
                            <input name="nombre" type="text" id="nombre" placeholder="Nombre"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter surname"
                                value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" >
                            @error('password') <small class="text-danger"> {{ $message }}</small>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="password_confirmation">Repeat your password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password" >
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
    
            </div>
        </div>
    
</body>
    @include("components.footer")
</html>