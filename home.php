<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="js/swiper-bundle.min.css" rel="stylesheet">
    <title>Imobiliária PC</title>
</head>
<body>

    <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Procurar</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" action="home.php" method="post">
        <div class="row">
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="tipo">Tipo</label>
              <select class="form-control form-select form-control-a" name="tipo" id="tipo">
                <option value="%">Todos</option>
                <option value="Alugar">Alugar</option>
                <option value="Vender">Vender</option>
              </select>
              <input type="hidden" name="buscar" id="buscar" value="buscar">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="quartos">Quartos</label>
              <select class="form-control form-select form-control-a" name="quartos" id="quartos">
                <option value="%">Todos</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="garagens">Garagens</label>
              <select class="form-control form-select form-control-a" name="garagens" id="garagens">
                <option value="%">Todos</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="banheiro">Banheiros</label>
              <select class="form-control form-select form-control-a" name="banheiro" id="banheiro">
                <option value="%">Todos</option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Buscar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    
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
    
          <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
            <i class="bi bi-search"></i>
          </button>
    
        </div>
    </nav>
    
      <main id="main">

        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                  <h1 class="title-single">Nossas propriedades incríveis</h1>
                </div>
              </div>
              
            </div>
          </div>
        </section><!-- End Intro Single-->
    
        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
          <div class="container">
            <div class="row">
            
            <?php
               include_once 'controller/conexao.php';
               include_once 'controller/classImoveis.php';
           
               $database = new Database();
               $db = $database->getConnection();
               $item = new Imoveis($db);
               if(!isset($_POST['buscar'])){
                $temp = $item->getImoveis();
               } else{
                $item->categoria = $_POST['tipo'];
                $item->dormitorios = $_POST['quartos'];
                $item->garagens = $_POST['garagens'];
                $item->banheiros = $_POST['banheiro'];
                $temp = $item->getFiltImoveis();
               }
               
               $count = $temp->rowCount();

              if($count > 0){
                while ($row = $temp->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    echo '<div class="col-md-4">
                            <div class="card-box-a card-shadow">
                              <div class="img-box-a">
                                <img src="img/'.$imagem.'" alt="" class="img-a img-fluid">
                              </div>
                              <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                  <div class="card-header-a">
                                    <h2 class="card-title-a">
                                      <a href="#">'.$titulo.'</a>
                                    </h2>
                                  </div>
                                  <div class="card-body-a">
                                    <div class="price-box d-flex">
                                      <span class="price-a">R$ '.$valor.'</span>
                                    </div>
                                    <a href="detalhes.php?id='.$id.'" class="link-a">Clique aqui para mais detalhes
                                      <span class="bi bi-chevron-right"></span>
                                    </a>
                                  </div>
                                  <div class="card-footer-a">
                                    <ul class="card-info d-flex justify-content-around">
                                      <li>
                                        <h4 class="card-info-title">Área</h4>
                                        <span>'.$metragem.'m
                                          <sup>2</sup>
                                        </span>
                                      </li>
                                      <li>
                                        <h4 class="card-info-title">Quartos</h4>
                                        <span>'.$dormitorios.'</span>
                                      </li>
                                      <li>
                                        <h4 class="card-info-title">Banheiros</h4>
                                        <span>'.$banheiros.'</span>
                                      </li>
                                      <li>
                                        <h4 class="card-info-title">Garagens</h4>
                                        <span>'.$garagens.'</span>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>';

                }
              }
            ?>


              

              
            </div>
          </div>
        </section><!-- End Property Grid Single-->
    
      </main><!-- End #main -->
    





      <script src="css/swiper-bundle.min.js"></script>
      <script src="js/main.js"></script>

</body>
</html>