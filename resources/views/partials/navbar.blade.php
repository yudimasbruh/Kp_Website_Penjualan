<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">FADHIL MUSLIM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/')?'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('about')?'active' : '' }}" href="/about">Pages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('product')?'active' : '' }}" href="/news">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('contact')?'active' : '' }}" href="/news">contact</a>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"> <i class="bi
                bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-right"></i>
                    Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="/register" class="nav-link {{ Request::is('register')?'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Register</a> 
            <a href="/login" class="nav-link {{ Request::is('login')?'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a> 
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>