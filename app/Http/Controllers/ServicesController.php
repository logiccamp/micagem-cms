<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $services = Service::all();
        $services = $services->reverse();
        $data = [
            "info" => $info,
            "services" => $services,
        ];
        return view('admin.services', $data);
    }

    public function getServicesapi()
    {
        $services = Service::all();
        $services = array_reverse($services->toArray());
        return response()->json($services, 200);
    }

    public function getServiceapi($id)
    {
        $service = Service::where("id", $id)->first();
        return response()->json($service, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file("image")->store("services", "public");
        Service::create([
            "title" => $request->title,
            "description" => $request->description ? $request->description : '',
            "image" => $path,
        ]);
        return response()->Json(true, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where("id", $id)->first();
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [
            "info" => $info,
            "service" => $service,
        ];
        return view('admin.editService', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::where("id", $id)->first();
        $request->title == '' ? '' : $service->title = $request->title;

        $service->description = $request->description;
        $service->save();
        return redirect("/admin/services");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::with('Collections')->where("id", $id)->first();
        $collections = $service->Collections;
        foreach ($collections as $collection) {
            $collection->delete();
        }
        $service->delete();
        return redirect("/admin/services");
    }
}
