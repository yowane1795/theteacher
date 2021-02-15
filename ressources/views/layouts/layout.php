<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'font-awesome-4.7.0' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'toastr.min.css' ?>">
    <title>L'enseignant</title>
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="font-weight: 600;font-size: 20px;letter-spacing: 2px" href="#">The<span class="text-info">Teacher</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fa fa-folder' aria-hidden='true'></i>
                            Cours
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/posts/cours/PHP">PHP</a></li>
                            <li><a class="dropdown-item" href="/posts/cours/Base-de-données">Base de donnée</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/posts/cours/HTML">Html/Css</a></li>
                            <li><a class="dropdown-item" href="/posts/cours/JS">JavaScript</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fa fa-folder' aria-hidden='true'></i>
                            Exercices
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">TP php</a></li>
                            <li><a class="dropdown-item" href="#">TP base de donnée</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">TP HTML/CSS</a></li>
                        </ul>
                    </li>
                    <?php if (Session::isset('auth') === 1) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/posts/store">Mes posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/posts/create">Ajouter un post</a>
                        </li>
                    <?php endif ?>
                </ul>
                <span class="badge bg-success" style="margin-right: 15px;"><i class='fa fa-users' aria-hidden='true'></i> Visiteurs <?= Visitor::getVisitor()[0]->visitor ?></span>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <?php if (Session::isset('login') !== null) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class='fa fa-user-circle' aria-hidden='true'></i>
                                Welcome <?= Session::isset('login') ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/login/show/<?= Session::isset('id') ?>"><i class='text-info fa fa-user' aria-hidden='true'></i> Profil</a></li>
                                <li><a class="dropdown-item" href="/login/edit/<?= Session::isset('id') ?>"><i class='text-primary fa fa-edit' aria-hidden='true'></i> Modifier le compte</a></li>
                                <li><a class="dropdown-item" href="/login/destroy/<?= Session::isset('id') ?>"><i class='text-danger fa fa-times' aria-hidden='true'></i> Supprimer le compte</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= (Session::isset('login') !== null) ? "/logout" : "/login" ?>"><?= Session::isset('login') !== null ? "<i class='fa fa-sign-out' aria-hidden='true'></i> Déconnexion" : "<i class='fa fa-sign-in' aria-hidden='true'></i> Connexion" ?></a>
                    </li>
                    <?php if (Session::isset('login') === null) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/subscribe">S'inscrire</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Carousel start -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'php.jpg' ?>" style="height: 300px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'bd.jpg' ?>" style="height: 300px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'html.png' ?>" style="height: 300px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'html.png' ?>" style="height: 300px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= SCRIPTS . 'img' . DIRECTORY_SEPARATOR . 'html.png' ?>" style="height: 300px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!-- End carousel -->

    <!-- Second navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-3" aria-label="Twelfth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="#">Forum <i class="fa fa-commenting"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1"><i class="fa fa-news"></i> Actualités</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown10">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End second navbar -->

    <!-- Container start -->
    <div class="container-fluid">
        <?= $content ?>
    </div>
    <!-- End container -->

    <!-- Footer start -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Tous droits réservés par YMAY SOCIETY. Copyright &copy; 2021</span>
        </div>
    </footer>
    <!-- End footer -->

    <!-- js code -->
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'app.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'jquery.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'js' . DIRECTORY_SEPARATOR . 'toastr.min.js' ?>"></script>
    <script src="<?= SCRIPTS . 'ckeditor' . DIRECTORY_SEPARATOR . 'ckeditor.js' ?>"></script>
    <script>
        CKEDITOR.replace('ckeditor', {
            uiColor: '#CCEAEE'
        });

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        <?php if (Session::verifyUrl() !== null) : ?>
            toastr.error('<?= Session::flash('Before doing this action') ?>', 'Need to connect')
        <?php endif; ?>
    </script>
</body>

</html>