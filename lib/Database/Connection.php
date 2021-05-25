<?php

    namespace Database;

    abstract class Connection
    {
        private static $conn;

        public static function getConn()
        {
            if (!self::$conn) {
                $dsn = 'mysql:dbname=u310137542_auth;host=31.170.160.52';
                $user = 'u310137542_user_auth';
                $password = 'Luiz@4017';
                self::$conn = new \PDO($dsn, $user, $password);
            }

            return self::$conn;
        }
    }