<?php

class ProfilController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $userModel = new UserModel();
      $user = $userModel->getOneUser($_SESSION['user']['Id']);

      $userModel = new UserModel();
      $groupes = $userModel->nomGroupe();

      return [
            'user'=>$user,
            'groupes'=>$groupes
      ];


      //var_dump($groupes);
    
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $userModel = new UserModel();
      $userModel->changeUserProfil($_POST, $_SESSION['user']['Id']);

      $http->redirectTo('/user/profil');

    }
}
