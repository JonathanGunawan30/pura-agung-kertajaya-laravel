<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getLayoutData()
    {
        return [
            'siteIdentity' => ApiService::getSiteIdentity(),
            'contactData' => ApiService::getContactData(),
        ];
    }

    public function privacy()
    {
        return view('pages.privacy', $this->getLayoutData());
    }

    public function terms()
    {
        return view('pages.terms', $this->getLayoutData());
    }
}
