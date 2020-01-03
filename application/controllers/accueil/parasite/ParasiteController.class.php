<?php

class ParasiteController
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

    }
}
