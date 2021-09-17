<?php
namespace App\Repository;

use App\Database\DB;
use App\Model\RegistrationUser;

class UserRepository extends AbstractRepository
{
    public function checkIfUserExists(string $email)
    {
        $check = $this->getDb()->prepare("SELECT iduser, email FROM user WHERE email = ?");
        $check->execute([$email]);
        return $check->fetchObject();
    }

    public function register(RegistrationUser $user)
    {
        $insert = $this->getDb()->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)");
        $insert->execute([
            'nom' => $user->name,
            'surName' => $user->surname,
            'email' => $user->email,
            'mdp' => $user->password,
            'pseudo' => $user->pseudo,
            'role' => $user->role
        ]);
        return $insert->fetchObject();
    }

    public function getUserByEmail(string $email)
    {
        $bdd = DB::getDb();
        $check = $bdd->prepare("SELECT * FROM user WHERE email = ?");
        $check->execute(array($email));
        return $check->fetchObject();
    }

    public function getUserById(int $userId)
    {
        $bdd = DB::getDb();
        $check = $bdd->prepare("SELECT * FROM user WHERE iduser = ?");
        $check->execute([$userId]);
        return $check->fetchObject();
    }

    public function updateUser(array $variables)
    {
        $bdd = DB::getDb();
        $updateDataUser = $bdd->prepare("UPDATE user SET nom = :name, surName = :surname, email = :email, pseudo = :pseudo WHERE iduser = :iduser");
        $updateDataUser->execute('name', 'surname', 'email', 'pseudo', 'iduser');
        return $updateDataUser->fetchObject();
    }
}
