<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>Bar Restaurante Palacios</title>
</head>
<body class="d-flex flex-column min-vh-100">
    @include("components.header")
    @if(session('cancelled'))
        <div class="alert alert-warning">
            {{ session('cancelled') }}
        </div>
    @endif
    <main class="flex-grow-1">
        <div class="container">
            <div class="row">
                <div class="col-6 align-self-center">
                    <h3>Tus reservas</h3>
                    @if ($bookings->isNotEmpty())
                        @foreach ($bookings as $book)
                        <div class="card mb-3">
                            <div class="card-header">Fecha: {{ $book->date }}</div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <p class="card-text"><strong>Personas:</strong> {{ $book->people }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text"><strong>Tipo de reserva:</strong> 
                                            @if ($book->type == 'table')Mesa
                                            @elseif($book->type == 'event') Evento
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>Descripción:</strong></p>
                                        {{ $book->description }}
                                    </div>
                                </div>
                                <div class="row align-content-end">
                                    <div class="col">
                                        <form action="{{ route('book.destroy', $book->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Cancelar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>No tienes reservas todavia.</p>
                    @endif
                </div>
            </div>
            <div class="row">
                @if(auth()->check() && auth()->user()->rol_id == 1)
                <h3>Todas las reservas (Solo admin)</h3>
                    @foreach ($allBookings as $book)
                    <div class="col-6">
                        
                    </div>
                        <div class="card">
                            <p class="card-header">Reserva de {{ $book->user->name }}</p>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <p class="card-text"><strong>Fecha:</strong> {{ $book->date }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text"><strong>Personas:</strong> {{ $book->people }}</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="card-text"><strong>Tipo de reserva:</strong> 
                                            @if ($book->type == 'table')Mesa
                                            @elseif($book->type == 'event') Evento
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text"><strong>Descripción:</strong></p>
                                        {{ $book->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
    @include('components.footer')
</body>
</html>
