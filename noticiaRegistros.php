<?php
    require_once("baseDeDatos.php");
	if (isset($_GET["idNoticia"]))
	{
        $conn = abrirBD();
		$id = $_GET["idNoticia"];
		$sql = "SELECT titulo,copete,cuerpo,autor,fechaPublicacion,imagen FROM noticias WHERE idNoticia=$id;";
        $result = $conn->query($sql);	
        $Object = array();
        
        foreach ($result as $fila) {
            $temp = new stdClass();
            $temp->Titulo = utf8_encode($fila['titulo']);
            $temp->Copete = utf8_encode($fila['copete']);
            $temp->Cuerpo = utf8_encode($fila['cuerpo']);
            $temp->Autor  = utf8_encode($fila['autor']);
            $temp->Fecha = utf8_encode($fila['fechaPublicacion']);
            $temp->Imagen = ($fila['imagen']);

            $Object[] = $temp;
        }
        echo json_encode($temp);
	}
?>