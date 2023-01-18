<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        //
    }
    public function store(StoreTechnologyRequest $request)
    {
        $val = $request->validated();
        $slug = Technology::generateSlug($request->name);
        $val['slug'] = $slug;

        Technology::create($val);

        // redirect
        return redirect()->back()->with('message', "Technology $slug added successfully");
    }

    // public function show(Technology $technology)
    // {
        
    // }

    // public function edit(Technology $technology)
    // {
        
    // }

    
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $val_data = $request->validated();
        $slug = Technology::generateSlug($request->name);
        $val_data['slug'] = $slug;
        $technology->update($val_data);
        return redirect()->back()->with('message', "Technology $slug updated successfully");
    }

    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->back()->with('message', "Technology $technology->name removed successfully");
    }
}
