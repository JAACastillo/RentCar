<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Sistema de administación de renta</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style("home/bootstrap/css/bootstrap.css" )}}
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" >

    <!-- Custom styles for this template -->
    {{HTML::style("home/style.css")}}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="bootstrap/js/html5shiv.js"></script>
    <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target="#topnav">

<div class="navbar navbar-inverse navbar-fixed-top" id="topnav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="home/images/expose-logo.png" alt="Expose" height="17px" /> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home">Inicio</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#features">Caracteristicas</a></li>
                <li><a href="#pricing">Precio</a></li>
                <!-- <li><a href="#clients">Clientes</a></li> -->
                <li><a href="#contact">Contacto</a></li>
                <li><a href="/login">Iniciar sesión</a></li>

            </ul>

        </div>
        <!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" id="home">
    <div class="container">
        <div class="media">
            <a href="#" class="pull-right">
                <br><br>
            <img class="media-object" src="home/images/Finder_256.png"/>
            </a>

            <div class="media-body">
                <div class="col-md-11">
                    <h1 class="title">Sistema de administación de <span>Renta de Carros</span></h1>

                    <p>
                        Automatiza todo el proceso de administración de tus carros de una manera eficiente y ........
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="services">
    <!-- Example row of columns -->
    <div class="row features">
        <div class="col-lg-4 text-center">
            <div class="single-fet">
                <div>
                <span class="icon-stack icon-4x">
  <i class="icon-circle icon-stack-base"></i>
  <i class="icon-ok icon-light"></i>
</span>
                </div>
                <h2>Administración de prestamos</h2>

                <p>
                Administrar los prestamos nunca había sido tan fácil.
                </p>

            </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="single-fet">
                <div>
                <span class="icon-stack icon-4x">
  <i class="icon-circle icon-stack-base"></i>
  <i class="icon-laptop icon-light"></i>
</span>
                </div>
                <h2>Clientes</h2>

                <p>
                    Ten a la mano la información de todos tus clientes y el historial de los prestamos realizados.
                </p>

            </div>
        </div>
        <div class="col-lg-4 text-center">
            <div class="single-fet">
                <div>
                <span class="icon-stack icon-4x">
  <i class="icon-circle icon-stack-base"></i>
  <i class="icon-download-alt icon-light"></i>
</span>
                </div>
                <h2>Precios</h2>

                <p>
                    Tienes la capacidad de asignar precio de renta a tu carro dependiendo de la temporada.
                </p>

            </div>
        </div>

    </div>


</div>


<section class="slider" id="features">
    <div class="container">
        <div class="inner-page">
            <h2 class="page-headline large text-center">Administra tu renta de carros como un profesional.</h2>

            <p class="text-center">
                Toma control en cada una de las reservas y mejora en la toma de decisiones basado en la información que tu renta esta generando.
            </p>
        </div>
        <div class="row inner-page">
            <div class="col-md-8 col-md-push-2 lazy-container loaded">
                <!--<img data-original="images/mockup.png" src="images/mockup.png" alt="Looks great on every device"-->
                <!--class="lazy">-->

                <h2>Nuestras <strong>Caracteristicas</strong></h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-group"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Soporte al clietne</h4>

                                <p class="tall">Podrás dar seguimiento y un mejor servicio a los clientes.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-file"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">HTML5 / CSS3 / JS</h4>

                                <p class="tall">Lorem ipsum dolor sit amet, adip.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-google-plus"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">500+ Google Fonts</h4>

                                <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-adjust"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Colors</h4>

                                <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-film"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Sliders</h4>

                                <p class="tall">Lorem ipsum dolor sit amet, consectetur.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-magic small user"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Icons</h4>

                                <p class="tall">Lorem ipsum dolor sit amet, consectetur adip.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-reorder"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Buttons</h4>

                                <p class="tall">Lorem ipsum dolor sit, consectetur adip.</p>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="feature-box-icon">
                                <i class="icon-desktop"></i>
                            </div>
                            <div class="feature-box-info">
                                <h4 class="shorter">Lightbox</h4>

                                <p class="tall">Lorem sit amet, consectetur adip.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            </div>
        </div>
    </div>
