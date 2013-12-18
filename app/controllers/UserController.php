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
        $out = DB::raw('SELECT date_trunc("day", activated) AS "Day" , count(*) AS "No. of users" FROM member WHERE active IS TRUE GROUP BY 1 ORDER BY 1;');
        return Response::json($out);
    }
}