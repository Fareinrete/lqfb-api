<?php

class AdminController extends BaseController {

    public function getActivated()
    {
        $actived = Member::where('active', 'TRUE')->where('admin', 'TRUE')->count();
        $unactived = Member::where('active', 'FALSE')->where('admin', 'TRUE')->count();
        $a = array(
           array('status' => 'active', 'user_count' => $actived),
           array('status' => 'inactive', 'user_count' => $unactived)
        );
        return Response::json(array('status_code' => 200, 'status_message' => 'OK', 
                 'description' => 'Admins attivati', 'data' => $a))
            ->setCallback(Input::get('callback'));
    }

}
