<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $id = $_GET['id'];

      $userModel = new UserModel();
      $userModel->deleteUser($id);


      $concertModel = new ConcertsModel();
      $concertModel->deleteConcert($id); 

       $http->redirectTo('/admin');
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }

}
?>
