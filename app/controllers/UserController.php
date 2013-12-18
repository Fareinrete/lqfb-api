<?php

class HomeController extends BaseController {

    public function showActivatedJSON()
    {
        $a = array(array('Stato','Utenti'),
             array('Attivi', Member::where('active', 'TRUE')->count()),
             array('Non attivi', Member::where('active', 'FALSE')->count()));
        return Response::json($a);
    }

}