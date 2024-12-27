<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "cinema";
    private static $user = "root";
    private static $password = "";
    
    public static function getConnection() {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
