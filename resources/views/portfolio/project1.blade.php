<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/project1style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>HANGNAMA CAR</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top border-bottom border-1 border-white">
        <div class="container" data-aos="zoom-in" id="navbar" style="transition: 0.4s;">
            <img id="logo" src="{{ asset('images/Logo.gif') }}" alt="" width="70px"
                style="transition: 0.4s; border-radius: 100px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#brands-section">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mitra-borrowers-section">Mitra and Borrowers</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <ul class="navbar-nav">
                        @guest {{-- Jika pengguna BELUM login --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Signup</a>
                            </li>
                        @endguest

                        @auth {{-- Jika pengguna SUDAH login --}}
                            <li id="profile" class="nav-item ms-lg-2"> {{-- ms-lg-2 untuk margin kiri di layar besar --}}
                                <a href="{{ url('sub/profile.html') }}" class="nav-link link-body-emphasis px-2"
                                    style="border-radius: 25px; background-color: #86868750;">
                                    {{ Auth::user()->name }} {{-- Mengambil fullname dari user yang login --}}
                                    <svg style="padding-left: 2px;" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                </a>
                            </li>
                            {{-- Opsional: Tambahkan tombol logout di samping profile atau di dropdown profile --}}
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link text-danger">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="main">
        <div id="carousel" class="carousel carousel-fade slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/brv.jpg') }}" class="pic d-block mx-auto" alt="carouselpic1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>All New Honda BRV</h5>
                        <p>Get Your Stylish BRV Here With Hangnama</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/xpander.jpg') }}" class="pic d-block mx-auto" alt="carouselpic2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/rush.jpg') }}" class="pic d-block mx-auto" alt="carouselpic3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            </button>
        </div>
    </section>

    <section class="p-5 brand" id="brands-section">
        <div class="container" data-aos="fade-up" data-aos-duration="3000">
            <h2 class="text-center text-light">BRAND</h2>

            <div class="row text-center g-4 justify-content-center">
                <div class="owl-carousel owl-theme">

                    <div class="item">
                        <div class="card bg-light h-100" style="border-radius: 25px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div class="brand-logo-container">
                                    <img src="{{ asset('images/AlfaRomeoLogo.jpg') }}" alt="">
                                </div>
                                <h6>ALFA ROMEO</h6>
                                <a class="btn btn-primary mt-auto" href="{{ url('sub/Alfaromeo') }}">Open</a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card bg-light h-100" style="border-radius: 25px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div class="brand-logo-container">
                                    <img src="{{ asset('images/BYDLogo.png') }}" alt="">
                                </div>
                                <h6>BYD</h6>
                                <a class="btn btn-primary mt-auto" href="{{ url('sub/BYD') }}">Open</a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card bg-light h-100" style="border-radius: 25px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div class="brand-logo-container">
                                    <img src="{{ asset('images/CitroenLogo.jpg') }}" alt="">
                                </div>
                                <h6>CITROEN</h6>
                                <a class="btn btn-primary mt-auto" href="{{ url('sub/Citoren') }}">Open</a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card bg-light h-100" style="border-radius: 25px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div class="brand-logo-container">
                                    <img src="{{ asset('images/CupraLogo.png') }}" alt="">
                                </div>
                                <h6>CUPRA</h6>
                                <a class="btn btn-primary mt-auto" href="{{ url('sub/Cupra') }}">Open</a>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card bg-light h-100" style="border-radius: 25px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div class="brand-logo-container">
                                    <img src="{{ asset('images/DaciaLogo.jpg') }}" alt="">
                                </div>
                                <h6>DACIA</h6>
                                <a class="btn btn-primary mt-auto" href="{{ url('sub/Dacia') }}">Open</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="benefit" class="p-5">
        <div class="container" data-aos="fade-up" data-aos-duration="3000">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-center text-md-start mb-4 mb-md-0">
                    <img src="{{ asset('images/Logo.gif') }}" style="border-radius: 200px;" class="img-fluid"
                        alt="" width="400px" />
                </div>
                <div class="col-md p-5 text-center text-md-start">
                    <h2>Apa saja keunggulan Hangnama?</h2>
                    <p>
                        1. Menyediakan mobil-mobil berkualitas tinggi yang telah melalui inspeksi menyeluruh dan
                        perawatan berkala.
                    </p>
                    <p>
                        2. Harga bersaing dan opsi pembiayaan
                    </p>
                    <p>
                        3. Memiliki program loyalitas dan garansi.
                    </p>
                    <p>
                        4. Memberikan layanan konsultasi yang menyeluruh.
                    </p>
                    <p>
                        5. Melayani uji coba kendaraan sebelum membeli.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="video">
        <div data-aos="fade-up" data-aos-duration="3000">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5 text-md-start">
                    <h2 class="text-center">BE STYLISH</h2>
                    <p class="text-center">
                        Dapatkan Mobil Baru Dan Mobil Bekas Rasa Baru Milik Anda Disini Sekarang!
                    </p>
                    <video width="100%" autoplay loop muted>
                        <source src="{{ asset('videos/brvteaser.mp4') }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                </div>
            </div>
        </div>
    </section>

    <section class="car collection" id="car-collection">
        <div class="container py-5" data-aos="fade-up" data-aos-duration="3000">
            <div class="row py-5">
                <div class="col-lg-5 m-auto text-center">
                    <h1>Our Car Collection</h1>
                    <h6 style="color: brown;">Will Fits On Your Heart</h6>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <form action="{{ route('portfolio.project1') }}#car-collection" method="GET">
                        <div class="input-group input-group-lg">

                            <button class="btn btn-outline-secondary btn-dark dropdown-toggle" type="button"
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
                                                {{ request('brand') == $brand ? 'selected' : '' }}>
                                                {{ $brand }}
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
                                    <a href="{{ route('portfolio.project1') }}"
                                        class="btn btn-outline-secondary btn-sm">Reset</a>
                                </li>
                            </ul>

                            <input type="text" class="form-control" name="search"
                                placeholder="Cari Nama atau Merk Mobil..." value="{{ request('search') }}">

                            <button class="btn btn-dark" type="submit" id="button-search">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @auth
                @if (Auth::user()->role === 'admin')
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <a href="{{ route('cars.create') }}" class="btn btn-primary btn-lg">
                                Add New Car
                            </a>
                        </div>
                    </div>
                @endif
            @endauth

            <div class="row justify-content-center">
                @forelse ($cars as $car)
                    <div class="col-lg-3 col-md-6 col-6 text-center mb-4">
                        <div class="card border-0 bg-light h-100">
                            <div class="card-body d-flex flex-column justify-content-between">
                                @if ($car->image)
                                    <img src="{{ asset($car->image) }}" class="img-fluid mb-2"
                                        alt="{{ $car->name }}" data-aos="zoom-in-up">
                                @else
                                    <img src="{{ asset('path/to/default_car_image.jpg') }}" class="img-fluid mb-2"
                                        alt="{{ $car->name }}" data-aos-zoom-in-up">
                                @endif

                                <p class="text-muted small mb-1">{{ $car->brand }}</p>
                                <h6>{{ $car->name }}</h6>
                                <p>{{ $car->price }}</p>

                                <div class="row g-1 text-center mt-auto">
                                    <div class="col-4">
                                        @if ($car->fuel_image)
                                            <img src="{{ asset($car->fuel_image) }}" style="width: 40px;">
                                        @endif
                                        <h6><small>{{ $car->fuel_type }}</small></h6>
                                    </div>
                                    <div class="col-4">
                                        @if ($car->gearbox_image)
                                            <img src="{{ asset($car->gearbox_image) }}" style="width: 40px;">
                                        @endif
                                        <h6><small>{{ $car->gearbox_type }}</small></h6>
                                    </div>
                                    <div class="col-4">
                                        @if ($car->paint_image)
                                            <img src="{{ asset($car->paint_image) }}" style="width: 40px;">
                                        @endif
                                        <h6><small>{{ $car->paint_type }}</small></h6>
                                    </div>
                                </div>

                                <div class="text-center mx-auto mt-3">
                                    <button class="btn1 btn btn-primary">Click for More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="lead">Tidak ada mobil yang ditemukan dengan kriteria tersebut.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="mitra" id="mitra-borrowers-section">
        <div class="container card border-0 bg-light mb-2 p-4" data-aos="fade-up" data-aos-duration="3000">
            <div class="row py-5 justify-content-center">
                <div class="col-lg-8 mx-auto text-center">
                    <h1>Mitra And Borrowers</h1>
                    <p class="lead text-white mb-5"></p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img id="gambar-mitra" src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.34.41.jpeg') }}"
                            class="img-fluid rounded testimonial-img" alt="">
                        <h5 class="text-center mt-3">Mr. Murn, staff company, Indonesia</h5>
                        <p class="text-center">My family was planning a long vacation and decided to rent a car for our
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
                            and stress-free regarding transportation.</p>
                        <p class="text-center">#Hangnama is always best for your harmony</p>
                        <div class="text-center">
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>

                    <div class="item">
                        <img id="gambar-mitra" src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.27.10.jpeg') }}"
                            class="img-fluid rounded testimonial-img" alt="">
                        <h5 class="text-center mt-3">Mr. Joko, Entrepreneur, Indonesia</h5>
                        <p class="text-center">I booked a car through Hangnama car rental, and it was ready when I
                            arrived at the
                            destination city. The rental process was quick and seamless, and
                            the car was very clean and well-maintained. This experience
                            helped me manage my meeting
                            schedule efficiently and give a professional impression to the
                            client.</p>
                        <p class="text-center">#Hangnama is always best for change your harmony</p>
                        <div class="text-center">
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>

                    <div class="item">
                        <img id="gambar-mitra" src="{{ asset('images/WhatsApp Image 2023-07-22 at 12.27.50.jpeg') }}"
                            class="img-fluid rounded testimonial-img" alt="">
                        <h5 class="text-center mt-3">Mr. Trisno, Architect, Indonesia</h5>
                        <p class="text-center">After an accident left my car under long-term repair, I decided to rent
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
                        <p class="text-center">#Hangnama is always best for change your life</p>
                        <div class="text-center">
                            <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="questions" class="p-5">
        <div class="container" data-aos="fade-up" data-aos-duration="3000">
            <h2 class="text-center mb-4">Pertanyaan yang mungkin diajukan</h2>
            <div class="accordion accordion-flush" id="questions">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-one">
                            Apa jenis mobil yang tersedia di toko Anda?
                        </button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            <p>
                                Di toko kami, kami menawarkan berbagai jenis mobil, termasuk mobil sedan, SUV, dan mobil
                                listrik. Kami juga memiliki mobil bekas dengan berbagai merek terkenal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-two">
                            Apakah mobil-mobil yang dijual di toko Anda memiliki jaminan?
                        </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            <p>
                                Ya, semua mobil yang kami jual dilengkapi dengan jaminan. Rincian tentang jaminan ini
                                dapat ditemukan pada deskripsi setiap mobil di situs web kami atau dapat dijelaskan oleh
                                salah satu
                                penasihat penjualan kami.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-three">
                            Apakah Anda memiliki program pembiayaan atau penyewaan mobil?
                        </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Kami menawarkan program pembiayaan mobil dengan suku bunga yang bersaing. Selain itu, kami
                            juga memiliki program penyewaan mobil jangka pendek dan jangka panjang.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-four">
                            Apakah saya dapat melakukan uji coba mobil sebelum membelinya?
                        </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            <p>
                                Ya, Anda bisa melakukan uji coba mobil sebelum membelinya. Kami sangat menganjurkan
                                pelanggan untuk menguji mobil yang mereka minati sebelum membuat keputusan pembelian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact py-5">
        <div class="container card border-0 bg-light mb-2 p-4">
            <div class="container py-5" data-aos="fade-up" data-aos-duration="3000">
                <div class="row">
                    <div class="col-lg-5 mx-auto text-center">
                        <h1>Contact Us</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <div class="row py-3">
                            <div class="col-lg-4 mb-4">
                                <h6>LOCATION</h6>
                                <p>Departemen Sistem Informasi<br> Fakultas Teknologi Elektro dan Informatika Cerdas
                                    <br>Institut
                                    Teknologi Sepuluh Nopember Surabaya
                                </p>
                                <h6>PHONE</h6>
                                <p>+62-812-32655416</p>
                            </div>
                            <div class="col-lg-8">
                                <div class="row mb-3">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <input type="text" class="form-control bg-light" placeholder="First Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control bg-light" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <textarea name="" class="form-control bg-light" placeholder="Description Your Job" id=""
                                            cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-6 mx-auto">
                                        <input type="email" class="form-control bg-light" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12 mx-auto">
                                        <textarea name="" class="form-control bg-light" placeholder="Your message" id="" cols="30"
                                            rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                            data-bs-target="#enroll">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news py-5">
        <div class="container" data-aos="fade-up" data-aos-duration="3000">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h5 class="pb-3">POLICY</h5>
                            <p>Shipping & Returns</p>
                            <p>Term & Conditions</p>
                            <p>Payment Methods</p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h5 class="pb-3">CUSTOMER CARE</h5>
                            <p>About Us</p>
                            <p>Customer Service</p>
                            <p>Contact</p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h5 class="pb-3">MENU</h5>
                            <p>Home</p>
                            <p>Brands</p>
                            <p>Mitra & Borrowers</p>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <h5 class="pb-3">SOCIAL MEDIA</h5>
                            <a href="#"><i class="bi bi-facebook text-white mx-1"></i></a>
                            <a href="#"><i class="bi bi-instagram text-white mx-1"></i></a>
                            <a href="#"><i class="bi bi-twitter text-white mx-1"></i></a>
                            <a href="#"><i class="bi bi-google text-white mx-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center">Copyright HANGNAMA CAR since 2023</p>
        </div>
    </section>

    <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollLabel">Enrollment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">Fill out this form and we will get back to you</p>
                    <form>
                        <div class="mb-3">
                            <label for="first-name" class="col-form-label">
                                First Name:
                            </label>
                            <input type="text" class="form-control" id="first-name" />
                        </div>
                        <div class="mb-3">
                            <label for="last-name" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last-name" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="col-form-label">Phone:</label>
                            <input type="tel" class="form-control" id="phone" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "1px 1px";
                document.getElementById("logo").style.width = "50px";
            } else {
                document.getElementById("navbar").style.padding = "5px 5px";
                document.getElementById("logo").style.width = "70px";
            }
        }

        AOS.init();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const myCarouselElement = document.getElementById('carousel');
            const animationClasses = ['fade-in-from-left', 'fade-in-from-right'];

            myCarouselElement.addEventListener('slide.bs.carousel', function(event) {
                const nextSlide = event.relatedTarget;

                const allItems = myCarouselElement.querySelectorAll('.carousel-item');
                allItems.forEach(item => {
                    item.classList.remove(...animationClasses);
                });

                if (event.direction === 'left') {
                    nextSlide.classList.add('fade-in-from-right');
                } else if (event.direction === 'right') {
                    nextSlide.classList.add('fade-in-from-left');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true, // Agar bisa berputar terus
                margin: 20, // Jarak antar item
                nav: true, // Menampilkan panah navigasi (kiri-kanan)
                dots: true, // Menampilkan titik-titik navigasi
                responsive: {
                    0: {
                        items: 1 // Di layar 0px ke atas, tampilkan 1 item (Mobile)
                    },
                    768: {
                        items: 2 // Di layar 768px ke atas, tampilkan 2 item (Tablet)
                    },
                    992: {
                        items: 3 // Di layar 992px ke atas, tampilkan 3 item (Desktop)
                    }
                }
            });
            $('#brands-section .owl-carousel').owlCarousel({
                loop: false,
                margin: 15,
                nav: true,
                dots: true,
                slideBy: 'page', // <-- TAMBAHKAN BARIS INI
                responsive: {
                    0: {
                        items: 2 // Tampilkan 2 item
                    },
                    600: {
                        items: 3 // Tampilkan 3 item
                    },
                    1000: {
                        items: 5 // Tampilkan 5 item
                    }
                }
            });
        });
    </script>
</body>

</html>
