<header class="bg-light border-bottom">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between py-2">
      <a href="{{ $leftLink ?? '#' }}" class="text-decoration-none fw-bold">
        {{ $leftText ?? 'Mi Link' }}
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav flex-lg-row gap-lg-4 text-center">
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
            <a href="{{ route('index') }}" class="nav-link">Cuenta</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</header>
