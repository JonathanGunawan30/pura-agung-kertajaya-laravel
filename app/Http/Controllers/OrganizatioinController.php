<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class OrganizatioinController extends Controller
{
    public function index()
    {
        $groupedData = ApiService::getOrganizationStructure();

        $orgData = ApiService::getOrganizationData();

        $siteIdentity = ApiService::getSiteIdentity();
        $contactData = ApiService::getContactData();

        return view('organization', compact('groupedData', 'orgData', 'siteIdentity', 'contactData'));
    }
}
