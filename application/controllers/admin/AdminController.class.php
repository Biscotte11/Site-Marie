<?php

class AdminController
{
  public function httpGetMethod(Http $http, array $queryFields)
 {
   if(empty($_SESSION) == true || $_SESSION['user']['role'] !== "admin" ) {
         $http->redirectTo('/');
     }
     $userModel = new GroupeModel();
     $groupes = $userModel->nomGroupe();

     $userModel = new UserModel();
     $musiciens = $userModel->listAllUsers();

     $concertModel= new ConcertsModel();
     $allshows = $concertModel->allConcerts();

     return [
           'groupes' => $groupes,
           'musiciens'=> $musiciens,
           'allshows'=> $allshows
       ]; 
 }


    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}
