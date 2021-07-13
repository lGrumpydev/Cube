<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/images/CubeLogo.png" alt="" width="35" height="35" class="d-inline-block align-text-top">  
            The Cube
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/users" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Users
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"></a></li>
                  <li><a class="dropdown-item" href="#"></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"></a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex">
              <!--href="/users/"-->
                <img style="height: 35px; width: 35px;" class="rounded-circle mx-auto d-block" src="/images/{{Auth::user()->avatar}}" alt="Card image cap">
              <a href="/users/{{Auth::user()->id}}" class="btn btn-dark">{{Auth::user()->first_name}}</a>
              <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
            </form>
          </div>
        </div>
      </nav>
</header>