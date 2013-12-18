<?php

class AdminController extends BaseController {

    public function showActivatedJSON()
    {
        $actived = Member::where('active', 'TRUE')->where('admin', 'TRUE')->count();
        $unactived = Member::where('active', 'FALSE')->where('admin', 'TRUE')->count();
        $a = array(
           'meta' => 'stato utenti',
           'Attivi' => $actived,
           'Non attivi' => $unactived
        );
        return Response::json($a);
    }

}