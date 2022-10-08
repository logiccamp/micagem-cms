<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Service;
use Illuminate\Http\Request;

class CollectionsController extends Controller
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
        $collections = Collection::all();
        $services = Service::all();
        $data = [
            "info" => $info,
            "collections" => $collections,
            "services" => $services,
        ];
        return view('admin.collections', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $services = Service::all();
        $data = [
            "info" => $info,
            "services" => $services,
        ];
        return view('admin.add_collection', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = $request->service;
        $filesid = explode(",", $request->filesid);
        foreach ($filesid as $fileid) {
            $path = $request->file($fileid)->store("collections", "public");
            Collection::create([
                "service_id" => $service,
                "title" => $request->title,
                "image" => $path,
            ]);
        }

        return response()->json(true, 200);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::where("id", $id)->first();
        $collection->delete();

        return redirect('/admin/collections');
    }
    public function getCollectionsApi()
    {
        $collections = Collection::with('Service')->get();
        $collections = array_reverse($collections->toArray());
        return response()->json($collections, 200);
    }
}
