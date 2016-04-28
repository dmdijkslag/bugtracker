<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class ProjectsController extends Controller
{
    public function index() {

    	$projects = Projects::latest('updated_at')->GetActiveProjecs()->get();
    	return view('projects.index', compact('projects'));
    }

    public function show(Projects $project) {
    	return view('projects.show', compact('project'));
    }

    public function create() {
    	return view('projects.create');
    }

    public function store(ProjectRequest $request) {
        
        Projects::create($request->all());

        return redirect('projects');
    }

    public function edit(Projects $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Projects $project, ProjectRequest $request) {
        $project->update($request->all());
        return redirect('projects');
    }

}
