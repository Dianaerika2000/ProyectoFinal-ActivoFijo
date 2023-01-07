<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ACTIVO FIJO - INMUEBLES</title>

    {{-- estilos para icono de whatsapp --}}
    <link href="{{ asset('ClienteTemplate/css/whatsapp.css') }}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('ClienteTemplate/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('ClienteTemplate/css/styles.css') }}" rel="stylesheet" />

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img
                    src="{{ asset('ClienteTemplate/assets/img/logo.png') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    {{--
                    <li class="nav-item"><a class="nav-link" href="#producto">Nuestros Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Sobre nosotros</a></li>
                     <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    <!-- Nav Item - User Information -->

                    <li class="nav-item dropdown no-arrow" id="lista1" onmouseover="ver(1)" onmouseout="ocultar(1)">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                                style="font-size:16px">login</span>
                            <img class="img-profile rounded-circle" style="width: 25px"
                                src="{{ asset('UsuarioTemplate/img/undraw_profile.svg') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in div1" id="div1"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('admin.login') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Administrador
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('usuario.login') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{--Usuario--}}
                                Responsables
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->

     <!-- producto Grid
     {{--
     <section class="page-section bg-light" id="producto">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros Productos</h2>
                <h3 class="section-subheading text-muted">Presentaciones de pulpas de frutas
                    <p class="text-danger">la lista mostrada esta sujeta a
                        temporadas de produccion de las distintas variaciones de frutas</p>
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/guineo.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">Sabor guineo</div>
                            <div class="producto-caption-subheading text-muted"><p style="color:rgb(156, 156, 10, 0.5)">podras realizar un delicioso preparada de guineo ya sea en
                                refresco ó batido.</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/acai.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">refresco de acai</div>
                            <div class="producto-caption-subheading text-muted"><p style="color:rgb(34, 13, 61, 0.5)">
                                si no es tiempo de acai y quieres probrarlo, no hay
                                    problema,
                                    con nuestra pulpa de acai 100% natural podras disfrutas
                                    un rico refreco, batido o como tu prefieras prepararlo</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/copoazu.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">Sabor Copoazu</div>
                            <div class="producto-caption-subheading text-muted"><p style="color:rgba(61, 31, 2, 0.5)">
                                Disfrutaras el autentico sabor a copoazu 100% natural</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/camu-camu.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">Camu- camu</div>
                            <div class="producto-caption-subheading text-muted"><p style="color:rgba(241, 53, 46, 0.5)">El verdadero sabor de fruto mediterraneo mas exclusivo
                            </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/reservado.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">en espera...</div>
                            <div class="producto-caption-subheading text-muted"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="producto-item">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="producto-hover">
                                <div class="producto-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid"
                                src="{{ asset('ClienteTemplate/assets/img/producto/reservado.png') }}" alt="..." />
                        </a>
                        <div class="producto-caption">
                            <div class="producto-caption-heading">en espera...</div>
                            <div class="producto-caption-subheading text-muted">{{-- Photography --}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}
    <!-- Services-->
    {{--
    <section class="page-section" id="servicios">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros Servicios</h2>
                <h3 class="section-subheading text-muted">
                    <p class="text-warning">Nuestros servicios son:</p>
                </h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="link fa-stack fa-4x">
                        <a class="producto-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="my-3">Reposteria</h4>
                    <p class="text-muted">Realizamos todo tipo de postres y galletas a pedidos</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime
                        quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime
                        quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>
    --}}

    <!-- About-->
    {{--
    <section class="page-section" id="about" style="background-color:rgba(173, 170, 175, 0.37)">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Markabolivia</h2>
                <h3 class="section-subheading text-muted">Una pequeña empresa 100% cruceña dedicada a la
                    produccion de pulpas de frutas congeladas y derivados</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('ClienteTemplate/assets/img/about/mision.png') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2009-2011</h4>
                            <h4 class="subheading">Misión</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted"> Proporcionar a nuestros clientes variedad de pulpas de fruta conservadas mediante
                                congelamiento sin adición de conservantes, fomentando así una vida saludable entre
                                nuestros consumidores</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('ClienteTemplate/assets/img/about/vision.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2011</h4>
                            <h4 class="subheading">Visión</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Ser líderes en la conservación de frutas y abastecer la demanda durante todas las estaciones del
                                año. Desarrollar productos innovadores y así satisfacer a nuestros clientes</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('ClienteTemplate/assets/img/about/3.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2015</h4>
                            <h4 class="subheading">Transition to Full Service</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
               <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="{{ asset('ClienteTemplate/assets/img/about/4.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2020</h4>
                            <h4 class="subheading">Phase Two Expansion</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Puedes ser parte
                            <br />
                            de nuestra
                            <br />
                            historia!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    --}}
    <!-- Team-->
    {{-- <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('ClienteTemplate/assets/img/team/1.jpg') }}" alt="..." />
                        <h4>Parveen Anand</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('ClienteTemplate/assets/img/team/2.jpg') }}" alt="..." />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"
                            aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('ClienteTemplate/assets/img/team/3.jpg') }}" alt="..." />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                        laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Clients-->
   {{--  <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('ClienteTemplate/assets/img/logos/google.svg') }}" alt="..."
                            aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto"
                            src="{{ asset('ClienteTemplate/assets/img/logos/facebook.svg') }}" alt="..."
                            aria-label="Facebook Logo" /></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Contact-->
    <section class="page-section section-header" id="contact" {{-- style="background: rgb(233, 48, 224, 0.3)" --}}>
        <div class="container div-container">
            <div class="text-center div-titulo">
                <h2 class="section-heading text-uppercase">Contactanos</h2>
                <p class="h3-titulo">En caso de requerir alguna informacíon!</p>
            </div>
            <div class="container div-email">
                <div class="col-md-4 mb-3 mb-md-0 ">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">
                                <a href="mailto:limber@gmail.com">ACTIVO FIJOS - INMUEBLES</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            {{-- <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="ingrese su nombre"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Un nombre es requerido.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="ingrese su email"
                                data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">Un email es requerido.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">el Email no es valido.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="ingrese su numero de telefono"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Un numero de telefono es requerido.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="ingrese su mensage" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Se requiere un mensage .
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a
                            href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled"
                        id="submitButton" type="submit">Send Message</button></div>
            </form> --}}
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Activo Fijo - Inmuebles UAGRM 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
                <div class="text-center my-auto text-xs font-weight-bold text-ligth text-uppercase mb-1">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    <span class="span-zoom">Contador de paginas: {{ $contador_index->count }}</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- codigos pra el scrollup modo 1 --}}
    <a href="#" class="o-scroll-up btn btn-info" title="back to top" id="btn-back-to-top2">
        <span class="o-scroll-up-text hidden-sm-down">inicio</span>
        <span class="o-scroll-up-icon" aria-hidden="true"></span>
        <i class="fas fa-arrow-up"></i>
    </a>
    {{-- codigos pra el scrollup modo 2, incluye un codigo javascript buscar abajo al final --}}
    <button type="button" class="btn btn-danger btn-floating btn-lg btn-back-to-top" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    {{-- codigo para el boton whatsapp
    <div class="wp-socializer wpsr-follow-icons sr-fb-rm sr-fb-vl" data-lg-action="show" data-sm-action="show"
        data-sm-width="768">
        <div class="socializer sr-followbar sr-48px sr-circle sr-zoom sr-pad sr-vertical"><span
                class="sr-whatsapp"><a data-id="whatsapp" style="color:#ffffff;" rel="nofollow"
                    href="http://wa.link/de3mol" target="_blank" title="WhatsApp"><i
                        class="fab fa-whatsapp"></i></a></span></div>
        <div class="wpsr-fb-close wpsr-close-btn" title="Open or close follow icons"><span class="wpsr-bar-icon"><svg
                    xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 16 16"
                    class="i-open">
                    <path
                        d="M15,6h-5V1c0-0.55-0.45-1-1-1H7C6.45,0,6,0.45,6,1v5H1C0.45,6,0,6.45,0,7v2c0,0.55,0.45,1,1,1h5v5c0,0.55,0.45,1,1,1h2 c0.55,0,1-0.45,1-1v-5h5c0.55,0,1-0.45,1-1V7C16,6.45,15.55,6,15,6z">
                    </path>
                </svg><svg class="i-close" xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                    viewBox="0 0 512 512">
                    <path
                        d="M417.4,224H94.6C77.7,224,64,238.3,64,256c0,17.7,13.7,32,30.6,32h322.8c16.9,0,30.6-14.3,30.6-32 C448,238.3,434.3,224,417.4,224z">
                    </path>
                </svg></span></div>
    </div>
    --}}
    {{-- script para hover login --}}
    <script type="text/javascript">
        function ver(n) {
            document.getElementById("div" + n).style.display = "block";
        }

        function ocultar(n) {
            document.getElementById("div" + n).style.display = "none";
        }
    </script>

    {{-- script para el scrollup modo2 --}}
    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>




    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('ClienteTemplate/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('UsuarioTemplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('UsuarioTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="{{ asset('ClienteTemplate/js/varios.js.descarga') }}" data-minify="1" defer=""></script>
</body>

</html>
