<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\For_;
use PhpParser\Node\Stmt\Foreach_;

class Personas extends Controller
{
    //

    public function getDesa() {
    
        return view( 'welcome');
    }


 
}
