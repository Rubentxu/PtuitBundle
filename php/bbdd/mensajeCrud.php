<?php

class mensajeCrud {

    //	try{
    static function leerMensajes() {
        $db = db::pdo();
        foreach ($db->query('SELECT * FROM `SMS` ORDER BY `id` DESC') as $row)
            $rows[] = array('texto' => $row['texto'], 'mod' => $row['mod']);
        if (isset($rows))
            return $rows;
    }

    static function crearMensaje($mensaje,$idCategoria,$idUsuario) {
        $db = db::pdo();
        $sql = $db->prepare('INSERT INTO `SMS` (`texto`,`category`,`user`) VALUES (:texto, :categoria, :usuario);');
        $sql->bindParam(':texto', $mensaje, PDO::PARAM_STR);
        $sql->bindParam(':categoria', $idCategoria, PDO::PARAM_INT);
        $sql->bindParam(':usuario', $idUsuario, PDO::PARAM_INT);
        $sql->execute();
    }

}

?>