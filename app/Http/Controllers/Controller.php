<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        /* first element of the array is the filepath with regards to the project. Backslash is included*/
        $nav = [
            'record' => 'Record',
            'about' => 'About',
            'contact' => 'Contact',
        ];
        View::share(['nav' => $nav]);
    }
}
