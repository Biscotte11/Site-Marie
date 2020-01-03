<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $userModel = new UserModel();
      $userModel->signIn($_POST);

      $http->redirectTo('/accueil');

      // $userModel = new UserModel();
      // $userModel->connectUser($_POST);
      //
      // $http->redirectTo('/');
    }
}
