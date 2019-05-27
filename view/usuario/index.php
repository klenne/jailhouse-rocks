<?php
require_once('../../includes/headerUsuario.php');
require_once('../../app/controllers/UsuarioDAO.php');
require_once('../../app/front-controllers/PlaylistDAO.php');
require_once('../../app/front-controllers/MusicaDAO.php');

$logado = $_SESSION['logado'];
if (!$logado) {
    header('Location:../index.php');
}

$nome = $_SESSION['nome'];
$id_usuario = $_SESSION['id'];
$data = $_SESSION['dataNascimento'];
$partesData = explode("-", $data);
$anoPlaylist = $partesData[0];

if (isset($_POST['playlist'])) {
    $playlistDAO = new PlaylistDAO;
    $gerarPlaylist = $playlistDAO->gerarPlaylist($anoPlaylist, $id_usuario);
    header('Location:index.php');
}

if (isset($_POST['gerarNovaPlaylist'])) {
    $playlistDAO = new PlaylistDAO;
    $apagarPlaylist = $playlistDAO->apagarPlaylist($id_usuario);
    $novaPlaylist = $playlistDAO->gerarPlaylist($anoPlaylist, $id_usuario);
    header('Location:index.php');
}

$playlistDAO = new PlaylistDAO;
$temPlaylist = $playlistDAO->buscarPlaylistUsuario($id_usuario);
$musicaDAO = new MusicaDAO;
$musicasGeral = $musicaDAO->buscarMusicas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Jailhouse Rock's</title>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../../assets/css/usuario/style.min.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <img src="../../assets/img/core-img/compact-disc2.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="musica-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="musicaNav">

                        <!-- Nav brand -->
                        <div class="classynav">
                            <ul>
                                <li><a href="#" class="nav-brand" style="font-size: 20px;">JailhouseRock's</a>
                                <li>
                            </ul>
                        </div>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="#destaques">Em destaque</a></li>
                                    <li><a href="#musicas">Musicas</a></li>
                                    <li><a href="#playlist">Minha Playlist</a></li>
                                    <li><a href="perfil.php">Perfil</a></li>
                                    <li><a style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter">Sair</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>



    <!-- Modal Sair-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sair da Sessão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja realmente sair? Continue aproveitando o melhor estilo musical, de forma nunca antes vista!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="index.php" method="POST">
                        <button type="submit" class="btn btn-danger" name="sair">Sair</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="about-us-area section-padding-100-0 bg-img bg-overlay" style="background-image: url(../../assets/img/bg-img/rock2.jpg);" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2 style="font-size: 40px;">Rock and Roll</h2>
                    </div>
                </div>
            </div>

            <div style="margin-top: -40px;" class="row">
                <!-- About Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail mb-100">
                        <img src="../../assets/img/bg-img/rock2.jpg" alt="">
                    </div>
                </div>
                <!-- About Content -->
                <div class="col-12 col-lg-6">
                    <div class="about-content mb-100">
                        <h4>Olá <?php echo $nome; ?>, esta preparado para o verdadeiro Rock and Roll?!</h4>
                        <p>O <Strong>rock 'n' roll</Strong> é um gênero musical que teve origem nos<Strong> Estados Unidos (EUA)</Strong> a partir
                            dos anos <Strong>1950</Strong>, popularizando-se por todo o mundo.
                            Mais do que um estilo musical com ritmo contagiante, é conhecido por ter um apelo comportamental
                            e visual cheio de irreverência e atitude.</p>
                        <p>
                            Geralmente, as bandas de rock são formadas por um vocalista, um baixista, um baterista e um ou dois guitarristas. Alguns grupos podem usar teclado ou percussão,
                            dependendo do estilo, mas a guitarra elétrica é,
                            desde os primórdios, a marca registrada.
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="destaques" class="music-player-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="music-player-slides owl-carousel">

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Be Bop a Lula.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Gene Vincente</h5>
                                    <p>Be Bop A Lula</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Be Bop A Lula.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Californication.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Red Hot Chili Peppers</h5>
                                    <p>Californication</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Californication.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Imagine.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>John Lennon</h5>
                                    <p>Imagine</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Imagine.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Eye of the Tiger.png" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Survivor</h5>
                                    <p>Eye of the Tiger</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Eye of the Tiger.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Don't Stop Believin'.jfif" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Journey</h5>
                                    <p>Don't Stop Believin'</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Don't Stop Believin'.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Another Brick In The Wall.png" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>
                                        Pink Floyd
                                    </h5>
                                    <p>Another Brick In The Wall, Pt.2</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Another Brick In The Wall.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Riders On The Storm.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>The Doors</h5>
                                    <p>Riders On The Storm</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Riders On The Storm.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Bohemian Rhapsody.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Queen</h5>
                                    <p>Bohemian Rhapsody</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Bohemian Rhapsody.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\Do I Wanna Know.jpg" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>Arctic Monkeys</h5>
                                    <p>Do I Wanna Know</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\Do I Wanna Know.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Single Music Player -->
                        <div class="single-music-player">
                            <img src="..\..\assets\music\img\So Far Away.png" alt="">

                            <div class="music-info d-flex justify-content-between">
                                <div class="music-text">
                                    <h5>So Far Away</h5>
                                    <p>Avenged Sevenfold</p>
                                </div>
                                <div class="music-play-icon">
                                    <audio preload="auto" controls>
                                        <source src="..\..\assets\music\data\So Far Away.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Album Area Start ##### -->
    <div id="musicas" class="featured-album-area section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="featured-album-content d-flex flex-wrap">

                        <!-- Album Thumbnail -->
                        <div class="album-thumbnail h-100 bg-img" style="background-image: url(../../assets/img/bg-img/musicaslogo1.jpg);"></div>

                        <!-- Album Songs -->
                        <div class="album-songs h-100">

                            <!-- Album Info -->
                            <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                                <div class="album-title">
                                    <h4>Todas as Musicas</h4>
                                    <h6>The Rock never ends</h6>

                                </div>
                            </div>

                            <div class="album-all-songs">

                                <!-- Music Playlist -->
                                <div class="music-playlist">
                                    <?php $contmusicasg = 0;
                                    foreach ($musicasGeral as $key) {
                                        ++$contmusicasg;
                                        ?>
                                        <!-- Single Song -->
                                        <div class="single-music">
                                            <h6><?php echo "{$key->nome} - {$key->artista}"; ?></h6>
                                            <audio id="<?php echo "song{$contmusicasg}"; ?>" preload="auto" controls>
                                                <source src="<?php echo "$key->musica_path"; ?>">
                                            </audio>
                                        </div>
                                    <?php
                                } ?>
                                </div>
                            </div>

                            <!-- Now Playing -->
                            <div class="now-playing d-flex flex-wrap align-items-center justify-content-between">
                                <div class="songs-name">
                                    <p>Playing</p>
                                    <h6>-- '' --</h6>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="">
                                </audio>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($temPlaylist == 0) { ?>
        <div class="featured-album-area section-padding-100 ">
            <div class="container">

                <div class="col-12">

                    <div class="card center-block text-center">
                        <div class="card-body">
                            <h1 class="card-title">Ainda não possui playlist?<i style="margin-left:  10px;" class="em em-disappointed_relieved"></i></h1>
                            <br>
                            <p style="font-size: 18px;" class="card-text">Não perca tempo e aproveite agora para ouvir as melhores musicas do mais verdadeiro Rock and Roll da sua época!!</p>
                            <br>
                            <form action="index.php" method="POST">
                                <button name="playlist" class="btn btn-primary" type="submit" style="font-size: 20px;">Gerar minha playlist<i style="margin-left: 10px;" class="em em-guitar"></i></button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    <?php
} else {
    ?>

        <!-- ##### Featured Album Area Start ##### -->
        <div id="playlist" class="featured-album-area section-padding-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="featured-album-content d-flex flex-wrap">
                            <!-- Album Songs -->
                            <div class="album-songs h-100">

                                <!-- Album Info -->
                                <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="album-title">
                                        <h4>Playlist de <?php echo $nome; ?></h4>
                                        <h6>Feita a partir do ano de <?php echo $anoPlaylist; ?></h6>
                                    </div>
                                    <div style="margin-left: 10px;margin-bottom: 20px;" class="album-buy-now">
                                        <form action="index.php" method="POST">
                                            <button name="gerarNovaPlaylist" class="btn musica-btn button-gradient" type="submit">Gerar Novamente</button>
                                        </form>

                                    </div>
                                </div>

                                <div class="album-all-songs">
                                    <!-- Music Playlist -->
                                    <div class="music-playlist">
                                        <?php $contplaylist = $contmusicasg;
                                        foreach ($temPlaylist as $key) {
                                            $contplaylist++;
                                            ?>
                                            <!-- Single Song -->
                                            <div class="single-music">
                                                <h6><?php echo "{$key->nome} - {$key->artista}"; ?></h6>
                                                <audio id="<?php echo "song{$contplaylist}"; ?>" preload="auto" controls>
                                                    <source src="<?php echo "$key->musica_path"; ?>">
                                                </audio>
                                            </div>


                                        <?php
                                    } ?>
                                    </div>
                                </div>

                                <!-- Now Playing -->
                                <div class="now-playing d-flex flex-wrap align-items-center justify-content-between">
                                    <div class="songs-name">
                                        <p>Playing</p>
                                        <h6>-- '' --</h6>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="">
                                    </audio>
                                </div>

                            </div>
                            <!-- Album Thumbnail -->
                            <div class="album-thumbnail h-100 bg-img" style="background-image: url(../../assets/img/bg-img/musicaslogo2.jpg);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Featured Album Area End ##### -->
    <?php
} ?>



    <footer class="footer-area section-padding-100-0">
        <div class="container-fluid">
            <div class="row">

                <!-- Footer Widget Area -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="footer-widget-area mb-100">
                        <h1>Jailhouse Rock's</h1>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div style="margin-left: 20%;" class="col-12 col-sm-4 col-xl-2">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">

                            <img src="../../assets/img/bg-img/logo.png" alt="">


                        </div>
                    </div>



                </div>
            </div>
    </footer>

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="../../assets/js/jquery/script.min.js"></script>

</body>

</html>