<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #e9ecef;
            color: #212529;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-light border-end vh-100 d-flex flex-column p-3">
                <a href="{{ route('dashboard') }}"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <i class="bi bi-box-seam-fill fs-4 me-2"></i>
                    <span class="fs-4 fw-bolder">Inventaris</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link text-dark @if (request()->routeIs('dashboard')) active @endif">
                                    <i class="bi bi-grid-fill me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}"
                                    class="nav-link text-dark @if (request()->routeIs('category.index')) active @endif">
                                    <i class="bi bi-tags-fill me-2"></i>
                                    Category
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('item.index') }}"
                                    class="nav-link text-dark @if (request()->routeIs('item.index')) active @endif">
                                    <i class="bi bi-box-seam-fill me-2"></i>
                                    Item
                                </a>
                            </li>
                            <li>
                                <a href="#userSubmenu" data-bs-toggle="collapse"
                                    class="nav-link text-dark dropdown-toggle @if (request()->routeIs('user.index')) active @endif">
                                    <i class="bi bi-people-fill me-2"></i>
                                    User
                                </a>
                                <ul class="collapse list-unstyled" id="userSubmenu" style="padding-left: 2rem;">
                                    <li>
                                        <a href="{{ route('user.index', ['role' => 'admin']) }}"
                                            class="nav-link text-dark @if (request('role') == 'admin') fw-bold @endif">Admin</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.index', ['role' => 'operator']) }}"
                                            class="nav-link text-dark @if (request('role') == 'operator') fw-bold @endif">Operator</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                    class="nav-link text-dark @if (request()->routeIs('dashboard')) active @endif">
                                    <i class="bi bi-grid me-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('lending.index') }}"
                                    class="nav-link text-dark @if (request()->routeIs('lending.index')) active @endif">
                                    <i class="bi bi-arrow-left-right me-2"></i>
                                    Lending
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('item.index') }}"
                                    class="nav-link text-dark @if (request()->routeIs('item.index')) active @endif">
                                    <i class="bi bi-box-seam me-2"></i>
                                    Item
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <strong>{{ auth()->user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                        @if (auth()->user()->role != 'admin')
                            <li><a class="dropdown-item" href="{{ route('user.edit', auth()->id()) }}">Edit Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
