<?php

namespace App\Http\Controllers;

use App\Models\CompanySocial;
use App\Models\SocialMedials;
use Illuminate\Http\Request;

class SocialController extends Controller
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
        $allSocials = SocialMedials::with('Handle')->get();
        $socialMedials = CompanySocial::all();
        $data = ["info" => $info, "social_medials" => $socialMedials, "allSocials" => $allSocials];
        return view("admin.socials", $data);
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

    public function addNew(Request $request)
    {
        $social = SocialMedials::where("title", $request->social)->first();
        if ($social) {
            return redirect("/admin/socials")->with("message", "Handle already exist");
        }
        SocialMedials::create([
            'title' => $request->social,
        ]);
        return redirect("/admin/socials");
    }

    public function deleteSocial(Request $request)
    {
        $companySocial = CompanySocial::where("social_id", $request->social)->first();
        if ($companySocial) {
            $companySocial->delete();
        }
        $social = SocialMedials::where("id", $request->social)->first();
        $social->delete();
        return redirect("/admin/socials");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allSocials = SocialMedials::all();

        // get company's socials
        foreach ($allSocials as $handle) {
            //get request 
            $id = $handle->id;
            $thisvalue = $request->$id;

            //cehck if exist 
            $isSocial = CompanySocial::where('social_id', $id)->first();
            if ($isSocial) {
                $isSocial->handle = $thisvalue;
                $isSocial->save();
            } else {
                CompanySocial::create([
                    "social_id" => $id,
                    "handle" => $thisvalue,
                ]);
            }
        }

        return redirect("/admin/socials");
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
        //
    }
}
