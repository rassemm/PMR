<?php

namespace App\Http\Controllers;

use App\Models\Soutenance;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SoutenanceController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if($user->hasRole('teacher')) {
            $soutenances = Soutenance::whereHas('project', function ($query) use ($user) {
                $query->where('teacher', $user->id);
            })->get();
        } else if($user->hasRole('student')) {
            $soutenances = Soutenance::whereHas('project', function ($query) use ($user) {
                $query->where('student', $user->id);
            })->get();
        }
        else if($user->hasRole('Administrator')) {
            $soutenances = Soutenance::with('project')->get();
        }
        return view('soutenance.index',compact('soutenances'));
    }

    public function approve($id){
        $soutenance=Soutenance::find($id);
        DB::table('soutenances')
        ->where('id', $id)
        ->where('status',0)->update(['status' => 1]);
        return redirect()->back()->with('message','Soutenance Technique valider avec succée');
         }
    public function avis($id){
            $soutenance=Soutenance::find($id);
            DB::table('soutenances')
            ->where('id', $id)
            ->where('status_t','pending')->update(['status_t' => 'accepted']);
            return redirect()->back()->with('message','Soutenance Finale valider avec succée');
             }


}
