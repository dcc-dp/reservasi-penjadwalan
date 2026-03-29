<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Bliss || Digital Agency</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('template/img/favicon.svg') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-5.0.0-beta2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}" />
</head>

<body>

    <!-- PRELOADER -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('template/img/logo/logo.svg') }}" alt="Logo" />
                    </a>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto">

                            <li>
                                <a href="{{ route('pages.home') }}"
                                    class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}"
                                    class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('benefit') }}"
                                    class="nav-item nav-link {{ Request::is('benefit') ? 'active' : '' }}">Benefit</a>
                            </li>
                            <li>
                                <a href="{{ route('pakets') }}"
                                    class="nav-item nav-link {{ Request::is('pakets') ? 'active' : '' }}">Program
                                    Package</a>
                            </li>
                            <li>
                                @guest
                                    <a href="{{ route('siswa.login') }}" class="btn btn-outline-primar">
                                        Get Started
                                    </a>
                                @endguest

                                @auth
                                    <a href="{{ route('siswa.dashboard') }}" class="btn btn-primary ">
                                        Dashboard
                                    </a>
                                @endauth

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft" data-wow-delay=".2s">Welcome To Bliss</span>
                        <h1 class="wow fadeInUp" data-wow-delay=".4s">
                            Ready to level up your coding skills?
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Upgrade to access all courses, book your classes easily, and learn without limits.
                        </p>
                        <a href="javascript:void(0)" class="main-btn btn-hover wow fadeInUp" data-wow-delay=".6s">Join
                            Now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="{{ asset('template/img/hero/hero-img.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================= about-section start ========================= -->
    <section id="about" class="about-section pt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img mb-50">
                        <img src="{{ asset('template/img/about/about-img.svg') }}" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mb-50">
                        <div class="section-title mb-50">
                            <h1 class="mb-25">About Us</h1>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                accusam et justo duo dolores.</p>
                        </div>

                        <div class="accordion pb-15" id="accordionExample">
                            <div class="single-faq">
                                <button class="w-100 text-start" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true">
                                    What programming courses do you offer?
                                </button>
                                <div id="collapseOne" class="collapse show" data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        We offer various programming courses such as Web Development, Python,
                                        JavaScript, and UI/UX basics for beginners to advanced learners.
                                    </div>
                                </div>
                            </div>

                            <div class="single-faq">
                                <button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false">
                                    How does the learning process work?
                                </button>
                                <div id="collapseTwo" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        Learning is conducted through interactive sessions, real projects, and mentoring
                                        support to ensure you understand the material effectively.
                                    </div>
                                </div>
                            </div>

                            <div class="single-faq">
                                <button class="w-100 text-start collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false">
                                    Do I need prior experience to join?
                                </button>
                                <div id="collapseThree" class="collapse" data-bs-parent="#accordionExample">
                                    <div class="faq-content">
                                        No, our courses are designed for beginners. We will guide you step by step from
                                        the basics.
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= about-section end ========================= -->

    <!-- ========================= service-section start ========================= -->
    <section id="service" class="service-section img-bg pt-100 pb-100 mt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-50">
                        <h1>Our Programming Courses</h1>
                        <p>Learn coding from scratch with hands-on projects and expert mentors.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-1">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="content">
                            <h3>Algorithm</h3>
                            <p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <i class="lni lni-code-alt"></i>
                        </div>
                        <div class="content">
                            <h3>Web Development</h3>
                            <p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-3">
                            <i class="lni lni-pallet"></i>
                        </div>
                        <div class="content">
                            <h3>Graphics design</h3>
                            <p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="single-service">
                        <div class="icon color-4">
                            <i class="lni lni-vector"></i>
                        </div>
                        <div class="content">
                            <h3>Brand design</h3>
                            <p>Lorem ipsum dolor sitsdw consetsad pscing eliewtr, diam nonumy.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="view-all-btn text-center pt-30">
                <a href="javascript:void(0)" class="main-btn btn-hover">View All Services</a>
            </div>

        </div>
    </section>
    <!-- ========================= service-section end ========================= -->

    <!-- ========================= cta-section start ========================= -->
    <section class="cta-section img-bg pt-110 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title mb-50">
                        <h1 class="mb-20 wow fadeInUp" data-wow-delay=".2s">Ready to start your coding journey?
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Join our classes and build real-world projects with expert guidance.</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="cta-btn text-lg-end mb-50">
                        <a href="javascript:void(0)" class="main-btn btn-hover text-uppercase">Start coding, build your future.</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= cta-section end ========================= -->

    <!-- FOOTER -->
    <footer class="footer text-center p-4">
        <p>© {{ date('Y') }} Course App</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('template/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
    <script src="{{ asset('template/js/count-up.min.js') }}"></script>
    <script src="{{ asset('template/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('template/js/wow.min.js') }}"></script>
    <script src="{{ asset('template/js/polifill.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>

</html>
