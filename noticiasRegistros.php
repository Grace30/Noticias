<?php
    require_once("baseDeDatos.php");

    $conn = abrirBD();
    $presql = "SELECT idNoticia,titulo,copete,cuerpo,autor,fechaPublicacion,imagen FROM noticias ";

    if (isset($_GET['idNoticia'])) {
        $id = $_GET['idNoticia'];
        if ($id > 0)
            $sql = $presql . "where idNoticia = " . $id;
        else
            $sql = $presql . "order by idNoticia desc limit 1";
    }

    if (isset($_GET['noidNoticia'])) {
        $noid = $_GET['noidNoticia'];
        if ($noid < 0) {
            $sql = $presql . "order by idNoticia desc limit 1";
            $res = $conn->query($sql);
            foreach ($res as $fila) {
                $noid = $fila['idNoticia'];
            }
        }
        $sql = $presql . "where idNoticia not in (" . $noid . ")";
    }

    $result = $conn->query($sql);
    $Object = array();

    foreach ($result as $fila) {
        $temp = new stdClass();
        $temp->ID = $fila['idNoticia'];
        $temp->Titulo = utf8_encode($fila['titulo']);
        $temp->Copete = utf8_encode($fila['copete']);
        $temp->Cuerpo = utf8_encode($fila['cuerpo']);
        $temp->Autor = utf8_encode($fila['autor']);
        $temp->Fecha = utf8_encode($fila['fechaPublicacion']);
        $temp->Imagen = ($fila['imagen']);
        $Object[] = $temp;
    }

    if (isset($noid)) echo json_encode($Object);
    else echo json_encode($temp);
?>