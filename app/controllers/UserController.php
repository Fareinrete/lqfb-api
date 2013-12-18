<?php

class UserController extends BaseController {

    public function showActivatedJSON()
    {
        $actived = Member::where('active', 'TRUE')->count();
        $unactived = Member::where('active', 'FALSE')->count();
        $a = array(array('Stato','Utenti'),
             array('Attivi', $actived),
             array('Non attivi', $unactived));
        return Response::json($a);
    }

    public function showActivationsJSON()
    {
        $members = Member::where('active', 'TRUE')->get();
        $day = array();
        foreach ($members as $k => $m) 
            $day[$k] = date("Y-m-d", strtotime($m->activated));
        $out = array_count_values($day);
        ksort($out);
        return Response::json($out);
    }
}