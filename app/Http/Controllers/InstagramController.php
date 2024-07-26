<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class InstagramController extends Controller
{
    private $accessToken;
    private $instagramBusinessId;

    public function __construct()
    {       
        $this->accessToken = env('EAAO7nzAFgV4BOyXsps4lwt7xA8mumvMNTey0FsykrsYVp2zbp2uRxZBnI6dpeQZB48Y3jp5FRFZAOA9hkfvQv62ofK2zUn2c57JxrqiZCJMAxY13cGwRi3AJGKGsTi1NM7tAnxVFffSNdUrDOjUFVIyiA9YR1VCY0pFcDjpDoYgUnZA9SylOz7S7EowZDZD');
        $this->instagramBusinessId = env('1050717309993310');
    }

    public function fetchBusinessData()
    {
        $client = new Client();
        $url = "https://graph.facebook.com/v12.0/{$this->instagramBusinessId}?fields=business_discovery.username(bluebottle){followers_count,media_count,media{comments_count,like_count,media_url}}&access_token=" . $this->accessToken;

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            if (isset($data['business_discovery'])) {
                return view('instagram', ['data' => $data['business_discovery']]);
            }

            return view('instagram')->withErrors(['message' => 'Invalid data structure received from Instagram.']);

        } catch (\Exception $e) {
            Log::error('Error fetching Instagram data: ' . $e->getMessage());
            return view('instagram')->withErrors(['message' => 'Error fetching data from Instagram. Please try again later.'.$e->getMessage()]);
        }
    }
}
