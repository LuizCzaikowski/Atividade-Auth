<?php

    use Database\Connection;

    class User
    {
        private $name;
        private $email;
        private $password;
        private $conf_password;

        public function validateLogin()
        {
            $conn = Connection::getConn();
            //selecionar o usuario que tenha o mesmo email do informado
            $sql = 'SELECT * FROM usuario_table WHERE email = :email';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                if ($result['password'] === $this->password) {
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
                    );

                    return true;
                }
            }

            throw new \Exception('Login Inválido');
        }

        public function cadastraModel() {

            $conn = Connection::getConn();
            $sql = "INSERT INTO usuario_table (name, email, password, conf_password) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->getName(), $this->getEmail(), $this->getPassword(), $this->getConfPassword()]);

            $sql = 'SELECT * FROM usuario_table WHERE email = :email';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();
            $result = $stmt->fetch();
            $_SESSION['usr'] = array(
                'id_user' => $result['id'], 
                'name_user' => $result['name']
            );
            return true;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function setConfPassword($conf_password)
        {
            $this->conf_password = $conf_password;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getConfPassword()
        {
            return $this->conf_password;
        }
    }
