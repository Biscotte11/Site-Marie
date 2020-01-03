<?php

class AddController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || array_key_exists('user', $_SESSION) ==false || $_SESSION['user']['role'] !== "admin" ) {
            $http->redirectTo('/');
    }

}

    public function httpPostMethod(Http $http, array $formFields)
    {
      // $fileName = $_FILES['photo'];

      // var_dump($_FILES);
      // var_dump($_POST);

      if ($_FILES['photo']['size']> 0) {
        $http->moveUploadedFile('photo', '/images/groupe');
      } else {
        $fileName = 'no-photo/png';
      }

      $userModel = new UserModel();
      $userModel->addGroupe($_POST, $_FILES);
      // $http->redirectTo('/admin');
    }
}
