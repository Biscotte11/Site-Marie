<?php

class AdminController
{
  public function httpGetMethod(Http $http, array $queryFields)
 {
   if(empty($_SESSION) == true || $_SESSION['user']['role'] !== "admin" ) {
         $http->redirectTo('/');
     }
     $userModel = new UserModel();
     $groupes = $userModel->nomGroupe();

     $userModel = new UserModel();
     $musiciens = $userModel->listAllUsers();

     return [
           'groupes' => $groupes,
           'musiciens'=> $musiciens
       ];
 }


    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}
