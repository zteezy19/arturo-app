<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Educator;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Session;

class EducatorController extends Controller
{

    /**
     *
     * @return response()
     */

    public function index()
    {
        $educators = User::where('type', 'Educator')->get();

        return view('educators.index', compact('educators'));

    }


}
