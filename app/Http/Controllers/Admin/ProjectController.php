<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;


use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::paginate(4);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.create', compact('types','technologies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(StoreProjectRequest  $request)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;

        if($request->hasFile('cover_image')){
            $path = Storage::put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $new_project = Project::create($data);

        if($request->has('technologies')){
            $new_project->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.projects.show', $new_project->slug);
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $data['slug'] = $slug;

        if($request->hasFile('cover_image')){
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }

            $path = Storage::put('project_images', $request->cover_image);
            $data['cover_image'] = $path;
        }

        $project->update($data);

        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        }
        else {
            $project->technologies()->sync([]);
        }
        
        return redirect()->route('admin.projects.index')->with('message', "$project->title updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * 
     * 
     */
    public function destroy(Project $project)
    {
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', "$project->title deleted successfully");
    }
}
