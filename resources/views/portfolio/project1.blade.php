<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/project1style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>HANGNAMA CAR</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container" id="navbar">
            <a class="navbar-brand" href="#">
                <img id="logo" src="{{ asset('images/Logo.gif') }}" alt="Logo" width="60px"
                    style="transition: 0.4s; border-radius: 50%;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#brands-section">Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="#car-collection">Collection</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mitra-borrowers-section">Testimonials</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    @guest
                        <a class="nav-link me-2" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-primary" href="{{ route('register') }}"
                            style="background-color: var(--accent-color); border-color: var(--accent-color);">Signup</a>
                    @endguest
                    @auth
                        <div class="nav-item me-3">
                            <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="main">
        <div id="carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="{{ asset('images/brv.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-center">
                        <h5>All New Honda BRV</h5>
                        <p>Experience the new era of driving comfort and style.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="{{ asset('images/xpander.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-center">
                        <h5>Mitsubishi Xpander</h5>
                        <p>Your perfect partner for every family adventure.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="{{ asset('images/rush.jpg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-center">
                        <h5>Toyota Rush</h5>
                        <p>Conquer any road with style and confidence.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section id="brands-section">
        <div class="container" data-aos="fade-up">
            <div class="text-center section-title">
                <h2 class="text-black">Featured Brands</h2>
                <p class="text-secondary">Discover vehicles from world-class manufacturers</p>
            </div>
            <div id="brands-carousel" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/AlfaRomeoLogo.jpg') }}"
                                    alt="Alfa Romeo"></div>
                            <h6 class="text-black">ALFA ROMEO</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/BYDLogo.png') }}"
                                    alt="BYD"></div>
                            <h6 class="text-black">BYD</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/CitroenLogo.jpg') }}"
                                    alt="CITROEN"></div>
                            <h6 class="text-black">CITROEN</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/CupraLogo.png') }}"
                                    alt="CUPRA"></div>
                            <h6 class="text-black">CUPRA</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/DaciaLogo.jpg') }}"
                                    alt="DACIA"></div>
                            <h6 class="text-black">DACIA</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <div class="brand-logo-container"><img src="{{ asset('images/logohonda.jpg') }}"
                                    alt="HONDA"></div>
                            <h6 class="text-black">HONDA</h6>
                            <a class="btn btn-primary mt-auto" href="#">View Cars</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="car-collection">
        <div class="container" data-aos="fade-up">
            <div class="text-center section-title">
                <h1 class="text-black">Our Car Collection</h1>
                <p class="text-secondary">Find the perfect car that fits your heart</p>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <form action="{{ route('portfolio.project1') }}#car-collection" method="GET">
                        <div class="input-group input-group-lg">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-funnel-fill"></i> Filters
                            </button>
                            <ul class="dropdown-menu p-3" style="min-width: 300px;">
                                <li>
                                    <label for="brand_filter" class="form-label">Merk</label>
                                    <select class="form-select form-select-sm mb-2" id="brand_filter" name="brand">
                                        <option value="">Semua Merk</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand }}"
                                                {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}
                                            </option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <label for="fuel_filter" class="form-label">Bahan Bakar</label>
                                    <select class="form-select form-select-sm mb-2" id="fuel_filter"
                                        name="fuel_type">
                                        <option value="">Semua Tipe</option>
                                        @foreach ($fuel_types as $type)
                                            <option value="{{ $type }}"
                                                {{ request('fuel_type') == $type ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <label for="gearbox_filter" class="form-label">Gearbox</label>
                                    <select class="form-select form-select-sm mb-2" id="gearbox_filter"
                                        name="gearbox_type">
                                        <option value="">Semua Tipe</option>
                                        @foreach ($gearbox_types as $type)
                                            <option value="{{ $type }}"
                                                {{ request('gearbox_type') == $type ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <label for="paint_filter" class="form-label">Cat</label>
                                    <select class="form-select form-select-sm mb-2" id="paint_filter"
                                        name="paint_type">
                                        <option value="">Semua Tipe</option>
                                        @foreach ($paint_types as $type)
                                            <option value="{{ $type }}"
                                                {{ request('paint_type') == $type ? 'selected' : '' }}>
                                                {{ $type }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary btn-sm">Apply Filters</button>
                                    <a href="{{ route('portfolio.project1') }}#car-collection"
                                        class="btn btn-outline-secondary btn-sm">Reset</a>
                                </li>
                            </ul>
                            <input type="text" class="form-control" name="search"
                                placeholder="Cari Nama atau Merk Mobil..." value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"
                                style="background-color: var(--accent-color); border-color: var(--accent-color);">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @auth @if (Auth::user()->role === 'admin')
                <div class="text-center mb-4">
                    <a href="{{ route('cars.create') }}" class="btn btn-lg btn-primary"
                        style="background-color: var(--accent-color); border-color: var(--accent-color);">+ Add New
                        Car</a>
                </div>
            @endif @endauth

            <div class="row">
                @forelse ($cars as $car)
                    <div class="col-lg-4 col-md-6 col-6 mb-4" data-aos="fade-up">
                        <div class="card h-100">
                            <img src="{{ asset($car->image ?? 'path/to/default.jpg') }}" class="card-img-top"
                                alt="{{ $car->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <p class="text-secondary small mb-1">{{ $car->brand }}</p>
                                <h5 class="card-title">{{ $car->name }}</h5>
                                <p class="price mt-2 mb-3">{{ $car->price }}</p>
                                <div class="d-flex justify-content-around text-center small text-secondary mt-auto">
                                    <div><img src="{{ asset($car->fuel_image) }}" width="24px"
                                            class="mb-1"><br>{{ $car->fuel_type }}</div>
                                    <div><img src="{{ asset($car->gearbox_image) }}" width="24px"
                                            class="mb-1"><br>{{ $car->gearbox_type }}</div>
                                    <div><img src="{{ asset($car->paint_image) }}" width="24px"
                                            class="mb-1"><br>{{ $car->paint_type }}</div>
                                </div>
                                <a href="#" class="btn btn-primary mt-3">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="lead">No cars found matching your criteria.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="mitra-borrowers-section">
        <div class="container" data-aos="fade-up">
            <div class="text-center section-title">
                <h2 class="text-black">What Our Customers Say</h2>
            </div>
            <div id="mitra-carousel" class="owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.34.41.jpeg') }}"
                        class="testimonial-img" alt="">
                    <h5 class="text-center mt-3 text-black">Mr. Murn, staff company, Indonesia</h5>
                    <small>
                        <p class="text-secondary text-center">My family was planning a long vacation and decided to
                            rent a
                            car for our
                            trip. The staff at
                            the car rental shop
                            kindly provided information regarding rates, insurance, and
                            rental terms, offering a
                            selection of cars that suited our needs.
                            During the vacation, the car was very comfortable, allowing my
                            family to explore tourist
                            destinations more freely. The return process also went smoothly,
                            with no
                            unexpected problems or additional costs. This experience made
                            our vacation more enjoyable
                            and stress-free regarding transportation.
                        </p>
                    </small>
                    <p class="text-center text-black">#Hangnama is always best for your heart</p>
                </div>
                <div class="item">
                    <img src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.27.10.jpeg') }}"
                        class="testimonial-img" alt="">
                    <h5 class="text-center mt-3 text-black">Mr. Joko, Entrepreneur, Indonesia</h5>
                    <small>
                        <p class="text-secondary text-center">I booked a car through Hangnama car rental, and it
                            was
                            ready when I
                            arrived at the
                            destination city. The rental process was quick and seamless, and
                            the car was very clean and well-maintained. This experience
                            helped me manage my meeting
                            schedule efficiently and give a professional impression to the
                            client.</p>
                    </small>
                    <p class="text-center text-black">#Hangnama is always best for your harmony
                    </p>
                </div>
                <div class="item">
                    <img src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.27.50.jpeg') }}"
                        class="testimonial-img" alt="">
                    <h5 class="text-center mt-3 text-black">Mr. Trisno, Architect, Indonesia</h5>
                    <small>
                        <p class="text-secondary text-center">After an accident left my car under long-term repair, I
                            decided to rent
                            a replacement.
                            Coming to the car rental shop, I was quite stressed. However,
                            the staff greeted me with
                            sympathy and provided
                            a selection of replacement cars that suited my budget and needs.
                            They explained the rental
                            process in detail, offered additional insurance, and provided
                            all necessary assistance. The
                            experience was helpful and greatly appreciated during a
                            difficult situation.</p>
                    </small>
                    <p class="text-center text-black">#Hangnama is always best for change your life
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="news">
        <div class="container">
            <div class="row">
            </div>
            <hr>
            <p class="text-center text-secondary small">Copyright &copy; 2025 HANGNAMA CAR</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // 1. Navbar Scroll Effect
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "5px 10px";
                document.getElementById("logo").style.width = "50px";
            } else {
                document.getElementById("navbar").style.padding = "15px 10px";
                document.getElementById("logo").style.width = "60px";
            }
        }

        // 2. Animate on Scroll (AOS) Initialization
        AOS.init({
            duration: 1000 // Durasi animasi 1 detik
        });

        // 3. Owl Carousel Initialization (setelah dokumen siap)
        $(document).ready(function() {
            // Carousel untuk Brands
            $('#brands-carousel').owlCarousel({
                loop: false,
                margin: 20,
                nav: true,
                dots: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            });

            // Carousel untuk Mitra/Testimonials
            $('#mitra-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });
        });
    </script>
</body>

</html>
