<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class PropertyTypeController extends Controller
{
    public function alltype(): View
    {

        $types = PropertyType::latest()->get();

        return view('backend.type.all_type', compact('types'));
    }



    public function addtype(): View
    {
        return view('backend.type.add_type');
    }



    public function storeType(Request $request): RedirectResponse
    {

        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type create successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    public function editType($id): View
    {


        $types = PropertyType::findOrFail($id);

        return view('backend.type.edit_type', compact('types'));
    }

    public function updateType(Request $request): RedirectResponse
    {

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }
}
