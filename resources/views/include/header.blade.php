<header> <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid"> <a class="navbar-brand" href="#">To-Do App</a> <button class="navbar-toggler"
                type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
                aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    @auth
                        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}">Logout</a> </li>
                    @endauth
                    @guest
                        <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Login</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a> </li>
                    @endguest

                </ul>
                <a href="{{ route('task.add') }}" class="btn btn-outline-success" type="submit">Add Task</a>
            </div>
        </div>
    </nav>
</header>
