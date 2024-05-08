<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bitacory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BitacoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        return view('bitacores.index');
    }


}
