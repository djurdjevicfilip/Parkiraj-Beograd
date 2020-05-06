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

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header-top">
        <div class="container">
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Parkiraj! Beograd</a></li>
                    <li><a href="#about">O projektu</a></li>
                    <li><a href="#services">Funkcionalnosti</a></li>
                    <li><a href="{{ URL::to('laravel.me/#login')}}">Uloguj se</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->
    
    <!-- =======  Login and Registration Section ======= -->
    <section id="login" class="section-show">
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
                                        <div class="form-group{{ $errors->has('email1') ? ' has-error' : '' }}">
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
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <input id="email" type="email" class="form-control"placeholder="Email *" name="email" value="{{ old('email') }}" required> @if ($errors->has('email'))
                                                        <span class="help-block">
                                             <strong>{{ $errors->first('email') }}</strong>
                                             </span> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control"placeholder="Šifra *" name="password" required> @if ($errors->has('password'))
                                                        <span class="help-block">
                                             <strong>{{ $errors->first('password') }}</strong>
                                             </span> @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input id="password-confirm" type="password" class="form-control"placeholder="Ponovi šifru *" name="password_confirmation" required>
                                                    </div>
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