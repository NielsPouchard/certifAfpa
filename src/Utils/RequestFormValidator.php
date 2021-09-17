<?php
namespace App\Utils;

use Symfony\Component\HttpFoundation\Request;

trait RequestFormValidator
{
    public function isRegisterFormValid(Request $request): bool
    {
        return !empty($request->request->get('name'))
            && !empty($request->request->get('surname'))
            && !empty($request->request->get('email'))
            && !empty($request->request->get('mdp'))
            && !empty($request->request->get('confirmMdp'))
            && !empty($request->request->get('pseudo'))
            ;
    }

    public function isUserProfileFormValid(Request $request): bool
    {
        return !empty($request->request->get('name'))
            && !empty($request->request->get('surname'))
            && !empty($request->request->get('email'))
            && !empty($request->request->get('pseudo'))
            && !empty($request->request->get('iduser'))
            ;
    }
}
