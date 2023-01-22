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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     */
    public function store(StoreTechnologyRequest $request)
    {
        $val = $request->validated();
        $slug = Technology::generateSlug($request->name);
        $val['slug'] = $slug;

        Technology::create($val);

        return redirect()->back()->with('message', "Technology $slug added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    // public function show(Technology $technology)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    // public function edit(Technology $technology)
    // {
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $val_data = $request->validated();
        $slug = Technology::generateSlug($request->name);
        $val_data['slug'] = $slug;
        $technology->update($val_data);

        return redirect()->back()->with('message', "Technology $slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->back()->with('message', "Technology $technology->name removed successfully");
    }
}
