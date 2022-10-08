<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\QuoteMail;
use App\Models\AboutPage;
use App\Models\AboutSlider;
use App\Models\Client;
use App\Models\Collection;
use App\Models\CompanySocial;
use App\Models\Page;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $active = 'Home';
        $page = false;
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["team"] = Team::all();
        $data["page"] = $page;
        $data["info"] = $info;
        $data["slides"] = AboutSlider::all();
        $data["socials"] = CompanySocial::with("Social")->get()->take(6);
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get()->take(20);
        $data["testimonials"] = Testimonial::all();
        $data["aboutPage"] = AboutPage::all()->first();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["clients"] = Client::all();
        return view("app.index", $data);
    }


    public function about()
    {
        $active = 'About';
        $page = false;
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["page"] = $page;
        $data["info"] = $info;
        $data["slides"] = AboutSlider::all();
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get();
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();
        return view("app.about", $data);
    }


    public function services()
    {
        $active = 'Services';
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["info"] = $info;
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get()->take(20);
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();

        $data["active"] = $active;
        // $data["page"] = $page;
        return view("app.services", $data);
    }

    public function collections()
    {
        $active = 'Portfolio';
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["info"] = $info;
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get()->take(20);
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();

        $data["active"] = $active;
        return view("app.collections", $data);
    }

    public function team()
    {
        $active = 'Team';
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["info"] = $info;
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get()->take(20);
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();

        $data["active"] = $active;
        return view("app.team", $data);
    }

    public function collectionsCat($title)
    {
        $active = 'Collections';
        $g = new GeneralController();
        $info = $g->getcompany();
        $service = Service::where("title", $title)->first();
        $data = [];
        $data["service"] = $service;
        $data["active"] = $active;
        $data["info"] = $info;
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->where("service_id", $service->id)->get();
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();

        $data["active"] = $active;
        return view("app.collectionsCat", $data);
    }

    public function contact()
    {
        $active = 'Contact';
        $g = new GeneralController();
        $info = $g->getcompany();
        $data = [];
        $data["active"] = $active;
        $data["info"] = $info;
        $data["socials"] = CompanySocial::with("Social")->get();
        $data["services"] = Service::all();
        $data["collections"] = Collection::with("Service")->get()->take(20);
        $data["testimonials"] = Testimonial::all();
        $data["team"] = Team::all();
        $data["page"] = Page::where("page_name", $active)->first();
        $data["aboutPage"] = AboutPage::all()->first();

        $data["active"] = $active;
        return view("app.contact", $data);
    }

    public function thankyou()
    {
        $g = new GeneralController();

        $info = $g->getcompany();
        $data["info"] = $info;
        return view("app.thankyou", $data);
    }
    public function submitQuote(Request $request)
    {

        $email = $request->quoteemail;
        $message = $request->quotemessage;
        $name = $request->quotename;
        $data = [
            "email" => $email,
            "message" => $message,
            "name" => $name,
        ];


        Mail::send(new QuoteMail($data));

        return redirect("/thank-you");
        //quotename, quoteemail, quotemessage
    }
    public function contactMessage(Request $request)
    {
        $email = $request->contactemail;
        $message = $request->contactmessage;
        $name = $request->contactname;
        $phone = $request->contactphone;
        $data = [
            "email" => $email,
            "message" => $message,
            "name" => $name,
            "phone" => $phone,
        ];


        Mail::send(new ContactMail($data));

        return redirect("/thank-you");
        //quotename, quoteemail, quotemessage
    }
}
