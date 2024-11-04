<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class User
{
    private $pdo;

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function create(string $name, string $email, string $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function findByEmail(string $email): ?self
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetchObject(self::class);

        return $user ?: null;
    }
}
