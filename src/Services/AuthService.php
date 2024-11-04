<?php

namespace App\Services;

use App\Models\User;
class AuthService
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register(string $name, string $email, string $password): bool
    {
        if ($this->userModel->findByEmail($email)) {
            return false;
        }

        // Criptografa a senha antes de salvar
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $this->userModel->create($name, $email, $hashedPassword);

        return true;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            return true;
        }

        return false;
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function logout(): void
    {
        unset($_SESSION['user_id']);
        session_destroy();
    }

}