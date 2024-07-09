<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Puskesmas App | Landing Page</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="asset/vendor/aos/aos.css" rel="stylesheet">
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="asset/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="asset/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                {{-- <h1><a href="index.html"><span>PuskesmasApp</span></a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{ route('landing') }}"><img src="assets/images/main-logo.svg" alt=""
                        class="img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#poli">Poli</a></li>
                    <li><a class="nav-link scrollto" href="#queue">Antrian</a></li>
                    <li><a class="nav-link scrollto" href="#doctor">Dokter</a></li>
                    <div class="text-center ms-4">
                        @if (Auth::check())
                            @if ($user->role === 'patient')
                                <a href="{{ route('patient.dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
                            @elseif ($user->role === 'doctor')
                                <a href="{{ route('doctor.dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
                            @elseif ($user->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary px-4">Dashboard</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary px-4">Masuk</a>
                        @endif

                    </div>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Dapat penanganan cepat dengan <span>MyPuskesmas</span></h1>
                        <h2>Kami siap melayani anda 24 jam melalui online.</h2>
                        <div class="text-center text-lg-start">
                            @if (Auth::check())
                                @if ($user->role === 'patient')
                                    <a href="{{ route('patient.dashboard') }}" class="btn-get-started scrollto">Mulai
                                        Sekarang</a>
                                @elseif ($user->role === 'doctor')
                                    <a href="{{ route('doctor.dashboard') }}" class="btn-get-started scrollto">Mulai
                                        Sekarang</a>
                                @elseif ($user->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="btn-get-started scrollto">Mulai
                                        Sekarang</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn-get-started scrollto">Mulai Sekarang</a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="asset/img/public-health-animate.svg" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>MyPuskesmas suatu solutif untuk kamu yang gak mau ribet.</h3>
                        <p>Dapatkan pelayanan puskesmas langsung dari layar anda tanpa harus datang ke puskesmas dan
                            antri panjang.</p>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-coin-stack"></i></div>
                            <h4 class="title"><a href="">Antrian Online</a></h4>
                            <p class="description">Ambil antrian kamu dan pantau antrian secara daring tanpa
                                menebak-nebak antrian di puskesmas</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="bx bx-user-voice"></i></div>
                            <h4 class="title"><a href="">Janji Temu</a></h4>
                            <p class="description">Buat janji temu kini gak perlu datang ke puskesmas dan membuat janji
                                temu bersama dokte. Tinggal chat dokter dari MyPuskesmas</p>
                        </div>

                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="bx bx-history"></i></div>
                            <h4 class="title"><a href="">Riwayat Kesehatan</a></h4>
                            <p class="description">Lihat riwayat kesehatan kamu secara online tanpa perlu pergi ke
                                puskesmas untuk dapat informasi kesehatan kamu</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="poli" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Poli</h2>
                    <p>Tersedia beberapa macam poli</p>
                </div>

                <div class="row" data-aos="fade-left">
                    @foreach ($polyclinics as $poly)
                        <div class="col-lg-3 col-md-4 mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                                <i class="ri-hospital-line" style="color: #5578ff;"></i>
                                <h3>{{ $poly->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Counts Section ======= -->
        <section id="queue" class="counts">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Antrian</h2>
                    <p>Lihat antrian hari ini.</p>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-6 d-flex flex-wrap">

                        <div class="col-lg-6 mt-2">
                            <div class="count-box">
                                <i class="bi-person-badge"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $patientCount }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Pasien Terdaftar</p>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="count-box">
                                <i class="bi-person-lines-fill"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $queueCount }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Jumlah Antrian</p>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="count-box">
                                <i class="bi-list-check"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $appointmentDoneCount }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Antrian Selesai</p>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-2">
                            <div class="count-box">
                                <i class="bi-file-earmark-person"></i>
                                <span data-purecounter-start="0" data-purecounter-end="{{ $doctors->count() }}"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Jumlah Dokter</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Poli</th>
                                                <th>Dokter</th>
                                                <th>Status</th>
                                                <th>Jam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($queues as $queue)
                                                <tr>
                                                    <td>{{ $queue->polyclinic->name }}</td>
                                                    <td>{{ $queue->doctor->user->name }}</td>
                                                    <td>{{ $queue->patient->user->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($queue->queued_at)->format('H:i a') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">Tidak ada Antrian</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {!! $queues->withQueryString()->links('vendor.pagination.mypagination') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        {{-- Dokter Section --}}
        <section id="doctor" class="team">
            <div class="container">

                <div class="section-title aos-init aos-animate" data-aos="fade-up">
                    <h2>Dokter</h2>
                    <p>Pelayanan dokter yang profesional</p>
                </div>

                <div class="row aos-init aos-animate" data-aos="fade-left">

                    @foreach ($doctors as $doctor)
                        <div class="col-lg-3 col-md-6 mt-4">
                            <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pic"><img src="{{ asset($doctor->photo) }}" class="img-fluid"
                                        alt=""></div>
                                <div class="member-info">
                                    <h4>{{ $doctor->user->name }}</h4>
                                    <span>{{ $doctor->polyclinic->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Anwar Ajijuloh</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
                Develop by <a href="https://bootstrapmade.com/">Anwar Ajijuloh</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="asset/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="asset/vendor/aos/aos.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="asset/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="asset/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="asset/js/main.js"></script>

</body>

</html>
