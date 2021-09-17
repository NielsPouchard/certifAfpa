<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Request;

class RegistrationUser
{
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
    public string $confirmPassword;
    public string $pseudo;
    public string $role;

    public function __construct(Request $request)
    {
        extract($request->request->all(), EXTR_SKIP);
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $mdp;
        $this->confirmPassword = $confirmMdp;
        $this->pseudo = $pseudo;
        $this->role = 'userRole';
    }
}
