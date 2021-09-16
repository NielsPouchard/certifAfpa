<?php
namespace App\Model;

use App\Database\DB;

class User
{
    protected string $email;
    protected string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

	public function checkUsers(string $email): ?array
	{
		$bdd = DB::getDb();
		$check = $bdd->prepare("SELECT * FROM user WHERE email = ?");
		$check->execute(array($email));
		$data = $check->fetch();

		return $data;
	}

	public function insertUser(array $variables=[])
	{
        $bdd = DB::getDb();
		extract($variables);
		$insert = $bdd->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)");
		$insert->execute(compact('name','surname','email','password','pseudo','role'));
	}


	public function updateUser(array $variables=[])
	{
        $bdd = DB::getDb();
		extract($variables);
		$updateDataUser = $bdd->prepare("UPDATE user SET nom = :name, surName = :surname, email = :email, pseudo = :pseudo WHERE iduser = :iduser");
		$user = $updateDataUser->execute(compact('name', 'surname', 'email', 'pseudo', 'iduser'));
	}

    public function saveUser(array $data)
    {

    }
}
