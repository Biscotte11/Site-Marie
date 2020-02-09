<?php

class ResetController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $mail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

      if (empty($mail)) {
        $http->redirectTo('/accueil');
      }
      $userModel = new UserModel();
      $userMail = $userModel->getUserByEmail($mail);

      if(empty($userMail)) {
        $http->redirectTo('/accueil');
      } else {
        $token= $userModel->updateToken($userMail['Id']);
      }

      $route= $_SERVER['HTTP_HOST'];
      $to= $userMail ['email'];
      $subject= 'reset du mot de passe';
      $message= 'Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe : <a href="'.$route.'/user/passwordreset?token='.$token.'">Réinitialiser le mot de passe</a>';

      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=UTF-8';
      mail ( $to, $subject, $message, implode("\r\n", $headers));
    }
}
