<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Team;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $team = Client::all();
        $data = [
            "info" => $info,
            "clients" => $team,
        ];
        return view("admin.clients", $data);
    }
    public function create()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [
            "info" => $info,
        ];
        return view("admin.addClient", $data);
    }

    public function edit($id)
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $client = Client::find($id);
        $data = [
            "info" => $info,
            "client" => $client,
        ];
        return view("admin.addClient", $data);
    }

    public function update(Request $request, $id)
    {
        $team = Client::where("id", $id)->firstOrFail();
            $team->update([
                "name" => $request->name,
                "project" => $request->project,
            ]);
        return redirect("/admin/clients");
    }
    public function store(Request $request)
    {
            Client::create([
                "name" => $request->name,
                "project" => $request->project,
            ]);

        return redirect("/admin/clients");
    }
    public function destroy($id)
    {
        $team = Client::where("id", $id)->first();
        $team->delete();
        return redirect("/admin/clients");
    }
}
