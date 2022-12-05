<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LPJModel;

class LPJ extends BaseController
{
    function download($id){
        $lpj = new LPJModel();
        $data = $lpj->find($id);
        return $this->response->download('lpj/'.$data['url_file'], null);
    }
}
