<?php

class Imoveis {
        // Connection
        private $conn;

        // Table
        private $db_table = "imoveis";

        // Columns
        public $id;
        public $codigo;
        public $categoria;
        public $titulo;
        public $descricao;
        public $dormitorios;
        public $banheiros;
        public $garagens;
        public $valor;
        public $condominio;
        public $iptu;
        public $cidade;
        public $bairro;
        public $metragem;
        public $ativo;
        public $versao;
        public $total;
        public $imagem;

        // conexão 
        public function __construct($db){
            $this->conn = $db;
        }

        // todos registros ativos
        public function getImoveis(){
            $sqlQuery = "SELECT *,(select imagem from imagens where imagens.codigo=imoveis.codigo limit 1) as imagem FROM " . $this->db_table . " where ativo = '1' ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        
        
        // todos registros para um filtro
        public function getFiltImoveis(){
            $sqlQuery = "SELECT *,(select imagem from imagens where imagens.codigo=imoveis.codigo limit 1) as imagem FROM " . $this->db_table . " 
                where 
                    categoria like :categoria and
                    dormitorios like :dormitorios and
                    garagens like :garagens and
                    banheiros like :banheiros and
                    ativo = '1' 
                
                ";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->categoria=htmlspecialchars(strip_tags($this->categoria));
            $this->dormitorios=htmlspecialchars(strip_tags($this->dormitorios));
            $this->garagens=htmlspecialchars(strip_tags($this->garagens));
            $this->banheiros=htmlspecialchars(strip_tags($this->banheiros));

            $stmt->bindParam(":categoria", $this->categoria);
            $stmt->bindParam(":dormitorios", $this->dormitorios);
            $stmt->bindParam(":garagens", $this->garagens);
            $stmt->bindParam(":banheiros", $this->banheiros);
            
            $stmt->execute();
            return $stmt;
        }

        // um registro
        public function getUniImoveis(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . " where id = ? ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
                        
            $this->codigo = $dataRow['codigo'];
            $this->categoria = $dataRow['categoria'];
            $this->titulo = $dataRow['titulo'];
            $this->descricao = $dataRow['descricao'];
            $this->dormitorios = $dataRow['dormitorios'];
            $this->banheiros = $dataRow['banheiros'];
            $this->garagens = $dataRow['garagens'];
            $this->valor = $dataRow['valor'];
            $this->condominio = $dataRow['condominio'];
            $this->iptu = $dataRow['iptu'];
            $this->cidade = $dataRow['cidade'];
            $this->bairro = $dataRow['bairro'];
            $this->metragem = $dataRow['metragem'];
            $this->ativo = $dataRow['ativo'];
            $this->versao = $dataRow['versao'];
            
        }
        

        // Maior id de imoveis
        public function maxImoveis(){
            $sqlQuery = "SELECT max(id) as total FROM " . $this->db_table . " ";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->total = $dataRow['total'];

            return $stmt;
        }

        // Criação de registros
        public function createImoveis(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        codigo = :codigo,
                        categoria = :categoria,
                        titulo = :titulo,
                        descricao = :descricao,
                        dormitorios = :dormitorios,
                        banheiros = :banheiros,
                        garagens = :garagens,
                        valor = :valor,
                        condominio = :condominio,
                        iptu = :iptu,
                        cidade = :cidade,
                        bairro = :bairro,
                        metragem = :metragem,
                        ativo = '1',
                        versao = '1'
                    ";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->codigo=htmlspecialchars(strip_tags($this->codigo));
            $this->categoria=htmlspecialchars(strip_tags($this->categoria));
            $this->titulo=htmlspecialchars(strip_tags($this->titulo));
            $this->descricao=htmlspecialchars(strip_tags($this->descricao));
            $this->dormitorios=htmlspecialchars(strip_tags($this->dormitorios));
            $this->banheiros=htmlspecialchars(strip_tags($this->banheiros));
            $this->garagens=htmlspecialchars(strip_tags($this->garagens));
            $this->valor=htmlspecialchars(strip_tags($this->valor));
            $this->condominio=htmlspecialchars(strip_tags($this->condominio));
            $this->iptu=htmlspecialchars(strip_tags($this->iptu));
            $this->cidade=htmlspecialchars(strip_tags($this->cidade));
            $this->bairro=htmlspecialchars(strip_tags($this->bairro));
            $this->metragem=htmlspecialchars(strip_tags($this->metragem));

            $stmt->bindParam(":codigo", $this->codigo);
            $stmt->bindParam(":categoria", $this->categoria);
            $stmt->bindParam(":titulo", $this->titulo);
            $stmt->bindParam(":descricao", $this->descricao);
            $stmt->bindParam(":dormitorios", $this->dormitorios);
            $stmt->bindParam(":banheiros", $this->banheiros);
            $stmt->bindParam(":garagens", $this->garagens);
            $stmt->bindParam(":valor", $this->valor);
            $stmt->bindParam(":condominio", $this->condominio);
            $stmt->bindParam(":iptu", $this->iptu);
            $stmt->bindParam(":cidade", $this->cidade);
            $stmt->bindParam(":bairro", $this->bairro);
            $stmt->bindParam(":metragem", $this->metragem);

            if($stmt->execute()){
               return true;
            }
            return false;
         
        }

        public function updateImoveis(){
            $sqlUpdateQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        ativo = 0
                    WHERE 
                        id = ?  ";
            $stmtUpdate = $this->conn->prepare($sqlUpdateQuery);
            $stmtUpdate->bindParam(1, $this->id);

            print_r($stmtUpdate);

            if($stmtUpdate->execute()){
                $sqlQuery = "INSERT INTO
                            ". $this->db_table ."
                        SET
                            codigo = :codigo,
                            categoria = :categoria,
                            titulo = :titulo,
                            descricao = :descricao,
                            dormitorios = :dormitorios,
                            banheiros = :banheiros,
                            garagens = :garagens,
                            valor = :valor,
                            condominio = :condominio,
                            iptu = :iptu,
                            cidade = :cidade,
                            bairro = :bairro,
                            metragem = :metragem,
                            ativo = :ativo,
                            versao = :versao
                        ";

                $stmt = $this->conn->prepare($sqlQuery);

                $this->codigo=htmlspecialchars(strip_tags($this->codigo));
                $this->categoria=htmlspecialchars(strip_tags($this->categoria));
                $this->titulo=htmlspecialchars(strip_tags($this->titulo));
                $this->descricao=htmlspecialchars(strip_tags($this->descricao));
                $this->dormitorios=htmlspecialchars(strip_tags($this->dormitorios));
                $this->banheiros=htmlspecialchars(strip_tags($this->banheiros));
                $this->garagens=htmlspecialchars(strip_tags($this->garagens));
                $this->valor=htmlspecialchars(strip_tags($this->valor));
                $this->condominio=htmlspecialchars(strip_tags($this->condominio));
                $this->iptu=htmlspecialchars(strip_tags($this->iptu));
                $this->cidade=htmlspecialchars(strip_tags($this->cidade));
                $this->bairro=htmlspecialchars(strip_tags($this->bairro));
                $this->metragem=htmlspecialchars(strip_tags($this->metragem));
                $this->ativo=htmlspecialchars(strip_tags($this->ativo));
                $this->versao=htmlspecialchars(strip_tags($this->versao));
                $this->versao=$this->versao+1;

                $stmt->bindParam(":codigo", $this->codigo);
                $stmt->bindParam(":categoria", $this->categoria);
                $stmt->bindParam(":titulo", $this->titulo);
                $stmt->bindParam(":descricao", $this->descricao);
                $stmt->bindParam(":dormitorios", $this->dormitorios);
                $stmt->bindParam(":banheiros", $this->banheiros);
                $stmt->bindParam(":garagens", $this->garagens);
                $stmt->bindParam(":valor", $this->valor);
                $stmt->bindParam(":condominio", $this->condominio);
                $stmt->bindParam(":iptu", $this->iptu);
                $stmt->bindParam(":cidade", $this->cidade);
                $stmt->bindParam(":bairro", $this->bairro);
                $stmt->bindParam(":metragem", $this->metragem);
                $stmt->bindParam(":ativo", $this->ativo);
                $stmt->bindParam(":versao", $this->versao);

                if($stmt->execute()){
                    return true;
                }
                return false;
            }else{
                echo "falha";
            }

            return false;

        }

        function deleteImoveis(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                $sqlMatQuery = "DELETE FROM matricula WHERE codigo = ?";
                $stmtMat = $this->conn->prepare($sqlMatQuery);
                $this->codigo=htmlspecialchars(strip_tags($this->codigo));
                $stmtMat->bindParam(1, $this->codigo);
                $stmtMat->execute();
                
                $sqlImgQuery = "DELETE FROM imagens WHERE codigo = ?";
                $stmtImg = $this->conn->prepare($sqlImgQuery);
                $this->codigo=htmlspecialchars(strip_tags($this->codigo));
                $stmtImg->bindParam(1, $this->codigo);
                $stmtImg->execute();
                return true;
            }
            return false;
        }

}  