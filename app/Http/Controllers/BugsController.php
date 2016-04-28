<?php

namespace App\Http\Controllers;

use DB;
use App\Bugs;
use App\Comments;
use App\User;
use App\Http\Requests;
use App\Http\Requests\BugRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;

class BugsController extends Controller
{
    public function __construct() {
        //$this->middleware('auth', ['except'=> ['index','show']]);
    }
    public function index() {
//if (Auth::check()) {
//dd(Auth::user()->isDeveloper());
//}
    	//$bugs = Bugs::latest('updated_at')->published()->paginate(env('MAX_RESULTS_PER_PAGE'));
        //$bugs = Bugs::with('project')->published()->paginate(env('MAX_RESULTS_PER_PAGE'));
        $bugs = DB::table('bugs')
            ->join('projects', 'bugs.project_id', '=', 'projects.project_id')
            ->join('bug_status', 'bugs.status_id', '=', 'bug_status.status_id')
            ->select('bugs.*', 'projects.title', 'bug_status.status_title')
            ->paginate(env('MAX_RESULTS_PER_PAGE'));
    	return view('bugs.index', compact('bugs'));
    }

    public function show(Bugs $bug) {
        $comments = Comments::latest('created_at')->where('bug_id', $bug->bug_id)->get();
        $users = $bug->project->users;
        //dd($bug);
   	    return view('bugs.show', compact('bug', 'comments', 'users'));
    }

    public function create() {
        $projects = \App\Projects::lists('title','project_id');
        $users = User::getDevelopers()->lists('name','user_id');
        $bugStatus = DB::table('bug_status')->lists('status_title', 'status_id');
        $priorities = DB::table('priorities')->lists('priority_title', 'priority_id');

    	return view('bugs.create', compact('projects', 'users', 'bugStatus', 'priorities'));
    }

    public function store(BugRequest $request) {
        
        //Bugs::create($request->all());
        $bug = new Bugs($request->all());
        Auth::user()->bugs()->save($bug);
        //session()->flash('flash_message', 'Report is opgeslagen');
        flash()->success('Gegevens zijn opgeslagen');
        return redirect('bugs');
    }

    public function edit(Bugs $bug) {
        return view('bugs.edit', compact('bug'));
    }

    public function update(Bugs $bug, BugRequest $request) {
        $bug->update($request->all());
        return redirect('bugs');
    }

   public function storecomment(Bugs $bug, CommentRequest $request) {
    
        $comment = new Comments($request->all());
        $comment->user_id = Auth::user()->user_id;
        $comment->bug_id = $bug->bug_id;
        $comment->save();
        //$bug->comments-save($comment); // heeft referentie naar bugs_id ipv bug_id ??
        if (isset($request->recipients)) {
            $this->sendEmailUpdate($bug, $request->recipients);
        }
        if (isset($request->file_attachment) && $request->hasFile('file_attachment')) {

            $this->uploadAttachment($bug->bug_id.'_'.$comment->comment_id, $request->file_attachment);
        }
        flash()->success('Gegevens zijn opgeslagen');
        return redirect('bugs');
    }


    public function sendEmailUpdate(Bugs $bug, $recipients) {
        if ($users = User::select('name', 'email')->whereIn('user_id',$recipients)->get()) {
            foreach($users as $user) {
                Mail::send('emails.commentupdate', ['user' => $user, 'bug' => $bug], function ($m) use ($user) {
                    $m->to($user->email, $user->name);
                    $m->subject('Bug update!');
                });

            }
        }
        return true;
    }

    public function uploadAttachment($fileIdentifier, $fileAttachment) {
        //dd($fileAttachment);

        $fileName = $fileIdentifier.'.'.$fileAttachment->getClientOriginalExtension();
        $fileAttachment->move(base_path() . '/public/uploads/', $fileName);
        return $fileName;
    }
 
}
