<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
 {
    if(empty($_SESSION) == true || array_key_exists('user', $_SESSION)== false || $_SESSION['user']['role'] !== "admin" ) {
             $http->redirectTo('/');
         }

     $id = $_GET['id'];

     //var_dump($id);
     $groupeModel = new GroupeModel();
     $oneGroupe = $groupeModel->getOneGroupe($id);

     //var_dump($oneGroupe);
     return [
       'oneGroupe'=>$oneGroupe
     ];
 }


    public function httpPostMethod(Http $http, array $formFields)
    {

      $url = 'application/www/images/groupe/';
      $fileName = $_FILES['photo']['name'];
      $id = $_POST['nomId'];

      $groupeModel = new GroupeModel();
      $oneGroupe = $groupeModel->getOneGroupe($id);

      // var_dump($oneGroupe);
      // var_dump($_POST);
      // var_dump($_FILES);

      if ($_FILES['photo']['size'] > 0 ) {
            $http->moveUploadedFile('photo', '/images/groupe');
            //unlink($url.$musiciens['Photo']);
        } else {
            $fileName = $oneGroupe['photo'];
        };

      $groupeModel->updateGroupe($id, $_POST, $fileName);
      // $http->redirectTo('/admin');

      return [
        'oneGroupe'=>$oneGroupe
      ];
    }
}
