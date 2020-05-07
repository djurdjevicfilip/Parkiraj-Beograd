<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Korisnik</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/vendor/venobox/venobox.css" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->

    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Pass locations data to javascript -->
    <script type="text/javascript">
        var data = {!! $data !!};
    </script>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>        

    <script src="/js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBOr3eB1bffutoazOYCopJncLycz2DHik&callback=initMap&libraries=places"
    async defer></script>

</head>

<body id="user-body">
    <!-- ======= Header ======= -->
    <header id="header" class="header-tops">
        <div class="container">

            <h1><a href="index.html">Parkiraj! Beograd</a></h1>
            <h2><span>Prva</span> veb aplikacija za parkiranje <span> uz pomoć senzora </span> u Srbiji </h2>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Parkiraj! Beograd</a></li>
                    <li><a href="#about">Moj Nalog</a></li>
                    <li><a href="#mapSection">Mapa</a></li>
                    <li><a href="#login">Promeni šifru</a></li>
                </ul>
            </nav>
            <!-- .nav-menu -->

            <div class="social-links">
                <a href="https://github.com/djurdjevicfilip/Parkiraj-Beograd" class="github"><i class="icofont-github"></i></a>
                <a href="https://www.etf.bg.ac.rs" class="etf"><i class="icofont-university"></i></a>
                <a href="https://parking-servis.co.rs/" class="parking-servis"><i class="icofont-info-circle"></i></a>
                <a href="http://si3psi.etf.rs/" class="psi"><i class="icofont-book"></i></a>
            </div>

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <!-- ======= About Me ======= -->
        <div class="about-me container">

            <div class="section-title">
                <h2>Nalog</h2>
                <p>Informacije o korisniku</p>
            </div>

            <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>{{ Auth::user()->name }}</h3>

                </div>
            </div>

        </div>
        <!-- End About Me -->

        <div class="container">

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-user"></i>
                        <h3>Ime i prezime</h3>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Moja Adresa</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>

                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>Poslovna Adresa</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Change Password Section ======= -->
    <section id="login">
        <div class="container register">
            <div class="row">
                <div class="col-md-12 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Promeni šifru</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Šifra *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Potvrdi šifru *" value="" />
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <input type="submit" class="btnLogin" value="Promeni šifru" />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    
    <!-- End Change Password Section -->

    <!-- ======= Map Section ======= -->
    <section id="mapSection" class="col-12 services">
        <div class="section-title lft">
            <h2>Mapa</h2>
        </div>
        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
        <div id="map" style="left:70px;height:660px;width:90%"></div>  
        <div class="container-fullwidth" id="search">
            <div class="row map">
                <div class="col-12 map">
                </div>
               
            </div>
        </div>
    </section>
    <!-- End Map Section -->

    <div class="credits">
        Tim: <a>Sportaši</a>
    </div>

    <div class="user">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">

            <i class="icofont-user"></i> {{ Auth::user()->name }} | Izloguj se
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    <!-- Vendor JS Files -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>
    <script src="/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="/vendor/counterup/counterup.min.js"></script>
    <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>

</body>

</html>