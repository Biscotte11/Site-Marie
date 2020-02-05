<?php

class PasswordresetController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      if (empty($token)) {
        $http->redirectTo('/accueil');
      }

      $um = new UserModel();
      $user = $um->getUserByToken($token);

      if (empty($user)) {
        $http->redirectTo('/accueil');
      }

      return ['token' => $token];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $confirm = filter_input(INPUT_POST, 'passconfirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      if (empty($token)) {
        $http->redirectTo('/accueil');
      }

      if ($pwd === $confirm) {
        $um = new UserModel();
        $user = $um->getUserByToken($token);

        if (empty($user)) {
          $http->redirectTo('/accueil');
        }

        $um->updatePassword($user->id, $password);
      }

      $http->redirectTo('/user/login');
    }
}
