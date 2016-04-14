<?php
require_once 'Service.php';

class SearchService implements Service {
    
    private $query;
    
    function setQuery($busca) {
        $this->query = "	SELECT		  
		  o.*,u.nome
		FROM
		  ofertas o , usuario u
		WHERE
		  (titulo LIKE '%$busca%' OR conteudo LIKE '%$busca%' OR  u.nome LIKE '%$busca%') AND
		  o.id_usuario = u.id
";
    }

    
    public function getJson($parameter) {
        $conexao = new Conexao();
        $response = array();
        $this->setQuery($parameter);
        //echo $query;
        $result = mysql_query($this->query);


        while ($row = mysql_fetch_assoc($result)) {

            $SQL = "SELECT path FROM foto WHERE id_oferta = " . $row['id'];

            $resultFoto = mysql_query($SQL);

            $arrFotos = array();
            while ($foto = mysql_fetch_array($resultFoto)) {
                array_push($arrFotos, $foto['path']);
            }

            $response[] = array(
                'lat' => $row['latitude'],
                'lng' => (string) $row['longitude'],
                'content' => $row['conteudo'],
                'icon' => $row['icone'],
//            'dtPost' => formata_data($row['dataPost']),
                'dtPost' => $row['dataPost'],
                'titulo' => $row['titulo'],
                'id' => $row['id'],
                'id_usuario' => $row['id_usuario'],
                'nome' => $row['nome'],
                'dataFim' => $row['dataFim'],
                'fotos' => $arrFotos
            );
        }

        return $response;
    }
    
    public function __toString() {
        return "oooi";
    }

}

?>