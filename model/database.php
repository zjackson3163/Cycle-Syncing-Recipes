<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=cycle_syncing_recipes';
    private static $username = 'web_user';
    private static $password = ']S@97*Jd866_[T2k';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>