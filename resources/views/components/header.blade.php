<header class="bg-light border-bottom">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between py-2">
      <a href="{{ $leftLink ?? '#' }}" class="text-decoration-none fw-bold">
        {{ $leftText ?? 'Mi Link' }}
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <nav class="collapse navbar-collapse justify-content-center" id="menuNav">
        <ul class="navbar-nav flex-lg-row gap-lg-4 text-center">
          <li class="nav-item">
            <a class="nav-link" href="{{ $inicio ?? '#' }}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ $nosotros ?? '#' }}">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ $reservas ?? '#' }}">Reservas</a>
          </li>
        </ul>
      </nav>
      <div class="d-none d-lg-block">
        <img src="{{ $logo ?? 'https://via.placeholder.com/50' }}" 
             alt="Logo" 
             class="img-fluid" 
             style="max-height:50px;">
      </div>
    </div>
  </div>
</header>