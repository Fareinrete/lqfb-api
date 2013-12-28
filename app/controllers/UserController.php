<?php

class UserController extends BaseController {

    public function getActivated()
    {
        $actived = Member::where('active', 'TRUE')->count();
        $unactived = Member::where('active', 'FALSE')->count();
        $a = array(
           array('status' => 'active', 'user_count' => $actived),
           array('status' => 'inactive', 'user_count' => $unactived)
        );
        return Response::json(array('status_code' => 200, 'status_message' => 'OK', 
                 'data' => $a, 'description' => 'Stato attuale utenza'))
            ->setCallback(Input::get('callback'));
    }

    public function getActivations()
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
            $results[$i] = array(
                'date' => $k,
                'user_count' => $v
            );
            $i++;
        }
        return Response::json(array('status_code' => 200, 'status_message' => 'OK',
                 'data' => $results, 'description' => 'Attivazioni giornaliere'))
            ->setCallback(Input::get('callback'));

    }

    public function getLastlogin()
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
            $results[$i] = array(
                'date' => $k,
                'user_count' => $v
            );
            $i++;
        }
        return Response::json(array('status_code' => 200, 'status_message' => 'OK', 
                 'data' => $results, 'description' => 'Login giornalieri '))
            ->setCallback(Input::get('callback'));
    }

}
