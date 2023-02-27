<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $plannings = Planning::all();
        $excellentCount = 0;
        $tresbienCount = 0;
        $bienCount = 0;
        $passableCount = 0;
        $insuffisantCount = 0;
        foreach ($plannings as $planning) {
            switch ($planning->mention) {
                case 'Excellent':
                    $excellentCount++;
                    break;
                case 'Très bien':
                    $tresbienCount++;
                    break;
                case 'Bien':
                    $bienCount++;
                    break;
                case 'Passable':
                    $passableCount++;
                    break;
                case 'Insuffisant':
                    $insuffisantCount++;
                    break;
            }
        }
        $data = [
            'labels' => ['Excellent', 'Très bien', 'Bien', 'Passable', 'Insuffisant'],
            'datasets' => [
                [
                    'data' => [$excellentCount, $tresbienCount, $bienCount, $passableCount, $insuffisantCount],
                    'backgroundColor' => ['#36A2EB', '#4BC0C0', '#FFCE56', '#E7E9ED', '#FF6384'],
                ]
            ]
        ];
        $publishedPlannings = Planning::where('published', true)->get();

        // Affichage de la vue avec les données
        return view('dachboard.index', [
            'data' => json_encode($data),
            'publishedPlannings' => $publishedPlannings
        ]);
    }


}
