<?php

/**
 * Description of serviceMySql
 *
 * @author rubentxu
 */
require_once 'IService.php';

class serviceMySql implements IService {

    private $name;
    private $user;
    private $pass;

    public function __construct($name, $user, $pass) {
        $this->name = $name;
        $this->user = $user;
        $this->pass = $pass;
    }

    private function pdo() {
        return new PDO('mysql:host=localhost;dbname=' . $this->name, $this->user, $this->pass);
    }

    public function crearUsuario($usuario, $pass, $correo) {
        try {
            $db = $this->pdo();
            $sql = $db->prepare('INSERT INTO `USER` (`nick`,`hashPass`,`email`) VALUES (:nick , :pass, :email);');
            $sql->bindParam(':nick', $usuario, PDO::PARAM_STR);
            $sql->bindParam(':pass', $pass, PDO::PARAM_STR);
            $sql->bindParam(':email', $correo, PDO::PARAM_STR);
            return $sql->execute();
            $db = NULL;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function cogerUsuario($usuario, $pass) {
        try {
            $db = $this->pdo();
            foreach ($db->query('SELECT * FROM `USER` WHERE  nick="' . $usuario . '"') as $row)
                $rows[] = array('usuario' => $row['nick'], 'pass' => $row['hashPass'],
                    'idUsuario' => $row['id'], 'email' => $row['email']);
            if (isset($rows))
                return $rows;
            $db = NULL;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function leerMensajes() {
        try {
            $db = $this->pdo();
            foreach ($db->query('SELECT SMS.id, SMS.texto, DATE_FORMAT( SMS.mod, "%H:%i %d/%m/%Y" ) AS fmod
            , CATEGORY.name AS categoria, CATEGORY.rutaCat, USER.nick, USER.email
                FROM `SMS` , `CATEGORY` , `USER`
                WHERE SMS.category = CATEGORY.id
                AND SMS.user = USER.id
                ORDER BY SMS.id DESC') as $row) {
                $rows[] = array('texto' => $row['texto'], 'mod' => $row['fmod'],
                    'categoria' => $row['categoria'], 'rutaCat' => $row['rutaCat'], 'usuario' => $row['nick'], 'email' => $row['email']);
            }
            if (isset($rows))
                return $rows;
            $db = NULL;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function leerUltimoMensaje() {
        $db = $this->pdo();
        $stmt = $db->prepare('SELECT SMS.id, SMS.texto, DATE_FORMAT( SMS.mod, "%H:%i %d/%m/%Y" )
            AS fmod, CATEGORY.name AS categoria, CATEGORY.rutaCat, USER.nick AS usuario, USER.email
            FROM `SMS` , `CATEGORY` , `USER` WHERE SMS.category = CATEGORY.id
            AND SMS.user = USER.id ORDER BY id DESC LIMIT 0 , 1');
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function leerCategoriasAleatorias() {
        $db = $this->pdo();
        $cant = $db->query('SELECT count(*) AS cantidad FROM CATEGORY')->fetch();

        $numero = rand(0, $cant['cantidad']);
        foreach ($db->query("SELECT * FROM `CATEGORY` LIMIT $numero, 10") as $row) {
            $rows[] = array('categoria' => $row['name'], 'rutaCat' => $row['rutaCat']);
        }
        if (isset($rows))
            return $rows;
        $db = NULL;
    }

    public function crearMensaje($mensaje, $idCategoria, $idUsuario) {
        try {
            $db = $this->pdo();
            $sql = $db->prepare('INSERT INTO `SMS` (`texto`,`category`,`user`)
            VALUES (:texto, :categoria, :usuario);');
            $sql->bindParam(':texto', $mensaje, PDO::PARAM_STR);
            $sql->bindParam(':categoria', $idCategoria, PDO::PARAM_INT);
            $sql->bindParam(':usuario', $idUsuario, PDO::PARAM_INT);
            $sql->execute();
            $db = NULL;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
