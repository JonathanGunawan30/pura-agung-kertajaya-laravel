<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = ApiService::getAboutData();
        $siteIdentity = ApiService::getSiteIdentity();
        $contactData = ApiService::getContactData();

        return view('about', compact('aboutData', 'siteIdentity', 'contactData'));
    }
}
