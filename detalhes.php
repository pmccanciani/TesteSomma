<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Imobiliária PC</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <a class="navbar-brand text-brand" href="index.php">Imobiliária<span class="color-b">PC</span></a>
    
          <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
    
              <li class="nav-item">
                <a class="nav-link " href="login.php">Administrador</a>
              </li>
            </ul>
          </div>
    
        </div>
    </nav>

    <?php
    session_name("imobiliaria_pc");
    session_start();

    if(!isset($_SESSION["token"])){
        session_destroy();
        header("Location: ../login.php?msg=Erro de sessão!");
       // die();
    }


    include_once 'controller/conexao.php';
    include_once 'controller/classImoveis.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Imoveis($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : '' ;
    $item->getUniImoveis();
?>

    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $item->titulo; ?></h1>
              <span class="color-text-a"><?php echo $item->bairro; ?>, <?php echo $item->cidade; ?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="home.php">Início</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="property-single-carousel" class="swiper-container">
              <div class="swiper-wrapper">
                <div class="carousel-item-b swiper-slide">
                  <img src="assets/img/slide-1.jpg" alt="">
                </div>
                <div class="carousel-item-b swiper-slide">
                  <img src="assets/img/slide-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="property-single-carousel-pagination carousel-pagination"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">

            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="bi bi-cash"></span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c">R$<?php echo $item->valor; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Resumo</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Código:</strong>
                        <span><?php echo $item->codigo; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Localização:</strong>
                        <span><?php echo $item->bairro; ?>, <?php echo $item->cidade; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Tipo:</strong>
                        <span><?php echo $item->categoria; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Área:</strong>
                        <span><?php echo $item->metragem; ?>m
                          <sup>2</sup>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Quartos:</strong>
                        <span><?php echo $item->dormitorios; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Banheiros:</strong>
                        <span><?php echo $item->banheiros; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Garagens:</strong>
                        <span><?php echo $item->garagens; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>IPTU:</strong>
                        <span><?php echo $item->iptu; ?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Condominio:</strong>
                        <span><?php echo $item->condominio; ?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Descrição</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                  <?php echo $item->descricao; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          
        </div>
      </div>
    </section>


</body>

</html>