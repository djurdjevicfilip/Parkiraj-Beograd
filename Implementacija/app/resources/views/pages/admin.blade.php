<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Administrator</title>
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
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header-tops">
        <div class="container">

            <h1><a href="index.html">Parkiraj! Beograd</a></h1>
            <h2><span>Prva</span> veb aplikacija za parkiranje <span> uz pomoć senzora </span> u Srbiji </h2>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Parkiraj! Beograd</a></li>
                    <li><a href="#users">Nalozi</a></li>
                    <li><a href="#locations">Lokacije</a></li>
                    <li><a href="#login">Promeni šifru</a></li>
                    <li><a href="#add-location">Dodaj mesto</a></li>
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

    <!-- ======= Password Change Section ======= -->
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
    <!-- End Of Password Change Section -->
    <!-- ======= Add Location Section ======= -->
    <section id="add-location">
        <div class="container register">
            <div class="row">
                <div class="col-md-12 add-locations">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Dodaj mesto</h3>
                                <form action="locations"method="post" class="locations-form">
                                    {{ csrf_field() }}
                                    <div class="field">
                                        <label class="label">Name</label>
                                        <div class="control">
                                            <input name="x"class="form-control"type="text"placeholder="X Koordinata*">
                                        </div>
                                        
                                        <div class="control">
                                            <input name="y"class="form-control"type="text"placeholder="Y Koordinata*">
                                        </div>

                                        <div class="control">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parkingType" id="sensor" value="sensor" checked>
                                            <label class="form-check-label" for="sensor" style="color:#000240">
                                              Senzor
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parkingType" id="garage" value="garage">
                                            <label class="form-check-label" for="garage" style="color:#000240">
                                              Garaza
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control">
                                            <input id="capacity" name="capacity"class="form-control cap"type="text"placeholder="Kapacitet*">
                                        </div>
                                    </div>
                                    <div class="fieldis-grouped">
                                        <div class="control">
                                            <button 
                                            class="btnLogin">Dodaj</button></div></form>
                            </div>

                        </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Of Add Location Section -->
    <!-- ======= User Table Section ======= -->
    <section id="users">
        <div class="container">
            <div class="section-title">
                <h2>Nalozi</h2>
                <p>Tabela sa svim nalozima</p>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Redni broj</th>
                                    <th scope="col">Ime korisnika</th>
                                    <th scope="col">E-mail adresa korisnika</th>
                                    <th scope="col">Uloga korisnika</th>
                                    <th scope="col">Promeni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td> {{$user->idUser}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->type}} </td>
                                    <td style="width:120px">

                                        {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'up'], 'method' => 'PUT']) !!}
                                        <img src="https://img.icons8.com/color/48/000000/up.png" style="height: 25px;">{{Form::submit('Submit',['class'=>'btn btnPrimary'])}}
                                        {!! Form::close() !!} 
                                        {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'down'], 'method' => 'PUT']) !!}
                                        <img src="https://img.icons8.com/color/48/000000/down.png" style="height: 25px;"> {{Form::submit('Submit',['class'=>'btn btnPrimary'])}}
                                        {!! Form::close() !!} 
                                        {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'up'], 'method' => 'PUT']) !!}

                                        <img src="img/trash.jpg" style="height: 25px;"> {{Form::submit('Submit',['class'=>'btn btnPrimary'])}}
                                         {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of User Table Section -->
    
    <!-- ======= Locations Table Section ======= -->
    <section id="locations">
        <div class="container">
            <div class="section-title">
                <h2>Lokacije</h2>
                <p>Tabela sa svim lokacijama</p>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Redni broj</th>
                                    <th scope="col">Ime korisnika</th>
                                    <th scope="col">E-mail adresa korisnika</th>
                                    <th scope="col">Uloga korisnika</th>
                                    <th scope="col">Promeni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td> {{$user->idUser}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->type}} </td>
                                    <td style="width:120px">

                                        {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'up'], 'method' => 'PUT']) !!}
                                        <img src="https://img.icons8.com/color/48/000000/up.png" style="height: 25px;">
                                        <a type="submit" class='btn' href="#users">Unapredi</a> {!! Form::close() !!} {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'down'], 'method' => 'PUT']) !!}
                                        <img src="https://img.icons8.com/color/48/000000/down.png" style="height: 25px;"> {{Form::submit('Submit',['class'=>'btn btnPrimary'])}} {!! Form::close() !!} {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'up'], 'method' => 'PUT']) !!}

                                        <img src="img/trash.jpg" style="height: 25px;"> {{Form::submit('Submit',['class'=>'btn btnPrimary'])}} {!! Form::close() !!}

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Locations Table Section -->
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="section-title lft">
            <h2>Mapa</h2>
            <p>Pretraga mesta</p>
        </div>

        <div class="container-fullwidth" id="search">
            <div class="row map">
                <div class="col-12 col-lg-8 login-form-1 map">
                    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.788165965896!2d20.473947215498107!3d44.80550557909867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a9f5ee145d3%3A0x3ed89b5bb505d83!2sUniversity%20of%20Belgrade%20School%20of%20Electrical%20Engineering!5e0!3m2!1sen!2srs!4v1583616822176!5m2!1sen!2srs" width="100%" height="100%" frameborder="0" id="mapa" style="border:0;margin-top: 0;margin-bottom: 0;padding-top: 0;padding-left: 0;" allowfullscreen=""></iframe>

                </div>
                <div class="col-12 col-lg-3 login-form-1 mapSearch">
                    <div class="map-right">
                        <h3>Pretraži slobodna mesta</h3>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Lokacija za pretragu" value="" />
                                <a class="btn btnSubmit" onclick='f2()' value="Pronađi slobodno mesto" style=" margin-top:0vw; margin-bottom:10px; padding-top:3%;">Pronađi slobodno mesto</a>
                                <a class="btn btnSubmit" onclick='f1()' value="Pronađi slobodno mesto" style=" margin-top:0vw;margin-bottom:10px; padding-top:3%;">Pregled mape</a>
                                <a class="btn btnSubmit" onclick='f()' value="Prikaži najbolju rutu" style=" margin-top:0vw; padding-top:3%;">Prikaži najbolju rutu</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="/js/admin.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable();
        });
        $(document).ready(function() {
            $('#dataTable2').dataTable();
        });
    </script>
</body>

</html>