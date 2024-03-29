<?php

    class LoginController
    {
        public function index() {

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => '/path/to/compilation_cache',
                'auto_reload' => true,
            ]);
            $template = $twig->load('login.html');
                $parameters['error'] = $_SESSION['msg_error'] ?? null;

            return $template->render($parameters);
        }

        public function check() {

            try {
                $user = new User;
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                $user->validateLogin();

                header('Location: http://localhost/sistema-auth/dashboard');
            } catch (\Exception $e) {
                $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);

                header('Location: http://localhost/sistema-auth/');
            }
            
        }

        public function cadastro() {
            
            $user = new User;
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setConfPassword($_POST['conf_password']);
            $user->cadastraModel();

            header('Location: http://localhost/sistema-auth/dashboard');
        }
    }
