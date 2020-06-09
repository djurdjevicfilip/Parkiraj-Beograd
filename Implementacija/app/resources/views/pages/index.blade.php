<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Pocetna</title>
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
    <script src="/maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="/cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">
</head>
{{logger($errors->getMessages())}}
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header-tops">
        <div class="container">
            <h1><a href="index.html">Parkiraj! Beograd</a></h1>
            <h2><span>Prva</span> veb aplikacija za parkiranje <span> uz pomoć senzora </span> u Srbiji </h2>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Parkiraj! Beograd</a></li>
                    <li><a href="#about">O projektu</a></li>
                    <li><a href="#services">Funkcionalnosti</a></li>
                    <li><a id="login-button" href="#login">Uloguj se</a></li>
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
                <h2>O projektu</h2>
                <p>Informacije o projektu</p>
            </div>
            <div class="row">
                <div class="col-lg-12 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>Principi Softverskog Inženjerstva</h3>
                    <p class="font-italic">
                        Projekat <b>Parkiraj! Beograd</b> je projekat za predmet Principi Softverskog Inženjersta, Elektrotehničkog fakulteta u Beogradu.
                        <hr/> Članovi tima:
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> Danilo Dabović</li>
                                <li><i class="icofont-rounded-right"></i> Milan Ciganović</li>
                                <li><i class="icofont-rounded-right"></i> Filip Đurđević</li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        Velika frustracija za vozače (posebno u velikim gradovima) je parkiranje. Ogromna količina vremena i goriva se troši na traženje slobodnog parking mesta. Od 2016. godine u Beogradu je instalirano 3600 parking senzora koji pružaju informaciju o slobodnim parking mestima. Na osnovu ove informacije došli smo na ideju da svaki dan olakšamo vozačima. Koristeći ove senzore, pomogli bismo vozačima da se brže parkiraju, i samim tim sačuvaju vreme i gorivo.Veliki deo Beograda pokriven je zonama za parkiranje. Parkiraj! Beograd pomoći će korisnicima da nađu mesta pokrivena senzorima. Senzori za sada čine jedan manji deo ove pokrivenosti.
                    </p>
                </div>
            </div>
        </div>
        <!-- End About Me -->
        <!-- ======= Counts ======= -->
        <div class="counts container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="icofont-adjust"></i>
                        <span data-toggle="counter-up">3600</span>
                        <p>Postavljenih senzora</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-check"></i>
                        <span data-toggle="counter-up">4</span>
                        <p>Zone</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-users-alt-5"></i>
                        <span data-toggle="counter-up">3</span>
                        <p>Člana tima</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counts -->
        <!-- ======= Skills  ======= -->
        <div class="skills container">
            <div class="section-title">
                <h2>Napredak
               </h2>
            </div>
            <div class="row skills-content">
                <div class="col-lg-6">
                    <div class="progress">
                        <span class="skill">Prva faza <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress">
                        <span class="skill">Druga faza <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress">
                        <span class="skill">Treća faza <i class="val">100%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="progress">
                        <span class="skill">Četvrta faza <i class="val">85%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress">
                        <span class="skill">Peta faza <i class="val">10%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="progress">
                        <span class="skill">Implementacija <i class="val">20%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Skills -->
        <!-- ======= Testimonials ======= -->
        <div class="testimonials container">
            <div class="section-title">
                <h2>Parking Servis:</h2>
            </div>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> U Beogradu, Sistem za praćenje slobodnih parking mesta počeo je sa radom 2016. godine u Njegoševoj i okolnim ulicama. Od tada je proširen i na deo grada oivičen ulicama Beogradska, Krunska, Baba Višnjina i Bulevar kralja Aleksandra, a zatim i na prostor do Kliničkog centra i Bulevara oslobođenja.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Parking senzor, ugrađen na parking mestu, detektuje parkirano vozilo i šalje informaciju do info tabli na raskrsnicama ulica, na kojima vozači mogu da vide u kojoj ulici ima slobodnih mesta za parkiranje.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Izrada naše aplikacije obuhvataće simulaciju rada ovih senzora. 2 tipa korisnika imaće mogućnost dodavanja novih parking senzora, pri čemu lokacije neće biti ograničene bilo kakvim parametrima. Smatra se da je svako područje pokriveno, kao i da onaj ko dodaje senzore zna šta radi.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
                <div class="testimonial-item">
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>
            </div>
        </div>
        <!-- End Testimonials  -->
    </section>
    <!-- End About Section -->
    <!-- ======= Functionalities Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title">
                <h2>Funkcionalnosti</h2>
                <p>Funkcionalnosti projekta</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Autentifikacija korisničkih naloga</a></h4>
                        <p>Logovanje i registracija 3 različita tipa korisničkih naloga</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Prikazivanje mape</a></h4>
                        <p>Prikazivanje mape sa raznim markerima, clustering funkcijom i rutama </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Pronalazak najbližeg mesta</a></h4>
                        <p>Brz pronalazak najbližeg mesta u odnosu na trenutno ili izabrano mesto</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="">Simulacija</a></h4>
                        <p>Simulacija vožnje na mapi i simulacija senzora preko Task Scheduler-a</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="">Upravljanje nalozima i lokacijama</a></h4>
                        <p>Administrator ima mogućnost upravljanja nalozima i lokacijama</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="">Upozorenje</a></h4>
                        <p>Korisniku može da stigne upozorenje ako senzor do kog ide postane zauzet</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Functionalities Section -->
    
    <!-- =======  Login and Registration Section ======= -->
    <section id="login">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Dobrodošli</h3>
                    <p>Postanite korisnik</p>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Prijava</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registracija</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Prijavi se</h3>
                            <div class="row login-form">
                                <div class="col-md-12 login">
                                    
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        
                                  <div class="row">
                                <div class="col-md-9">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control" placeholder="Email " name="email" value="{{ old('email') }}" required autofocus> 
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                </span> 
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-12 control-label">Password</label>
                                                <div class="col-md-12">
                                                    <input id="password" type="password" class="form-control" placeholder="Šifra " name="password" required> 
                                                    @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span> 
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                        <div class="col-md-3"><input type="submit" class="btnLogin" value="Prijavi se" />
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3 class="register-heading">Registruj se</h3>
                            <div class="row register-form">
                                <div class="col-12 col-md-12">
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <input id="name" type="text" class="form-control"placeholder="Ime *" name="name" value="{{ old('name') }}" required autofocus> @if ($errors->has('name'))
                                                        <span class="help-block">
                                             <strong>{{ $errors->first('name') }}</strong>
                                                
                                             </span> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->register->has('email') ? ' has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <input id="email" type="email" class="form-control"placeholder="Email *" name="email" value="{{ old('email') }}" required> @if ($errors->register->has('email'))
                                                        <span class="help-block">
                                             <strong>{{ $errors->register->first('email') }}</strong>
                                             </span> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->register->has('password') ? ' has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control"placeholder="Šifra *" name="password" required> @if ($errors->register->has('password'))
                                                        <span class="help-block">
                                             <strong>{{ $errors->register->first('password') }}</strong>
                                             </span> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input id="password-confirm" type="password" class="form-control"placeholder="Ponovi šifru *" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                                <div class="control">
                                                    <select name="type"class="custom-select">
                                                        <option name="type"value="0"selected>Korisnik</option>
                                                        <option name="type"value="1">Moderator</option>
                                                    </select>
                                                    </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <button type="submit" class="btnRegister">
                                                        Registruj se
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login and Registration Section -->

    <div class="credits">
        Tim: <a>Sportaši</a>
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