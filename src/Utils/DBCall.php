<?php

// this code is nice !
function checkUsers(int $iduser): array
{
    $bdd = getBdd();
    $check = $bdd->prepare("SELECT * FROM user WHERE iduser = ?");
    $check->execute(array($iduser));
    $data = $check->fetch();

    return $data;
}


// return type is good, you need to type function arguments too
function selectPicture($target_file): array
{
    $bdd = getBdd();
    $check = $bdd->prepare('SELECT photo FROM user WHERE iduser= ?');
    // check what is $target_file, you may not have iduser here
    $check->execute(array($target_file));
    $picture = $check->fetch();

    return $picture;
}

// don't expect all session but just the data you need
//	function deletePicture($_SESSION): void{
function deletePicture(int $userId): void
{
    $bdd = getBdd();
    $existPicture = $bdd->prepare("DELETE photo FROM user WHERE iduser = ?");
    $existPicture->execute([$userId]);
}

// wrong parameter name
function insertUser(array $variables=[]): void
{
    $bdd = getBdd();
    // make sure the extracted data are valid
    extract($variables, 1);
    $insert = $bdd->prepare("INSERT INTO user(nom, surName, email, mdp, pseudo, role) VALUES (:nom, :surName, :email, :mdp, :pseudo, :role)");
    // check compact method result
    $insert->execute(compact('name','surname','email','password','pseudo','role'));
}

function updateUserPicture(array $variables=[])
{

}
