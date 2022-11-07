<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListAkun extends BaseController
{
    public function index()
    {
        return view('listAkun');
    }
}
