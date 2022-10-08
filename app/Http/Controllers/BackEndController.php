<?php

namespace App\Http\Controllers;

use App\Models\CompanySocial;
use App\Models\General;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        return view("admin.index");
    }

    public function settings()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $socialMedials = CompanySocial::all();
        $data = ["info" => $info, "social_medials" => $socialMedials];
        return view("admin.settings", $data);
    }

    public function editSettings()
    {
        $g = new GeneralController();
        $info = $g->getcompany();
        $socialMedials = CompanySocial::all();
        $data = ["info" => $info, "social_medials" => $socialMedials];
        return view("admin.editSettings", $data);
    }

    public function posteditsettings(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'address2' => '',
            'telephone' => 'required',
            'email' => 'required',
            'email2' => '',
            'short_description' => 'required',
        ]);

        $info = General::all()->first();
        $info->company_address = $request->address;
        $info->company_address2 = $request->address2;
        $info->company_email2 = $request->email2;
        $info->company_phone = $request->telephone;
        $info->company_email = $request->email;
        $info->short_description = $request->short_description;

        $info->save();
        return redirect("/admin/settings");
    }


    public function updateLogo(Request $request)
    {
        $this->validate($request, [
            "logo" => 'required',
        ]);
        $path = $request->file("logo")->store("company", "public");
        $company = General::all()->first();
        $company->company_logo = $path;
        $company->save();
        return redirect("/admin/settings");
    }
}
