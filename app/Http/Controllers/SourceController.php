<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source;


class SourceController extends Controller
{
    public function index() {
        $sources = Source::all(); // Fetch all sources
        return view('source.index', compact('sources'));
    }


}
