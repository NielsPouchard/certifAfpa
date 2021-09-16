<?php
namespace App\Repository;

class UserRepository extends AbstractRepository
{
    public function checkIfUserExists(string $email)
    {
        $existingUserQuery = $this->getDb()->prepare('SELECT * FROM user WHERE email = ?');
        $existingUser = $existingUserQuery->execute(array($email));
        var_dump($existingUser);
        return $existingUser;
    }
}
