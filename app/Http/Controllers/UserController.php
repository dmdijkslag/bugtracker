<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class UserController extends Controller
{
    public function index() {

    	$users = User::latest('created_at')->get();
    	return view('users.index', compact('users'));
    }

    public function show(User $user) {
    	return view('users.show', compact('user'));
    }

    public function create() {
        $projects = \App\Projects::lists('title','project_id');
    	return view('users.create', compact('projects'));
    }

    public function store(UserRequest $request) {
        
        $user = User::create($request->all());
        $user->projects()->attach($request->input('project_id'));

        return redirect('users');
    }

    public function edit(User $user) {
        $projects = \App\Projects::lists('title','project_id');
        $selectedProjects = $user->getSelectedProjects()->toArray();
        return view('users.edit', compact('user', 'projects', 'selectedProjects'));
    }

    public function update(User $user, UserRequest $request) {
        $user->update($request->all());
        $user->projects()->sync($request->input('project_id'));
        return redirect('users');
    }

}
