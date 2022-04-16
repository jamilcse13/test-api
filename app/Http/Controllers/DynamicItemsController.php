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

    public function update(Request $request, DynamicItems $dynamicItems)
    {
        $data = [
                'item' => $request->item,
                'sub_item' => $request->sub_item
            ];

        $dynamicItems->update($data);

        $status = 'Item and Sub Item added Successfully.';
        return redirect("dynamic-items")->with(['status' => $status]);
    }
}
