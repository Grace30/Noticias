<?php
    require_once("baseDeDatos.php");
        $conn = abrirBD();
		$sql = "SELECT idNoticia,titulo,copete,cuerpo,autor,fechaPublicacion,imagen FROM noticias;";
        $result = $conn->query($sql);	
        $Object = array();
        
        foreach ($result as $fila) {
            $temp = new stdClass();
            $temp->ID = $fila['idNoticia'];
            $temp->Titulo = utf8_encode($fila['titulo']);
            $temp->Copete = utf8_encode($fila['copete']);
            $temp->Cuerpo = utf8_encode($fila['cuerpo']);
            $temp->Autor  = utf8_encode($fila['autor']);
            $temp->Fecha = utf8_encode($fila['fechaPublicacion']);
            $temp->Imagen = ($fila['imagen']);
            $Object[] = $temp;
        }
        
        echo json_encode($Object);
?>