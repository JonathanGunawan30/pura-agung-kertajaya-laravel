<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryData = ApiService::getGalleryData();

        $siteIdentity = ApiService::getSiteIdentity();
        $contactData = ApiService::getContactData();

        return view('gallery', compact('galleryData', 'siteIdentity', 'contactData'));
    }
}
