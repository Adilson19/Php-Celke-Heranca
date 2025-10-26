<?php
abstract class Conn{
    private static string $db = 'mysql';
    private static string $host = 'localhost';
    private static string $user = 'root';
    private static string $pass = '1234';
    private static string $db_name = 'celke';
    private static int $port = 3306;
    private static object $connect;

    //  Metodo connectar
    public function connect(){
        try{    
            self::$connect = new PDO(self::$db.':host='.self::$host.';port='.self::$port.';dbname='.self::$db_name, self::$user, self::$pass);
            return self::$connect;
        }catch(Exception $ex){ 
            die("Erro: Por favor, verifique suas credenciais de acesso ao banco de dados!");
        }
    }

}