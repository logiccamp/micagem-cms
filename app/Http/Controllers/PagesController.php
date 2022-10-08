<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\AboutSlider;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home()
    {
        $page = Page::where("page_name", "Home")->first();
        return view('admin.home', $page);
    }

    public function About()
    {
        $page = Page::where("page_name", "About")->first();
        $about = AboutPage::all()->first();
        $slides = AboutSlider::all();
        return view('admin.about', ["page" => $page, "about" => $about, "slides" => $slides]);
    }

    public function addabout(Request $request)
    {
        $path = $request->file("slide")->store("aboutslider", "public");
        AboutSlider::create([
            "image" => $path,
        ]);
        return redirect("/admin/pages/about");
    }


    public function deleteSlide($slide)
    {
        $aboutSlide = AboutSlider::where('id', $slide)->first();
        $aboutSlide->delete();
        return redirect("/admin/pages/about");
    }

    public function ChangeBannerHome(Request $request)
    {
        $page_name = $request->page;
        $path = $request->file('banner')->store("bg", "public");

        $page = Page::where('page_name', $page_name)->first();
        $page->banner = $path;
        $page->save();


        return response()->json(true, 200);
    }

    public function updateHomeBanner(Request $request)
    {
        $headerText = $request->header_text;

        $page_name = $request->page_name;

        $headerSubText = $request->header_sub_text;

        $page = Page::where('page_name', $page_name)->first();

        $page->header_text = $headerText;
        $page->sub_text = $headerSubText;
        $page->save();
        return redirect("/admin/pages/home");
    }


    public function updateAboutContent(Request $request)
    {
        $headerContent = $request->about_heading;
        $content = $request->content;
        $aboutPage = AboutPage::all()->first();
        $aboutPage->about_heading = $headerContent;
        $aboutPage->about_us = $content;
        $aboutPage->save();
        return response()->json(true, 200);
    }


    public function missionContent(Request $request)
    {
        $mission = $request->mission;
        $aboutPage = AboutPage::all()->first();
        $aboutPage->mission = $mission;
        $aboutPage->save();
        return redirect("/admin/pages/about");
    }
    public function updateMissionBanner(Request $request)
    {
        $path = $request->file("missionBanner")->store("about", "public");
        $aboutPage = AboutPage::all()->first();
        $aboutPage->mission_banner = $path;
        $aboutPage->save();
        return redirect("/admin/pages/about");
    }

    public function visionContent(Request $request)
    {
        $vision = $request->vision;
        $aboutPage = AboutPage::all()->first();
        $aboutPage->vision = $vision;
        $aboutPage->save();
        return redirect("/admin/pages/about");
    }
    public function updateVisionBanner(Request $request)
    {
        $path = $request->file("visionBanner")->store("about", "public");
        $aboutPage = AboutPage::all()->first();
        $aboutPage->vision_banner = $path;
        $aboutPage->save();
        return redirect("/admin/pages/about");
    }
}
