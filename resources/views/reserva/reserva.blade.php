<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Reserva - Bar Restaurante Palacios</title>
</head>
@include("components.header")
<body>
    <div class="container">
        <div class="row">
            <form action="reserva.store" method="post">
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter surname">    
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
    @include("components.footer")
</html>
