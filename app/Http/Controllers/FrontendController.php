<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Test;

class FrontendController extends Controller
{
    public function services()
    {
        //35 is the id of category Dr Sophia
        return Category::where('parent_category', 35)->get();
    }
    public function currentService($slug)
    {
        return Category::where('slug', $slug)->where('status', 1)->first();
    }
    public function currentServiceTreatments($id){
        return Test::where('category',$id)->where('status', 1)->get();
    }
    public function servicesExcludeCurrent($id){
        return Category::where('parent_category', 35)->where('id', '<>', $id)->get();
    }
    public function currentTreatment($slug){
        return Test::where('slug', $slug)->where('status', 1)->first();
    }
    public function index()
    {
        $view = 'index';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function gallery()
    {
        $view = 'beauty-gallery';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function blogListing()
    {
        $view = 'blog-listing';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function blogDetail()
    {
        $view = 'blog-detail';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function gp()
    {
        $view = 'gp-consultation';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function terms()
    {
        $view = 'terms';
        $services = $this->services();

        return view($view, compact('services'));
    }
    public function treatments($slug)
    {
        $thisService = $this->currentService($slug);
        $treatments = $this->currentServiceTreatments($thisService->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisService->id);
        $view = 'services';

        return view($view, compact('services','thisService','treatments','servExcludeCurrent'));
    }
    public function treatmentService($slug)
    {
        $thisTreatment = $this->currentTreatment($slug);
        $treatments = $this->currentServiceTreatments($thisTreatment->id);
        $services = $this->services();
        $servExcludeCurrent = $this->servicesExcludeCurrent($thisTreatment->id);
        $view = 'treatment-service';

        return view($view, compact('services','thisTreatment','treatments','servExcludeCurrent'));
    }
}
