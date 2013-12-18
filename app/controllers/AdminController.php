<?php

class AdminController extends BaseController {

    public function showActivatedJSON()
    {
        $actived = Member::where('active', 'TRUE')->where('admin', 'TRUE')->count());
        $unactived = Member::where('active', 'FALSE')->where('admin', 'TRUE')->count());
        $a = array(array('Stato','Utenti'),
             array('Attivi', $actived,
             array('Non attivi', $unactived);
        return Response::json($a);
    }

}