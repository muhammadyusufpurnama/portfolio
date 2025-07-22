<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Huda & Firza Wedding Invitation</title> {{-- Ubah judul agar lebih spesifik --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('countdown/simplyCountdown.theme.default.css') }}">
    {{-- <script src="{{ asset('countdown/simplyCountdown.min.js') }}"></script> --}} {{-- JavaScript biasanya di body akhir --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Italianno&family=Sacramento&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/project2style.css') }}">
</head>

<body>
    <section id="hero"
        class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center">
        <main>
            <h4>Kepada <span>Bapak/Ibu/Saudara/i, </span></h4>
            <h1>Huda & Firza</h1>
            <p>akan melangsungkan resepsi pernikahan dalam:</p>
            <div class="simply-countdown"></div>
            <a href="#undangan" class="btn btn-lg mt-4" onclick="enableScroll()">Lihat undangan</a>
        </main>
    </section>

    <nav class="navbar navbar-expand-md sticky-top mynavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#hero">Huda & Firza</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Huda & Firza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="#home">Home</a>
                        <a class="nav-link" href="#info">Info</a>
                        <a class="nav-link" href="#story">Story</a>
                        <a class="nav-link" href="#gallery">Gallery</a>
                        <a class="nav-link" href="#rsvp">RSVP</a>
                        <a class="nav-link" href="#gifts">Gifts</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>Acara Pernikahan</h2>
                    <h3>Diselenggarakan pada 10 Desember 2025 di Gresik, Jawa Timur.</h3>
                    <p>Oleh karena itu dengan segala hormat, kami bermaksud untuk mengundang Bapak/Ibu/Saudara/i, untuk
                        hadir pada acara pernikahan kami.</p>
                </div>
            </div>

            <div class="row couple">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-8 text-end">
                            <h3>M. Huda Purnama</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam nihil, voluptates vel
                                itaque assumenda rem.</p>
                            <p>Putra dari Bpk. Puji<br> dan <br> Ibu Eni</p>
                        </div>
                        <div class="col-4">
                            <img src="{{ asset('images/Pria.jpg') }}" alt="mempelaiPria"
                                class="img-responsive rounded-circle">
                        </div>
                    </div>
                </div>

                <span class="heart"><i class="bi bi-heart-fill"></i></span>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('images/Wanita.jpg') }}" alt="mempelaiWanita"
                                class="img-responsive rounded-circle">
                        </div>
                        <div class="col-8">
                            <h3>Firza Laura</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam nihil, voluptates vel
                                itaque assumenda rem.</p>
                            <p>Putri dari Bpk. Djemadi<br> dan <br> Ibu Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="info" class="info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <h2>Informasi acara</h2>
                    <p class="alamat">
                        Alamat: Wisma Djenderal Achmad Yani.<br>
                        Jl. Veteran, Kb. Dalem, Sidokumpul, Kec. Gresik, Kabupaten Gresik
                    </p>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.631623092742!2d112.6482122722594!3d-7.16851271185177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd801b94ea95e0f%3A0x83fc8be1c712b3c4!2sGraha%20Kartini%20Ballroom!5e0!3m2!1sid!2sid!4v1753167026646!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <a href="https://maps.app.goo.gl/SfN61ww4uErnobFc8" target="_blank" {{-- Ganti dengan link Google Maps yang valid --}}
                        class="btn btn-light btn-sm my-3">
                        Klik untuk membuka peta
                    </a>
                    <p class="description">
                        Diharapkan untuk tidak salah alamat dan tanggal. Manakala sudah tiba ditujuan namun tidak ada
                        tanda-tanda sedang dilangsungkan pernikahan, boleh jadi anda dalah jadwal atau salah tempat.
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-5 col-10 my-3">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Akad Nikah</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock d-block"></i>
                                    <span>08.00 - 10.00</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar3 d-block"></i>
                                    <span>Selasa, 10 Desember 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh
                            prosesi.
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-10 my-3">
                    <div class="card text-center text-bg-light">
                        <div class="card-header">Resepsi</div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <i class="bi bi-clock d-block"></i>
                                    <span>11.00 - selesai</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="bi bi-calendar3 d-block"></i>
                                    <span>Selasa, 10 Desember 2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Saat acara resepsi diharapkan untuk datang tepa waktu.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="story" class="story">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-10 text-center">
                    <span>
                        Bagaimana cinta kami bersemi
                    </span>
                    <h2>
                        Cerita kami
                    </h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore et adipisci earum natus eius
                        culpa.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image"
                                style="background-image: url({{ asset('images/story1.jpeg') }});"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading"></div>
                                <h3>
                                    Pertama bertemu
                                </h3>
                                <span>
                                    1 Agustus 2022
                                </span>
                                <div class="timeline-body">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ipsam
                                        explicabo, hic placeat nihil atque.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image"
                                style="background-image: url({{ asset('images/story2.JPG') }});">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading"></div>
                                <h3>
                                    Mulai dekat
                                </h3>
                                <span>
                                    8 Maret 2023
                                </span>
                                <div class="timeline-body">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ipsam
                                        explicabo, hic placeat nihil atque.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image"
                                style="background-image: url({{ asset('images/story3.jpg') }});">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading"></div>
                                <h3>
                                    Tunangan
                                </h3>
                                <span>
                                    Coming Soon
                                </span>
                                <div class="timeline-body">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio repellat eum
                                        aliquam fugit sapiente consequatur, corrupti in dolore ad facilis.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery">
        <div class="container">
            <div class="row justify-content-center my-3">
                <div class="col-md-8 col-10 text-center">
                    <span>
                        Memori Kisah Kami
                    </span>
                    <h2>
                        Galeri Foto
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, eligendi.
                    </p>
                </div>
            </div>

            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col mt-3">
                    <a href="{{ asset('images/gallery/1.JPG') }}" data-toggle="lightbox"
                        data-caption="Foto Kebersamaan Kami" data-gallery="galeri">
                        <img src="{{ asset('images/gallery/thumbnail/1.JPG') }}" alt="Huda&Firza1"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3">
                    <a href="{{ asset('images/gallery/2.JPG') }}" data-toggle="lightbox"
                        data-caption="Foto Kebersamaan Kami" data-gallery="galeri">
                        <img src="{{ asset('images/gallery/thumbnail/2.JPG') }}" alt="Huda&Firza2"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3"> {{-- data-toggle="lightbox" data-caption="Foto Kebersamaan Kami" data-gallery="galeri" di luar <a> --}}
                    <a href="{{ asset('images/gallery/3.jpg') }}" data-toggle="lightbox"
                        data-caption="Foto Kebersamaan Kami" data-gallery="galeri">
                        <img src="{{ asset('images/gallery/thumbnail/3.jpg') }}" alt="Huda&Firza3"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3"> {{-- data-toggle="lightbox" data-caption="Foto Kebersamaan Kami" data-gallery="galeri" di luar <a> --}}
                    <a href="{{ asset('images/gallery/4.JPG') }}" data-toggle="lightbox"
                        data-caption="Foto Kebersamaan Kami" data-gallery="galeri">
                        <img src="{{ asset('images/gallery/thumbnail/4.JPG') }}" alt="Huda&Firza4"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
                <div class="col mt-3"> {{-- data-toggle="lightbox" data-caption="Foto Kebersamaan Kami" data-gallery="galeri" di luar <a> --}}
                    <a href="{{ asset('images/gallery/5.JPG') }}" data-toggle="lightbox"
                        data-caption="Foto Kebersamaan Kami" data-gallery="galeri">
                        <img src="{{ asset('images/gallery/thumbnail/5.JPG') }}" alt="Huda&Firza5"
                            class="img-fluid w-100 rounded">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="rsvp" class="rsvp">
        <div class="container">
            <div class="row justify-content-center my-3">
                <div class="col-md-8 col-10 text-center">
                    <h2>
                        Konfirmasi Kehadiran
                    </h2>
                    <p>
                        Isi form dibawah ini untuk melakukan konfirmasi kehadiran.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item">
                            {{-- Form RSVP akan kita arahkan ke Controller Laravel, bukan Google Sheets langsung --}}
                            <form class="row row-cols-md-auto g-3 align-items-center justify-content-center"
                                method="POST" action="{{ url('/rsvp/store') }}" {{-- Akan membuat route baru --}}
                                id="my-form">
                                @csrf {{-- Token CSRF Laravel --}}
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ request('n') }}"> {{-- Pre-fill nama dari URL --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                                            min="1" max="5" value="1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Konfirmasi</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="">Pilih salah satu</option> {{-- Nilai kosong untuk default --}}
                                            <option value="Hadir">Hadir</option>
                                            <option value="Tidak Hadir">Tidak Hadir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-top: 20px;">Kirim</button>
                                </div>
                            </form>
                        </li>
                        <li class="list-group-item">
                            <div class="row justify-content-center mt-5">
                                <div class="col-md-6">
                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                         * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
                                        /*
                                        var disqus_config = function () {
                                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        */
                                        (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document,
                                                s = d.createElement('script');
                                            s.src = 'https://wedding-discussion.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a
                                            href="https://disqus.com/?ref_noscript">comments
                                            powered by Disqus.</a></noscript>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <section id="gifts" class="gifts">
        <div class="container">
            <div class="row justify-content-center my-3">
                <div class="col-md-8 col-10 text-center">
                    <span>ungkapan tanda kasih</span>
                    <h2>
                        Kirim Hadiah
                    </h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione vero fugit debitis eaque
                        deserunt voluptate?
                    </p>
                </div>
            </div>

            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="fw-bold">BNI</div>
                            123456789 - Huda Primadani
                        </li>
                        <li class="list-group-item">
                            <div class="fw-bold">BCA</div>
                            987654321 - Firza Laura
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="block">© {{ date('Y') }} YuSa Wedding. All Rights Reserved.</small>
                    <small class="block">Designed by <a
                            href="https://www.instagram.com/muhammad_yusufpurnama?igsh=MWZheWs2dmU4OGo4cw==">@hudaprimadani</a></small>
                    </small>
                    <ul class="mt-3">
                        <li><a href="https://www.instagram.com/muhammad_yusufpurnama?igsh=MWZheWs2dmU4OGo4cw=="
                                target="_blank"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-youtube"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-twitter-x"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-tiktok"></i></a></li>
                        <li><a href="#" target="_blank"><i class="bi bi-facebook"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div id="audio-container">
        <audio id="bgm" autoplay loop>
            <source src="{{ asset('audio/Christina Perri - A Thousand Years (PianoCello Cover).mp3') }}"
                type="audio/mp3">
        </audio>

        <div class="audio-icon-wrapper" style="display: none;">
            <i class="bi bi-disc"></i>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

    <script src="{{ asset('countdown/simplyCountdown.min.js') }}"></script> {{-- Pindahkan JS ke sini --}}

    <script>
        // Set tanggal acara pernikahan
        // PERHATIAN: simplyCountdown mengambil bulan dari 0-11, jadi Desember (bulan ke-12) adalah 11.
        simplyCountdown('.simply-countdown', {
            year: 2025, // required
            month: 12, // required (Jika target 10 Desember 2025, bulan adalah 12)
            day: 10, // required
            hours: 8, // Default is 0 [0-23] integer
            words: { //words displayed into the countdown
                days: {
                    singular: 'hari',
                    plural: 'hari'
                },
                hours: {
                    singular: 'jam',
                    plural: 'jam'
                },
                minutes: {
                    singular: 'menit',
                    plural: 'menit'
                },
                seconds: {
                    singular: 'detik',
                    plural: 'detik'
                }
            }
        });
    </script>

    <script>
        const stickyTop = document.querySelector('.sticky-top');
        const offcanvas = document.querySelector('.offcanvas');

        offcanvas.addEventListener('show.bs.offcanvas', function() {
            stickyTop.style.overflow = 'visible';
        });

        offcanvas.addEventListener('hidden.bs.offcanvas', function() {
            stickyTop.style.overflow = 'hidden';
        });
    </script>

    <script>
        const rootElement = document.querySelector(":root");
        const audioIconWrapper = document.querySelector('.audio-icon-wrapper');
        const bgm = document.querySelector('#bgm');
        const audioIcon = document.querySelector('.audio-icon-wrapper i');
        let isPlaying = false;

        function disableScroll() {
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
            const overflow = document.querySelector('body');
            overflow.style.overflow = 'hidden';

            window.onscroll = function() {
                window.scrollTo(scrollTop, scrollLeft);
            }

            rootElement.style.scrollBehavior = 'auto';
        }

        function enableScroll() {
            const overflow = document.querySelector('body');
            overflow.style.overflow = 'visible';

            window.onscroll = function() {}

            const rootElement = document.querySelector(":root");
            rootElement.style.scrollBehavior = 'smooth';

            // localStorage.setItem('opened', 'true'); // Dihapus karena fitur ini sudah tidak aktif
            playAudio();
        }

        function playAudio() {
            bgm.volume = 0.2;
            audioIconWrapper.style.display = 'flex';
            bgm.play();
            isPlaying = true;
        }

        audioIconWrapper.onclick = function() {
            if (isPlaying) {
                bgm.pause();
                audioIcon.classList.remove('bi-disc');
                audioIcon.classList.add('bi-pause-circle');
            } else {
                bgm.play();
                audioIcon.classList.add('bi-disc');
                audioIcon.classList.remove('bi-pause-circle');
            }
            isPlaying = !isPlaying;
        }

        // if (!localStorage.getItem('opened')) { // Dihapus karena fitur ini sudah tidak aktif
        //     disableScroll();
        // }

        disableScroll(); // Panggil ini agar scroll disable di awal
    </script>

    <script>
        // Form submission handled by Laravel Controller now, so original JS form submission removed.
        // Tampilkan pesan sukses dari session (jika ada)
        @if (session('success'))
            alert("{{ session('success') }}"); // Menggunakan alert sederhana atau SweetAlert2 jika diimport
        @endif
        @if (session('error'))
            alert("{{ session('error') }}");
        @endif
    </script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const nama = urlParams.get('n') || '';
        const pronoun = urlParams.get('p') || 'Bapak/Ibu/Saudara/i';

        const namaContainer = document.querySelector('.hero h4 span');
        if (namaContainer) { // Pastikan elemen ditemukan sebelum memodifikasi
            namaContainer.innerText = `${pronoun} ${nama},`.replace(/ ,$/, ',');
        }


        const namaInputField = document.querySelector('#nama');
        if (namaInputField) { // Pastikan elemen ditemukan sebelum memodifikasi
            namaInputField.value = nama;
        }
    </script>
</body>

</html>
