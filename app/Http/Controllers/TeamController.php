<?php

namespace App\Http\Controllers;

use App\Models\Team;
// use Illuminate\Http\Request;

class TeamController extends Controller
{
    function index() {
        return view("team.index")->with('teams', Team::all());
    }
    
    function show(Team $team) {
        return view("team.show", ['team'=>$team]);
    }
}
