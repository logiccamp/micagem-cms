<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $team = Team::all();
        $data = [
            "info" => $info,
            "team" => $team,
        ];
        return view("admin.team", $data);
    }
    public function create()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [
            "info" => $info,
        ];
        return view("admin.addTeam", $data);
    }

    public function edit($id)
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $team = Team::find($id);
        $data = [
            "info" => $info,
            "team" => $team,
        ];
        return view("admin.addTeam", $data);
    }

    public function update(Request $request, $id)
    {
        $team = Team::where("id", $id)->firstOrFail();

        if ($request->file('image')) {
            $path = $request->file("image")->store("team", "public");
            $team->update([
                "name" => $request->name,
                "post" => $request->post ? $request->post : '',
                "image" => $path,
                'description' => $request->description
            ]);
        } else {
            $team->update([
                "name" => $request->name,
                "post" => $request->post ? $request->post : '',
                'description' => $request->description
            ]);
        }
        return redirect("/admin/team");
    }
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $path = $request->file("image")->store("team", "public");
            Team::create([
                "name" => $request->name,
                "post" => $request->post ? $request->post : '',
                "image" => $path,
                'description' => $request->description
            ]);
        } else {
            Team::create([
                "name" => $request->name,
                "post" => $request->post ? $request->post : '',
                'description' => $request->description
            ]);
        }

        return redirect("/admin/team");
    }
    public function destroy($id)
    {
        $team = Team::where("id", $id)->first();
        $team->delete();
        return redirect("/admin/team");
    }
}
