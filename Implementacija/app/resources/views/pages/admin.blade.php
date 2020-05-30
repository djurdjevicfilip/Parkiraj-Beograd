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
                    <li><a href="#moderators">Moderatori</a></li>
                    <li><a href="#locations">Lokacije</a></li>
                    <li><a href="#passchange">Promeni šifru</a></li>
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
    <section id="passchange">
        <div class="container register">
            <div class="row">
                <div class="col-md-12 register-right">

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="hom" role="tabpanel" aria-labelledby="home-tab">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Promeni šifru</h3>
                            <div class="row register-form">
                                <form style="width:100%; margin-left:33%"class="form-horizontal" method="post" action="passchange">
                                    {{ csrf_field() }}
                                @if($message=='1')
                                    <h4 style="color:#000240">Uspešno ste promenili šifru! ...</h4>
                                @elseif($message=='2')
                                    <h4 style="color:red">Niste uspešno promenili šifru!</h4>
                               @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="oldPassword"class="form-control" placeholder="Stara Šifra *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password"name="newPassword" class="form-control" placeholder="Nova šifru *" value="" />
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <input type="submit" class="btnLogin" value="Promeni šifru" />
                                </div>
                            </form>
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
                        <div class="tab-pane fade show active" id="hom" role="tabpanel" aria-labelledby="home-tab">
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Dodaj mesto</h3>

                                <form action="locations"method="post" class="locations-form">
                                    {{ csrf_field() }}
                                    <div class="field">
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
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="disabled"class="custom-control-input"style=" background-color:#000240" id="customCheck1">
                                            <label class="custom-control-label" style="color:#000240;"for="customCheck1">Invalidsko mesto</label>
                                          </div>
                                        <div class="control">
                                            <input id="capacity" name="capacity"class="form-control cap"type="text"placeholder="Kapacitet*">
                                        </div>
                                        
                                        <div class="control">
                                        <select name="zone"class="custom-select">
                                            <option name="zone"selected>Odaberi zonu*</option>
                                            <option name="zone"value="Plava">Plava</option>
                                            <option name="zone"value="Zelena">Zelena</option>
                                            <option name="zone"value="Crvena">Crvena</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="fieldis-grouped">
                                        <div class="control">
                                            <button 
                                            class="btnLogin">Dodaj</button></div>
                                </form>
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
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item nav-users">
                    <a class="nav-link nav-users active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aktivirani</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-users" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Neaktivirani</a>
                </li>
            </ul>
            <div class="tab-content tab-users" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                @if($user->type=='0'||($user->administration!=null&&$user->administration->active=='1') )
                                @if($user->type=='0'||$user->administration->active=='1')
                                <tr>
                                    <td> {{$user->idUser}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->type}} </td>
                                    <td style="width:20px">
                                        @if($user->type!='2')
                                            {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'up'], 'method' => 'PUT']) !!}
                                            {{Form::submit('',['class'=>'btn btnPrimary btnUp'])}}
                                            {!! Form::close() !!} 
                                        @endif
                                        @if($user->type!='0'&&$user->type!='2')
                                            {!! Form::open(['action' => ['UsersController@update', 'idUser'=>$user->idUser,'act'=>'down'], 'method' => 'PUT']) !!}
                                            {{Form::submit('',['class'=>'btn btnPrimary btnDown'])}}
                                            {!! Form::close() !!} 
                                        @endif
                                        @if($user->type!='2')
                                            {!! Form::open(['action' => ['UsersController@delete','idUser'=>$user->idUser], 'method' => 'DELETE']) !!}
                                            
                                            {{Form::submit('',['class'=>'btn btnPrimary btnDel'])}}
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                        @if($user->type=='1'&&$user->administration->active=='0')
                                        <tr>
                                            <td> {{$user->idUser}} </td>
                                            <td> {{$user->name}} </td>
                                            <td> {{$user->email}} </td>
                                            <td> {{$user->type}} </td>
                                            <td style="width:120px">
                                                    {!! Form::open(['action' => ['AdministrationController@activate', 'idUser'=>$user->idUser], 'method' => 'PUT']) !!}
                                                    {{Form::submit('Aktiviraj',['class'=>'btn btnPrimary'])}}
                                                    {!! Form::close() !!} 
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                <h2>Nalozi</h2>
                <p>Moderatori</p>
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
                                @if($user->type=='1'&&$user->administration->active=='0')
                                <tr>
                                    <td> {{$user->idUser}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td> {{$user->type}} </td>
                                    <td style="width:120px">
                                            {!! Form::open(['action' => ['AdministrationController@activate', 'idUser'=>$user->idUser], 'method' => 'PUT']) !!}
                                            {{Form::submit('Aktiviraj',['class'=>'btn btnPrimary'])}}
                                            {!! Form::close() !!} 
                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Accept Moderators Section -->
    <!-- ======= Locations Table Section ======= -->
    <section id="locations">
        <div class="container">
            <div class="section-title">
                <h2>Nalozi</h2>
                <p>Tabela sa svim nalozima</p>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Senzor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Garaža</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Parkinga</th>
                                            <th scope="col">X</th>
                                            <th scope="col">Y</th>
                                            <th scope="col">Invalid</th>
                                            <th scope="col">Zona</th>
                                            <th scope="col">Izmena</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locations as $location)
                                        @if($location->sensor != null )
                                                
                                        <tr>
                                            <td> {{$location->idPar}} </td>
                                            <td> {{$location->location->x}} </td>
                                            <td> {{$location->location->y}} </td>
                                            @if($location->sensor->Disabled)
                                            <td>Da</td>
                                            @else
                                            <td>Ne</td>
                                            @endif
                                            <td> {{$location->sensor->Zone}} </td>
                                            <td>
                                            <button class="btn btn-default btnEdit" onClick="edit(this,1)" ></button>
                                            {!! Form::open(['action' => ['LocationsController@delete','idPar'=>$location->idPar], 'method' => 'DELETE']) !!}
                                            {{Form::submit('',['class'=>'btn btnPrimary btnDel'])}}
                                            {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        <tr id="edit1">
                                            <form action="edit"method="post" >
                                                {{ csrf_field() }}
                                                <td>
                                                    <div class="control">
                                                        <input name="id"class="form-control disable"type="text" id="idParEditS">
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <div class="control">
                                                        <input name="x"class="form-control"type="text"placeholder="X Koordinata*" id="xEditS">
                                                    </div>
                                                </td>
                                                <td>           
                                                    <div class="control">
                                                        <input name="y"class="form-control"type="text"placeholder="Y Koordinata*" id="yEditS">
                                                    </div>
                                                </td>
                                                <td>           
                                                    <div class="control">
                                                        <!-- <input name="dis"class="form-control"type="text"placeholder="Kapacitet"> -->
                                                        <select name="dis"class="custom-select">
                                                            <option name="dis" id="disEditS"selected>Invalid?</option>
                                                            <option name="dis"value="1">Da</option>
                                                            <option name="dis"value="0">Ne</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>           
                                                    <div class="control">
                                                        <!-- <input name="zone"class="form-control"type="text"placeholder="Kapacitet" id = "zoneEditS"> -->
                                                        <select name="zone"class="custom-select">
                                                            <option name="zone"selected id="zoneEditS">Zona?</option>
                                                            <option name="zone"value="Plava">Plava</option>
                                                            <option name="zone"value="Zelena">Zelena</option>
                                                            <option name="zone"value="Crvena">Crvena</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>      
                                                    <div class="fieldis-grouped">
                                                        <div class="control">
                                                            <button class="btnLogin">Izmeni</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Parkinga</th>
                                            <th scope="col">X</th>
                                            <th scope="col">Y</th>
                                            <th scope="col">Kapacitet</th>
                                            <th scope="col">Izmena</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locations as $location)
                                        @if($location->garage != null )
                                                
                                        <tr>
                                            <td> {{$location->idPar}} </td>
                                            <td> {{$location->location->x}} </td>
                                            <td> {{$location->location->y}} </td>
                                            <td> {{$location->garage->Free}} </td>
                                            <td>
                                            <button class="btn btn-default btnEdit" onClick="edit(this,2)" ></button>
                                                {!! Form::open(['action' => ['LocationsController@delete','idPar'=>$location->idPar], 'method' => 'DELETE']) !!}
                                                {{Form::submit('',['class'=>'btn btnPrimary btnDel'])}}
                                                {!! Form::close() !!}
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        @endforeach
                                        
                                        <tr id="edit2">
                                            <form action="edit"method="post" >
                                            {{ csrf_field() }}
                                                <td>
                                                    <div class="control">
                                                        <!-- <div id="idParEdit" name ="id" class="form-control"></div> -->
                                                        <input name="id"class="form-control disable"type="text" id="idParEdit">
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <div class="control">
                                                        <input name="x"class="form-control"type="text"placeholder="X Koordinata*" id="xEdit">
                                                    </div>
                                                </td>
                                                <td>           
                                                    <div class="control">
                                                        <input name="y"class="form-control"type="text"placeholder="Y Koordinata*" id="yEdit">
                                                    </div>
                                                </td>
                                                <td>           
                                                    <div class="control">
                                                        <input name="cap"class="form-control"type="text"placeholder="Kapacitet" id = "capEdit">
                                                    </div>
                                                </td>
                                                <td>      
                                                    <div class="fieldis-grouped">
                                                        <div class="control">
                                                            <button class="btnLogin">Izmeni</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </form> 
                                        </tr>     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- End Of Location Table Section -->
    
    <!-- ======= Services Section ======= -->
    
    <!-- End Services Section -->

    <div class="credits">
        Tim: <a>Sportaši</a>

    </div>
    <div class="user">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
            @if(strlen(Auth::user()->name)<10)
            <i class="icofont-user"></i> {{ Auth::user()->name }} | Izloguj se
            @else
            <i class="icofont-user"></i> {{ substr(Auth::user()->name,0,10) }}... | Izloguj se
            @endif
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
        $(document).ready(function() {
            $('#dataTable3').dataTable();
        });
        
    </script>
</body>

</html>