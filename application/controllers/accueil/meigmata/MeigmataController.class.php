<?php

class MeigmataController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      //var_dump($_GET);
      $id= $_GET['id'];
      $concertModel = new ConcertsModel();
      $events = $concertModel->groupeConcert($id);

      //var_dump($events);

      return [
            'events' => $events
        ];
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
