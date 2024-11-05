<?php

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function viewLogin(): void
    {
        $this->render('login');
    }

    public function viewRegister(): void
    {
        $this->render('register');
    }

    public function dashboard(): void
    {
        if ($this->authService->isAuthenticated()) {
            $this->render('dashboard');
        } else {
            header("Location: /login");
            exit;
        }
    }

    public function register(array $data): void
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        if ($this->authService->register($name, $email, $password)) {
            header("Location: /dashboard");
            exit;
        } else {
            $this->render('register', ['error' => 'Email já existe']);
        }
    }

    public function login(array $data): void
    {
        $email = $data['email'];
        $password = $data['password'];

        if ($this->authService->login($email, $password)) {
            header("Location: /dashboard");
            exit;
        } else {
            $this->render('login', ['error' => 'Email ou senha inválida']);
        }
    }

    public function logout(): void
    {
        $this->authService->logout();
        header("Location: /login");
        exit;
    }

    public function render(string $view, array $data = []): void
    {
        extract($data);

        ob_start();
        require __DIR__ . "/../Views/{$view}.php";
        $content = ob_get_clean();

        require __DIR__ . '/../Views/layout.php';
    }
}
