<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true || $_SESSION['user']['role'] !== "admin" ) {
            $http->redirectTo('/');
          }

        $id = $_GET['id'];
        $url = 'application/www/images/groupe/';

        $userModel = new UserModel();
        $user = $userModel->getOneUser($id);

        // if (file_exists ( $url.$musiciens['Photo'])) {
        //      //unlink($url.$beer['Photo']);
        // }

        $userModel->deleteGroupe($id);

        $http->redirectTo('/admin');

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
