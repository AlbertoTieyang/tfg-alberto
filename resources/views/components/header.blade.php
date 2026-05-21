<header class="bg-primary border-bottom">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a href="{{ $leftLink ?? route('index') }}" class="navbar-brand fw-bold text-light"> {{ $leftText ?? 'Bar Restaurante Palacios' }} </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav" aria-controls="menuNav" aria-expanded="false" aria-label="Abrir menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuNav">
        <ul class="navbar-nav ms-auto gap-lg-4 text-center">
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('index') }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('reserva') }}">Reserva</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="{{ route('carta') }}">Carta</a>
          </li>
          @guest
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link text-light">Registrarse</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link text-light">Iniciar sesion</a>
            </li>
          @endguest

          @auth
            <li class="nav-item">
              <a href="{{ route('cuenta') }}" class="nav-link text-light">Cuenta</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link text-light">Cerrar sesion</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</header>
<!--Esto se ha puesto para que al desplegarlo funcione, no sé porque en local funciona sin esto pero desplegado no -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('.navbar-toggler');
  const menu = document.getElementById('menuNav');

  btn?.addEventListener('click', () => {
    menu.classList.toggle('show');
  });
});
</script>