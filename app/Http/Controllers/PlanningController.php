<?php

namespace App\Http\Controllers;
use App\Models\Soutenance;
use App\Models\User;
use App\Models\Role;
use App\Models\Project;
use App\Models\Planning;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Brian2694\Toastr\Facades\Toastr;


class PlanningController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        // $soutenance = Soutenance::find($id);

        // if ($soutenance && $user->hasRole('teacher') && $soutenance->project->teacher === $user->id) {
        //     $plannings = $soutenance->plannings;

        //     return view('plannings.index', compact('plannings'));
        // } elseif ($soutenance && $user->hasRole('student') && $soutenance->project->student === $user->id) {
        //     $plannings = $soutenance->plannings;

        //     return view('plannings.index', compact('plannings'));
        // } else {
            $plannings = Planning::with(['soutenance', 'users'])->get();

            return view('planning.index', compact('plannings'));

    }

    public function planifierSoutenances()
{
    $soutenances = Soutenance::all();
    $users = User::whereHas('role', function($q){
        $q->whereIn('title', ['teacher']);
    })->get();

    $salles = ['Salle A', 'Salle B', 'Salle C', 'Salle D'];
    $dates = [
        Carbon::today()->addDays(1)->setTime(9, 0),
        Carbon::today()->addDays(1)->setTime(14, 0),
        Carbon::today()->addDays(2)->setTime(10, 0),
        Carbon::today()->addDays(2)->setTime(15, 0),
        Carbon::today()->addDays(3)->setTime(11, 0),
        Carbon::today()->addDays(3)->setTime(16, 0),
    ];

    foreach ($soutenances as $soutenance) {
        if (Planning::where('soutenance_id', $soutenance->id)->exists()) {
            continue;
        }
        $users= $users->random(2);

        $salle = $salles[array_rand($salles)];
        $date = $dates[array_rand($dates)];

        $salleDisponible = $this->salleDisponible($salle, $date);

        if ($salleDisponible) {
            $planification = new Planning();
            $planification->salle = $salle;
            $planification->date = $date;
            $planification->soutenance_id = $soutenance->id;
            $planification->save();
            try {
                $planification->users()->attach($users);
            } catch (\Illuminate\Database\QueryException $e) {
                $planification->delete();
                continue;
            }
            //$this->marquerSalleOccupee($salle, $date);
        }
    }
    return redirect()->route('plannings.index')->with('message','Les plannings a été générée avec succès');
}


public function salleDisponible($salle, $date) {
    $plannings = Planning::where('salle', $salle)
                         ->where('date', $date)
                         ->get();

    return $plannings->isEmpty();
}
// public function marquerSalleOccupee($salle, $date)
// {
//     $dureeSoutenance = 2; // durée en heures
//     $dateDebut = Carbon::parse($date);
//     $dateFin = $dateDebut->copy()->addHours($dureeSoutenance);

//     $plannings = Planning::where('salle', $salle)->get();
//     foreach ($plannings as $planning) {
//         $planningDebut = Carbon::parse($planning->date);
//         $planningFin = $planningDebut->copy()->addHours($dureeSoutenance);
//         if ($dateDebut->between($planningDebut, $planningFin) || $dateFin->between($planningDebut, $planningFin)) {
//             $planning->salle_occupee = true;
//             $planning->save();
//         }
//     }
// }
public function publish()
{
    $plannings = Planning::where('published', false)->get();
    foreach ($plannings as $planning) {
        $planning->published = true;
        $planning->save();
    }
    return view('planning.published', ['plannings' => $plannings])->with('message','Liste Planning pubiée avec succée');
}

    public function destroy($id)
    {
        $planning = Planning::findOrFail($id);
        $planning->users()->detach();
        $planning->delete();
        return redirect()->route('plannings.index')->with('error','Planning supprimer avec succée');
    }
    public function genererMention(Request $request, $id)
{
    $planning = Planning::find($id);

    // if ($planning->date > now()) {
    //     return redirect()->back()->with('error', 'La date de soutenance n\'est pas encore passée.');
    // }

    $note = $request->input('note');
    $mention = null;

    if ($note >= 16) {
        $mention = 'Très bien';
    } elseif ($note >= 14) {
        $mention = 'Bien';
    } elseif ($note >= 12) {
        $mention = 'Assez bien';
    } elseif ($note >= 10) {
        $mention = 'Passable';
    } else {
        $mention = 'Insuffisant';
    }

    $planning->note = $note;
    $planning->mention = $mention;
    $planning->save();

    return redirect()->back()->with('messgae', 'La mention a été générée avec succès.');
}
public function generatePV($id) {
    $planning = Planning::find($id);
    $data = [
        'planning' => $planning
    ];
    $dompdf = new Dompdf();
    $html = view('pv_soutenance', $data)->render();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    return $dompdf->stream('pv_soutenance.pdf');
}


}
