<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Request;

class UserProfile extends RegistrationUser
{
    public int $id;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->id = $request->request->get('iduser');
    }
}
