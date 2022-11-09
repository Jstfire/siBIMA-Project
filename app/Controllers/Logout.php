<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        $session = session();
        session_unset();
        session_destroy();
        return redirect()->to('/');
    }
}
