<header>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-code fa-flip" style="--fa-animation-duration: 3s;"></i></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="#" id="userProfile" role="button">
                <div>
                  <span class="">User: {{Auth::user()->name}}</span>
                </div>
                
                <div class="my-profile">
                  <img class="img-profile rounded-circle" src="{{Vite::asset('storage/profile_image/kin.jpeg')}}">
                </div>
              </a>
            </li>

            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                <a class="nav-link" href="https://github.com/LuisGonzalez27">
                  <i class="fab fa-github"></i> GitHub
                </a>
                </li>
            </ul>
    
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link me-3 me-lg-0" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" title="Logout">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </ul>
        </div>
      </div>
    </div>
    </nav>
</header>


