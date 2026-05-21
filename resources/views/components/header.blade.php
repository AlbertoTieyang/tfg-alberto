<header class="bg-light border-bottom">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a href="{{ $leftLink ?? route('index') }}" class="navbar-brand fw-bold">
        {{ $leftText ?? 'Bar Restaurante Palacios' }}
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav" aria-controls="menuNav" aria-expanded="false" aria-label="Abrir menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto gap-lg-4 text-center">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('reserva') }}">Reserva</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('carta') }}">Carta</a>
          </li>

          @guest
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">Iniciar sesion</a>
            </li>
          @endguest

          @auth
            <li class="nav-item">
              <a href="{{ route('cuenta') }}" class="nav-link">Cuenta</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link">Cerrar sesion</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</header>
