<?php

class usuarioCrud {

    static function crearUsuario($usuario, $pass, $correo) {
        $db = db::pdo();
        $sql = $db->prepare('INSERT INTO `USER` (`nick`,`hashPass`,`email`) VALUES (:nick , :pass, :email);');
        $sql->bindParam(':nick', $usuario, PDO::PARAM_STR);
        $sql->bindParam(':pass', $pass, PDO::PARAM_STR);
        $sql->bindParam(':email', $correo, PDO::PARAM_STR);
        return $sql->execute();
    }

    static function cogerUsuario($idUsuario, $pass) {
        $db = db::pdo();
        foreach ($db->query('SELECT * FROM `USER` WHERE  `id`="' . $idUsuario . '"') as $row)
            $rows[] = array('usuario' => $row['nick'], 'pass' => $row['hashPass'], 'idUsuario' => $row['id'], 'email' => $row['email']);
        if (isset($rows))
            return $rows;
    }

}

?>