<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListProposal extends BaseController
{
    public function index()
    {
        return view('listProposal');
    }
}
