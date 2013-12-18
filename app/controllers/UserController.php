<?php

class UserController extends BaseController {

    public function showActivatedJSON()
    {
        $actived = Member::where('active', 'TRUE')->count();
        $unactived = Member::where('active', 'FALSE')->count();
        $a = array(
           'meta' => 'stato utenti',
           'Attivi' => $actived,
           'Non attivi' => $unactived
        );
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
        $results = array();
        $i = 0;
        foreach ($out as $k => $v) {
            $result[$i] => array(
                'date' => $k,
                'users' => $v
            );
            $i++;
        }
        return Response::json($results);
    }

    public function showLastLoginJSON()
    {
        $members = Member::where('active', 'TRUE')->get();
        $day = array();
        foreach ($members as $k => $m) 
            $day[$k] = date("Y-m-d", strtotime($m->last_login));
        $out = array_count_values($day);
        ksort($out);
        $results = array();
        $i = 0;
        foreach ($out as $k => $v) {
            $result[$i] => array(
                'date' => $k,
                'users' => $v
            );
            $i++;
        }
        return Response::json($results);
    }

}