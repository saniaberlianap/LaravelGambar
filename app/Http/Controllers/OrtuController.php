<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ortu;

class OrtuController extends Controller
{
    public function profile($id)
    {
    	$ortu = Ortu::find($id);
    	return view('ortu.profile', ['ortu' => $ortu ]);
    }
}
