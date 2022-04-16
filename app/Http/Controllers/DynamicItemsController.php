<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DynamicItems;

class DynamicItemsController extends Controller
{
    public function index()
    {
        $data = DynamicItems::all();

        return view('dynamic_items.index', compact('data'));
    }
}
