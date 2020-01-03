<?php

class AddEventController
{
  public function httpGetMethod(Http $http, array $queryFields)
 {
  
 }


    public function httpPostMethod(Http $http, array $formFields)
    {
      if(empty($_SESSION) == true || $_SESSION['user']['role'] !== "admin" ) {
            $http->redirectTo('/');
        }

        //var_dump($_POST); Quand je recupère infos par POST je regarde en 1er deja si je récupère bien les infos. ensuite je vérifie si mes noms de champs corresponde à mes name dans mon form POST.
        //si je récupère des infos par POST, pas besoin de les mettre dans une variable. Voir si c'est nécessaire d'enregistrer l'info dans une variable ou pas.

         $concertModel = new ConcertsModel();
         $concertModel->addConcert($_POST);

         //Pas besoin de faire de Return ici car je vais aller récupérer les infos depuis la base de données.
        // return [
        //       'events'=>$events
        // ];

        $http->redirectTo('/admin');
    }
}
