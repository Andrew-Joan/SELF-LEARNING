<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">SelfLearning Comic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "comics") ? 'active' : '' }}" href="/comics">All Comics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "bookmark") ? 'active' : '' }}" href="{{ route('bookmark.index') }}">Bookmark</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories">Contact</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <form action="{{ route('comics.allComics') }}" method="GET" class="d-flex" autocomplete="off">
            <input type="text" name="search" class="form-control rounded-0" value="{{ request()->input('search') }}" style="border-top-left-radius: 0.375rem !important; border-bottom-left-radius: 0.375rem !important;" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
            <button type="submit" class="btn btn-outline-light rounded-0" style="border-top-right-radius: 0.375rem !important; border-bottom-right-radius: 0.375rem !important;">
              <i class="fa-brands fa-searchengin"></i></button>
          </form>
        </ul>

        <ul class="navbar-nav ms-auto">
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Welcome back, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{ route('profile.index', ['user' => auth()->id()]) }}" class="d-flex align-items-center justify-content-center text-dark gap-2">
                      <i class="fa fa-user"></i> <div>Profile</div>
                    </a>
                  </li>
                  <li>
                    <div class="d-flex align-items-center justify-content-center">
                      <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">
                          <i class="bi bi-box-arrow-right"></i> Logout</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            @else
              <li class="nav-item">
                <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
            @endauth
        </ul>
      </div>
    </div>
</nav>