</section>

<section class="pricing" id="pricing">

    <div class="container">
        <div class="row">
            <div class="col-md-12 pricing-intro">
                <h2 class="page-headline large text-center">Nuestos precios son increíbles</h2>

                <p class="text-center">Escoje el plan que más te convenga de acuerdo al número de carros que tengas.</p>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="row pricing-table">
            <div class="col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading"><h3 class="text-center">PLAN BÁSICO</h3></div>
                    <div class="panel-body text-center">
                        <p class="lead" style="font-size:40px"><strong>$59 / mes</strong></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Uso personañ</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> 25 carros</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Soporte 24/7/365</li>
                    </ul>
                    <div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-danger"
                           href="https://creativemarket.com/artlabs/12114-Bootstrap-3.0.-pricing-tables-flat">BUY
                            NOW!</a>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="text-center">PRO PLAN</h3></div>
                    <div class="panel-body text-center">
                        <p class="lead" style="font-size:40px"><strong>$10 / month</strong></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Personal use</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited projects</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> 27/7 support</li>
                    </ul>
                    <div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-info"
                           href="https://creativemarket.com/artlabs/12114-Bootstrap-3.0.-pricing-tables-flat">BUY
                            NOW!</a>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading"><h3 class="text-center">FREE PLAN</h3></div>
                    <div class="panel-body text-center">
                        <p class="lead" style="font-size:40px"><strong>$10 / month</strong></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Personal use</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited projects</li>
                        <li class="list-group-item"><i class="icon-ok text-danger"></i> 27/7 support</li>
                    </ul>
                    <div class="panel-footer">
                        <a class="btn btn-lg btn-block btn-success"
                           href="https://creativemarket.com/artlabs/12114-Bootstrap-3.0.-pricing-tables-flat">BUY
                            NOW!</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</section>
<section class="gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h3 class="text-center">Tell your projects awesome story.</h3> -->
            </div>
        </div>
    </div>
</section>


<section class="contact" id="contact">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="alert alert-success hidden" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-error hidden" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                </div>

                <h2 class="short"><strong>Contactanos</strong></h2>

                <form class="clearfix" accept-charset="utf-8" method="get" action="#">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name">Nombre</label>
                            <input type="text" placeholder="" value="" name="name" id="name"
                                   class="form-control input-lg">
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="email">Correo electronico</label>
                            <input type="email" placeholder="" value="" name="email" id="email"
                                   class="form-control input-lg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="message">Mensaje</label>
                            <textarea rows="4" name="message" id="message" class="form-control"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-success btn-xlg" type="submit">Enviar mensaje</button>
                </form>
            </div>
            <div class="col-md-offset-1 col-md-5">
                <br/>
                <h4 class="pull-top">Si tienes <strong>dudas</strong></h4>

                <p>
                    Estamos para servirte, si tienes dudas ponte en contacto con nosotros, te contestaremos en menos de 24 horas.
                </p>

                <hr>

                <h4> <strong>Oficina</strong></h4>
                <ul class="unstyled">
                    <li><i class="icon-map-marker"></i> <strong>Dirección:</strong> 1234 Street Name, City Name, United
                        States
                    </li>
                    <li><i class="icon-phone"></i> <strong>Teléfono:</strong> (123) 456-7890</li>
                    <li><i class="icon-envelope"></i> <strong>Correo electronico:</strong> <a href="mailto:mail@example.com">mail@example.com</a>
                    </li>
                </ul>


            </div>


        </div>

    </div>

</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon" style="right: 0">
                <h3 class="title" style="margin: 0;padding: 5px 10px">Thank <span>You</span></h3>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a class="logo" href="index.html">
                        <img src="images/expose-logo.png" alt="Template Eden">
                    </a>
                </div>
                <div class="col-md-5">
                    <p>&copy; Copyright 2013 by Template Eden. All Rights Reserved.</p>
                </div>
                <div class="col-md-5">
                    <nav id="footer-menu">
                        <ul>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{HTML::script('home/js/jquery.js')}}
{{HTML::script('home/bootstrap/js/bootstrap.min.js')}}
</body>
</html>
