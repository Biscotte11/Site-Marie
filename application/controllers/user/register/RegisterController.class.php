<?php

class RegisterController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $userModel = new UserModel();
      $groupes = $userModel->nomGroupe();

      //var_dump($groupes);
      return [
               'groupes'=>$groupes
             ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      //var_dump($_POST);
      $userModel = new UserModel();
      $userModel->signUp($_POST);



      $http->redirectTo('/user/login');
    }
}
