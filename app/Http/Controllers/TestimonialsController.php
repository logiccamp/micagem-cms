<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
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
        $testimonials = Testimonial::all();
        $data = [
            "info" => $info,
            "testimonials" => $testimonials,
        ];
        return view("admin.testimonials", $data);
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
        $data = [
            "info" => $info,
        ];
        return view("admin.addTestimonial", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "post" => $request->post,
            "company" => $request->company,
            "message" => $request->message,
        ];

        Testimonial::create($data);
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
        Testimonial::where("id", $id)->first()->delete();
        return redirect("/admin/testimonials");
    }
}
