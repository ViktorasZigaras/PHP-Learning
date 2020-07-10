<?php
namespace App\DB;

use Ramsey\Uuid\Uuid;

class MySQL implements DataBase {

    private static $pdo = [];

    public function __construct() {
        $host = 'localhost';
        $db   = 'learning';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            self::$pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function create(array $customerData) : void {
        try {
            $sql = "INSERT INTO bank (uuid, account, personal_code, name, surname, value) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                (string) Uuid::uuid4(),
                $customerData['account'], 
                $customerData['personal_code'], 
                $customerData['name'], 
                $customerData['surname'], 
                $customerData['value']
            ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
 
    public function update(string $customerUUID, array $customerData) : void {
        try {
            $sql = "UPDATE bank SET account = ?, personal_code = ?, name = ?, surname = ?, value = ? WHERE uuid = ?";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                $customerData['account'], 
                $customerData['personal_code'], 
                $customerData['name'], 
                $customerData['surname'], 
                $customerData['value'],
                $customerUUID
            ]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
 
    public function delete(string $customerUUID) : void {
        try {
            $sql = "DELETE FROM bank WHERE uuid = ?";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([$customerUUID]);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
 
    public function show(string $customerUUID) : array {
        try {
            $sql = "SELECT * FROM bank WHERE uuid = ?";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([$customerUUID]);
            return (array) $stmt->fetch();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    
    public function showAll() : array {
        try {
            $sql = "SELECT * FROM bank";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            return (array) $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

}