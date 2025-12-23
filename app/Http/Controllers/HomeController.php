<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $heroSlides = ApiService::getHeroSlides();
        $siteIdentity = ApiService::getSiteIdentity();
        $aboutData = ApiService::getAboutData();
        $galleryData = ApiService::getGalleryData();
        $activitiesData = ApiService::getActivitiesData();
        $facilitiesData = ApiService::getFacilitiesData();
        $testimonialsData = ApiService::getTestimonialsData();
        $contactData = ApiService::getContactData();

        return view('home', compact(
            'heroSlides',
            'siteIdentity',
            'aboutData',
            'galleryData',
            'activitiesData',
            'facilitiesData',
            'testimonialsData',
            'contactData'
        ));
    }
}
