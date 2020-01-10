<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class seriesController extends Controller
{
   public function index()
   {
       $series = [
            'Lost',
            'The 100',
            'Agents of shield'
       ];
       return view('series.index', compact('series'));
    }
    
    public function create()
    {
       return view('series.create');
    }
}
