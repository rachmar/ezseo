<?php

namespace App\Integrations;

use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\Http;

class SignalWire
{   
    public static function http(?Company $company, string $endpoint, string $method = 'GET', array $postData = [])
    {   
        if (!isset($company->id)) { return ['data' => []]; }
        
        $url = 'https://'.$company->space_url.'/'.$endpoint;

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        try {
            $response = Http::withHeaders($headers)
            ->withBasicAuth($company->project_id, $company->auth_token)
            ->withOptions([
                'verify' => true
            ])
            ->{$method}($url, $postData);

            if ($response->failed()) {
                throw new Exception('SIGNAL WIRE ERROR: ' . $response->body());
            }
            
        } catch (\Exception $ex) {
            throw new Exception('HTTP ERROR: ' . $ex->getMessage());
        }

        return $response->json();
    }
}
