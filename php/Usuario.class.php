<?php

class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUser'] = $dado['id_usuario'];
            return true;
        } else {
            return false;
        } 
    }

    public function verificaSituacao($email) {
        $sql = "SELECT situacao FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindParam(':email', $email);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['situacao'] : null;
    }

    public function logged($id) {
        $array = array();

        $sql = "SELECT nome, email FROM usuarios WHERE id_usuario = :id_usuario";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue("id_usuario", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
}
?>
