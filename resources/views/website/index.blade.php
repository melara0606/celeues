<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CELEUES WEB</title>
    <link href="{{ asset('website/css/index.css') }}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
      <body id="top">
	  <a href="#" id="translate" data-text="English,Español" data-file="es,en" data-index="1">English</a>
  <span class="loading-lang">Cargando...</span>
        <header id="home">
          <nav>
            <div class="container-fluid">
			   <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                  <nav class="pull">
                    <ul class="top-nav">
                      <li><a data-lang="inicio" href="{{ route('login') }}">Inicio de sesión <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="algo" href="#intro">Algo mas <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
					            <li><a data-lang="noti" href="#features1">Noticias <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="histo" href="#intro2">Historia<span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="cono" href="#features2">Conocenós <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="idea" href="#portfolio">Ideario <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="equi" href="#team">Equipo <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                      <li><a data-lang="contac" href="#contact">Contactanos <span class="indicator"><i class="fa fa-angle-right"></i></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </nav>
          <section class="swag text-center">
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>

                <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                      <h1><span> <em></em> </span></h1>
                      <a href="#portfolio" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
                    </div>
                  </div>
                </div>
            </div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
          </section>
        </header>
				<section class="intro text-center section-padding" id="intro">
              <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
				<a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a><p></p>
                <h1 data-lang="agregar"  class="arrow" >Agregar lo demás</h1>
                <p ALIGN="justify" >     </p>
              </div>
            </div>

        </section>


        <section class="features text-center section-padding" id="features1">
          <div class="container">
			<h1 data-lang="noticia"  class="arrow"  >Noticias </h1>
            <div id="fb-root"></div>
            <div class="fb-page"  data-href="https://www.facebook.com/celeues" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/celeues" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/celeues">Celeues</a></blockquote></div>
            <div id="fb-root"></div>
            <div id="fb-root"></div>

          </div>
        </section>

		<section class="intro text-center section-padding" id="intro2">
              <div class="row">
              <div class="col-md-8 col-md-offset-2 wp1">
				<a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a><p></p>
                <h1 data-lang="conocenos" class="arrow" >Conoce un poco de nosotros</h1>
                <p  data-lang="cen" ALIGN="justify" >El Centro de Enseñanza de Lenguas Extranjeras de la Universidad de El Salvador, (CELEUES) inicia sus actividades a finales del año dos mil diez, bajo el período del Decano Ing. Isidro Vargas Cañas y con la Coordinación ad-honorem de la Lic. Celia Querubina Cañas Menjívar.
                  CELEUES es uno de los proyectos que la Universidad de El Salvador posee en la Facultad Multidisciplinaria Paracentral, dirigido hacia las comunidades de los departamentos de San Vicente, La Paz, Cabañas y Cuscatlán, ofreciendo la oportunidad de estudiar un segundo idioma a precios accesibles.
                </p>
              </div>
            </div>

        </section>


        <section class="features text-center section-padding" id="features2">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
				<a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a><p></p><p></p>
                <h1 data-lang="nos" class="arrow">¡Nos encanta hacerlo bien!</h1>
                <div class="features-wrapper">
                  <div class="col-md-4 wp2">
                    <div class="icon">
                      <i class="fa fa-book shadow"></i>
                    </div>
                    <h2 data-lang="cursos">Cursos</h2>
                    <p data-lang="cursos1" ALIGN="justify">El Centro de Enseñanza de Lenguas Extranjeras, oferta Cursos Libres de idiomas extranjeros, los cuales están divididos en tres categorías: Niños entre 7 a 11 años de edad, Adolescentes entre de 12 a 17 años y Adultos de 18 años en adelante.
                      Así mismo el curso está dividido en niveles para adultos los cuales, son veinte niveles y para niños dieciocho niveles.
                      Los períodos son de 8 sábados llamados Módulos.
                    </p>
                  </div>
                  <div class="col-md-4 wp2 delay-05s">
                    <div class="icon">
                      <i class="fa fa-home shadow"></i>
                    </div>
                    <h2 data-lang="quienes">¿Quienes Somos?</h2>
                    <p data-lang="quienes1" ALIGN="justify">El Centro de Enseñanza de Lenguas Extranjeras de la Facultad Multidisciplinaria de la Universidad de El Salvador “CELEUES”, es un proyecto que nació en el 2010 con el fin de brindar una especialización en lenguas extranjeras a la comunidad estudiantil de la zona paracentral en dos modalidades intensivo y sabatino; Se programan cinco Módulos por año. En cada módulo se ofertan diferentes niveles y cada uno tiene una duración de 32 horas clase.</p>
                  </div>
                  <div class="col-md-4 wp2 delay-1s">
                    <div class="icon">
                      <i class="fa fa-heart shadow"></i>
                    </div>
                    <h2 data-lang="encanta">Nos encanta servirte!</h2>
                    <p data-lang="encanta1"ALIGN="justify">Contamos con el grupo de docentes más profesionales, preparados y dinamicos, ademas de horarios accesibles para todos nuestros estudiantes; estamos abiertos a enseñar de una manera innovadora y asi lograr mayor aceptacion de la comunidad estudiantil y profesional en la zona Paracentral</p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="swag2 text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h1 data-lang="pre">CELEUES<span >preparando <em>profesionales</em> conocedores de ingles</span></h1>
              <a href="#portfolio" class="down-arrow-btn2"><i class="fa fa-chevron-down"></i></a>
              </div>
            </div>
          </div>
        </section>
        <section class="portfolio text-center section-padding" id="portfolio">
          <div class="container">
            <div class="row">
              <div id="portfolioSlider">
                <ul class="slides">
                  <li>
				  <h1 class="arrow">Ideario</h1>
                    <div class="col-md-4 wp4">
                        <div class="img">
                          <img src="{{ asset('website/img/mision3.png') }}" >
                          <div class="overlay">
                            <a href="#" ></a>
                            <a class="close-overlay hidden">x</a>
                          </div>
                        </div>
                      <p data-lang="vi" ALIGN="justify" >Brindar una enseñanza de calidad a niños, jóvenes y adultos, acorde a los altos estándares requeridos en nuestra sociedad moderna y crear oportunidades excepcionales para el crecimiento profesional y personal del individuo en el aprendizaje y dominio de un segundo idioma.</p>
                    </div>
                    <div class="col-md-4 wp4">
                        <div class="img">
                          <img src="{{asset('website/img/vision3.png')}}" >
                          <div class="overlay">
                            <a href="#" ></a>
                            <a class="close-overlay hidden">x</a>
                          </div>
                      </div>
                      <p data-lang="mi" ALIGN="justify" >Ser reconocidos como una institución al servicio de la comunidad a través de nuestro profesionalismo con visión social, y así mismo que nuestros estudiantes alcancen su más alto potencial tanto en su carrera profesional como a nivel personal individual en el desarrollo de un segundo idioma.</p>
                    </div>
                    <div class="col-md-4 wp4">
                         <div class="img">
                          <img src="{{asset('website/img/valores3.png')}}" >
                          <div class="overlay">
                            <a href="#" ></a>
                            <a class="close-overlay hidden">x</a>
                          </div>
                      </div>
                      <p data-lang="va" ALIGN="justify" >Nuestros valores son servir a la comunidad, a la sociedad y al beneficio de todos aquellos interesados en aprender un segundo idioma. Además, apoyamos al mantenimiento de la cultura, educación y formación de las personas, enfocando nuestra institución a alcanzar sus logros profesionales y personales.</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <div class="ignite-cta text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a href="#" class="ignite-btn">CELEUES </a>
              </div>
            </div>
          </div>
        </div>
        <section class="team text-center section-padding" id="team">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
				<a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a><p></p>
                <h1 data-lang="con"  class="arrow">Conoce el equipo de Docentes que trabaja en CELEUES</h1>
              </div>
            </div>

            <div class="row">
              <div class="team-wrapper">
                <div id="teamSlider">
                  <ul class="slides">
                    <li>
                      <div class="col-md-12 wp5">
                        <img src="{{asset('website/img/team-01.jpg')}}" alt="Team Member">
                        <h2>teachers </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet. Praesent non adipiscing libero.</p>

                      </div>

                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
         </section>
        <section class="dark-bg text-center section-padding contact-wrap" id="contact">
          <a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h1 class="arrow">Contactanos</h1>
              </div>
            </div>
            <div class="row contact-details" >
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-map-marker"></i><span>Dirección</span></h2>
                  <p >Final Avenida Cresencio Miranda, frente estadio vicentino San Vicente</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-mobile"></i><span>Teléfono</span></h2>
                  <p>+503 2614-5004</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="light-box box-hover">
                  <h2><i class="fa fa-paper-plane"></i><span>Correo eLectronico</span></h2>
                  <p>celeues@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <ul class="social-buttons">
                  <li><a href="https://www.facebook.com/celeues/" class="social-btn"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="celeues@gmail.com-" class="social-btn"><i class="fa fa-envelope"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <footer>
          <div class="container">
            <div class="row">
                <p ALIGN="center">Sitio Web oficial de CELEUES todos los derechos reservados Universidad de el Salvador FMP </p>
            </div>
          </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('website/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('website/js/scripts.js') }}"></script>
        <script src="{{ asset('website/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('website/js/modernizr.js') }}"></script>
        <script src="{{ asset('website/js/main.js') }}"></script>
      </body>
    </html>
