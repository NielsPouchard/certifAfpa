<?php

namespace App\Model;

class UserSession
{
    public int $id;

    public string $email;

    public ?string $name;

    public ?string $surname;

    public ?string $pseudo;

    public ?string $photo;

    public string $role;

    public function __construct($data)
    {
        if (is_array($data)) {
            $this->email = $data['email'];
            $this->id = $data['iduser'];
            $this->name = $data['nom'];
            $this->surname = $data['surName'];
            $this->pseudo =  $data['pseudo'];
            $this->photo = $data['photo'] ?? null;
            $this->role = $data['role'] ?? 'userRole';
        } else {
            $this->email = $data->email;
            $this->id = $data->iduser;
            $this->name = $data->nom;
            $this->surname = $data->surName;
            $this->pseudo =  $data->pseudo;
            $this->photo = $data->photo ?? null;
            $this->role = $data->role ?? 'userRole';
        }
    }
}
