<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListOrganisasi extends BaseController
{
    public function index()
    {
        return view('listOrganisasi');
    }
}
