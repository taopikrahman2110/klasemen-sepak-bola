<?php

namespace App\Http\Controllers;

use App\Models\Mat;
use App\Models\Team;
use App\Models\Standing;
use Illuminate\Http\Request;

class MatController extends Controller
{

    public function index()
    {

        $matches = Mat::all();
        if ($matches->isEmpty()) {
            return redirect()->route('match.create')->with('warning', 'Belum ada data pertandaingan. Silakan tambahkan data terlebih dahulu.');
        }
        return view('match.index', compact('matches'));
    }


    public function create()
    {
        $teams = Team::orderBy('name')->get();
        return view('match.create', compact('teams'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'home_team_id' => 'required|different:away_team_id',
            'away_team_id' => 'required|different:home_team_id',
            'home_goals' => 'required|integer|min:0',
            'away_goals' => 'required|integer|min:0',
            'match_date' => 'required|date_format:Y-m-d',
        ]);

        $match = new Mat;
        $match->home_team_id = $request->home_team_id;
        $match->away_team_id = $request->away_team_id;
        $match->home_goals = $request->home_goals;
        $match->away_goals = $request->away_goals;
        $match->match_date = $request->match_date;
        $match->save();

        // Update team standings
        $this->updateStandings($match);

        return redirect()->route('match.index')->with('success', 'Match created successfully!');
    }


    public function show(Mat $mat)
    {
        //
    }


    public function edit(Mat $mat)
    {
        //
    }


    public function update(Request $request, Mat $mat)
    {
        //
    }


    public function destroy(Mat $mat)
    {
        //
    }


    private function updateStandings(Mat $match)
    {
        // Update home team standings
        $home_team_standing = Standing::firstOrCreate([
            'team_id' => $match->home_team_id,
        ]);
        $home_team_standing->played++;
        $home_team_standing->goal_for += $match->home_goals;
        $home_team_standing->goal_against += $match->away_goals;
        $home_team_standing->goal_difference = $home_team_standing->goal_for - $home_team_standing->goal_against;

        if ($match->home_goals > $match->away_goals) {
            // Home team win
            $home_team_standing->win++;
            $home_team_standing->points += 3;
        } elseif ($match->home_goals == $match->away_goals) {
            // Match draw
            $home_team_standing->draw++;
            $home_team_standing->points += 1;
        } else {
            // Home team lose
            $home_team_standing->lose++;
        }

        $home_team_standing->save();

        // Update away team standings
        $away_team_standing = Standing::firstOrCreate([
            'team_id' => $match->away_team_id,
        ]);
        $away_team_standing->played++;
        $away_team_standing->goal_for += $match->away_goals;
        $away_team_standing->goal_against += $match->home_goals;
        $away_team_standing->goal_difference = $away_team_standing->goal_for - $away_team_standing->goal_against;

        if ($match->away_goals > $match->home_goals) {
            // Away team win
            $away_team_standing->win++;
            $away_team_standing->points += 3;
        } elseif ($match->away_goals == $match->home_goals) {
            // Match draw
            $away_team_standing->draw++;
            $away_team_standing->points += 1;
        } else {
            // Away team lose
            $away_team_standing->lose++;
        }

        $away_team_standing->save();
    }




}
