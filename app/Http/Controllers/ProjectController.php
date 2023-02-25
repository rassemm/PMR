<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $projects = Project::where(function ($query) use ($user) {
            if ($user->hasRole('teacher')) {
                $query->where('teacher', $user->id);
            } elseif ($user->hasRole('student')) {
                    $query->where('student', $user->id);

            }
            else if($user->hasRole('Administrator')) {
                $projects = Project::all();
            }
        })->get();
        return view ('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        //$roles = Role::pluck('title','id');
       // $Users = User::pluck('name','id');
        $teachers = User::whereHas('role', function($q){
            $q->whereIn('title', ['teacher']);
          })->get();
          $students = User::whereHas('role', function($q){
            $q->whereIn('title', ['student']);
          })->get();
        return view ('project.create',compact('teachers','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Project $project)
    {
        $request->validate ([
            'titre'       =>'required',
            'description' =>'required',
            'ste'      =>'required',
            'class' => 'required',
            'teacher'   => 'required',
            'student'   => 'required'
        ]);
            $user = User::all();
            $project = new Project();
            $project->titre     = $request->input('titre');
            $project->description   = $request->input('description');
            $project->ste = $request->input('ste');
            $project->class = $request->input('class');
            $project->teacher = $request->input('teacher');
            $project->student = $request->input('student');
            $project->save();
            $project->user()->sync($request->user);
            $project->createSoutenance();
            return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $project = Project::with('user')->findOrFail($id);
    return view('project.show',compact('project'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::find($id);
        $teachers = User::whereHas('role', function($q){
            $q->whereIn('title', ['teacher']);
          })->get();
          $students = User::whereHas('role', function($q){
            $q->whereIn('title', ['student']);
          })->get();
        return view ('project.edit',compact('teachers','students','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate ([
            'titre'       =>'required',
            'description' =>'required',
            'ste'      =>'required',
            'class' => 'required',
            'teacher'   => 'required',
            'student'   => 'required'
        ]);
            $user = User::all();
            $project = Project::find($id);
            $project->titre     = $request->input('titre');
            $project->description   = $request->input('description');
            $project->ste = $request->input('ste');
            $project->class = $request->input('class');
            $project->teacher = $request->input('teacher');
            $project->student = $request->input('student');
            $project->save();
            $project->user()->sync($request->user);
           // $project->createSoutenance();
            return redirect()->route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $soutenance = Soutenance::where('project_id', $project->id)->first();
        if ($soutenance) {
            $soutenance->delete();
        }

        $project->delete();

        return redirect()->route('projects.index');

    }

    public function validateproject(Request $request,$id)

    {        $project=Project::find($id);
        if (Auth::user()->id !== $project->teacher) {
            abort(403, 'Unauthorized action.');
        }
        DB::table('projects')
        ->where('id', $id)
        ->where('status',false)->update(['status' => true]);
        return redirect()->back();
    }
}
