<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="/" class="nav-item nav-link @php
                if ($_SERVER["REQUEST_URI"] == "/") echo "active";
                @endphp">Home</a>
                <a href="/about" class="nav-item nav-link @php
                if ($_SERVER["REQUEST_URI"] == "/about") echo "active";
                @endphp">About</a>
                <a href="/service" class="nav-item nav-link @php
                if ($_SERVER["REQUEST_URI"] == "/service") echo "active";
                @endphp">Service</a>
                <a href="/menu" class="nav-item nav-link @php
                if ($_SERVER["REQUEST_URI"] == "/menu") echo "active";
                @endphp">Menu</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="/booking" class="dropdown-item">Booking</a>
                        <a href="/team" class="dropdown-item">Our Team</a>
                        <a href="/testimonial" class="dropdown-item">Testimonial</a>
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link @php
                if ($_SERVER["REQUEST_URI"] == "/contact") echo "active";
                @endphp">Contact</a>
            </div>

            @php
            if (session('user')) {  // Check if the user is logged in
                $user = session('user');
            @endphp
                <a href="/profile" class="btn btn-outline-light py-2 px-3">Welcome, {{ $user->name }}</a>
                <a href="/logout" class="btn btn-danger py-2 px-3 ms-2">Logout</a>
            @php
            } else {
            @endphp
                <a href="/signup" class="btn btn-outline-light py-2 px-3">Sign Up</a>
                <a href="/login" class="btn btn-primary py-2 px-3 ms-2">Login</a>
            @php
            }
            @endphp
        </div>
    </nav>
</div>
