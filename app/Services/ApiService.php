<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ApiService
{
    const DEFAULT_REVALIDATE = 60;
    const GLOBAL_REVALIDATE = 600;
    private static function fetchData($endpoint, $revalidateSeconds = self::DEFAULT_REVALIDATE)
    {
        $cacheKey = "api_request_" . str_replace('/', '_', $endpoint);

        return Cache::remember($cacheKey, $revalidateSeconds, function () use ($endpoint) {

            $baseUrl = rtrim(env('API_BASE_URL'), '/');
            $url = "{$baseUrl}{$endpoint}";

            try {
                $response = Http::timeout(10)->get($url);

                if ($response->failed()) {
                    throw new \Exception("Failed to fetch {$endpoint}: " . $response->status());
                }

                return $response->json();
            } catch (\Exception $e) {
                Log::error("ApiService Error [{$endpoint}]: " . $e->getMessage());
                return null;
            }
        });
    }
    public static function getHeroSlides()
    {
        $json = self::fetchData("/hero-slides");
        return $json['data'] ?? [];
    }

    public static function getSiteIdentity()
    {
        $json = self::fetchData("/site-identity", self::GLOBAL_REVALIDATE);
        $data = $json['data'] ?? null;
        return (is_array($data) && isset($data[0])) ? $data[0] : $data;
    }

    public static function getAboutData()
    {
        $json = self::fetchData("/about");
        $data = $json['data'] ?? null;

        return (is_array($data) && isset($data[0])) ? $data[0] : $data;
    }

    public static function getGalleryData()
    {
        $json = self::fetchData("/galleries");
        return $json['data'] ?? [];
    }

    public static function getActivitiesData()
    {
        $json = self::fetchData("/activities");
        return $json['data'] ?? [];
    }

    public static function getFacilitiesData()
    {
        $json = self::fetchData("/facilities");

        if (!$json) return [];

        if (is_array($json) && !isset($json['data'])) {
            return $json;
        }

        return $json['data'] ?? [];
    }

    public static function getTestimonialsData()
    {
        $json = self::fetchData("/testimonials");
        return $json['data'] ?? [];
    }

    public static function getContactData()
    {
        $json = self::fetchData("/contact-info", self::GLOBAL_REVALIDATE);

        $data = $json['data'] ?? (is_array($json) ? $json : []);

        if (is_array($data) && count($data) > 0) {
            return isset($data[0]) ? $data[0] : $data;
        }

        return null;
    }

    public static function getOrganizationData()
    {
        $json = self::fetchData("/organization-members");
        return $json['data'] ?? [];
    }

    public static function getOrganizationStructure()
    {
        $orgData = self::getOrganizationData();

        if (empty($orgData)) {
            return [];
        }

        $groupedData = [];
        foreach ($orgData as $member) {
            $order = $member['position_order'];
            if (!isset($groupedData[$order])) {
                $groupedData[$order] = [];
            }
            $groupedData[$order][] = $member;
        }

        ksort($groupedData);

        foreach ($groupedData as &$members) {
            usort($members, function($a, $b) {
                return $a['order_index'] <=> $b['order_index'];
            });
        }

        return $groupedData;
    }
}
