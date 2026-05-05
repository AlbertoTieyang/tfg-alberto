<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar sesion</title>
</head>
<body>
    @include("components.header")
    <h2 class="text-center">Inicia sesión</h2>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter surname">    
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" >
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                </form>
            </div>
        </div>
    </div>
    @include ('components.footer')
</body>
</html>