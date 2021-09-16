<?php

namespace App\Model;

class UserSession
{
    public int $id;

    public string $email;

    public string $name;

    public string $surname;

    public string $pseudo;

    public string $photo;

    public function __construct(array $data)
    {
        $this->email = $data['email'];
        $this->id = $data['iduser'];
        $this->name = $data['nom'];
        $this->surname = $data['surName'];
        $this->pseudo =  $data['pseudo'];
        $this->photo = $data['photo'];
    }
}
