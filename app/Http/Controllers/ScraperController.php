<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ScraperController extends Controller
{
//     public function scrape()
//     {
//         // Initialize cURL.
//         $ch = curl_init();

//         // Set the URL of the scraping API and the target URL to scrape.
//         $apiKey = '929b5d727de3460a8bad487bb59ac03f'; // Replace with your API key
//         $urlToScrape = 'https://www.instagram.com/oceangreendevelopers/';
//         $scrapeApiUrl = "https://scrape.abstractapi.com/v1/?api_key=$apiKey&url=" . urlencode($urlToScrape);

//         curl_setopt($ch, CURLOPT_URL, $scrapeApiUrl);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//         // Execute the request.
//         $data = curl_exec($ch);

//         // Check for cURL errors.
//         if (curl_errno($ch)) {
//             $error_msg = curl_error($ch);
//             curl_close($ch);
//             return response()->json(['error' => $error_msg], 500);
//         }

//         // Close the cURL handle.
//         curl_close($ch);

//         // Decode the JSON response if necessary.
//         $data = json_decode($data, true);

//         // Pass data to a view or process it as needed.
//         return view('scraper', ['data' => $data]);
//     }
// }
// {
//     private $results = array();

//     public function scraper()
//     {
//         $client = new Client();
//         $url = 'https://www.instagram.com/oceangreendevelopers/';
//         $response = $client->request('GET', $url);
//         $html = (string) $response->getBody();

     
//         file_put_contents('debug.html', $html);

//         $crawler = new Crawler($html);
//         dd($crawler);

        
//         $crawler->filter('section')->each(function (Crawler $section) {
         
//             file_put_contents('debug_section.html', $section->html());

      
//             $section->filter('ul')->each(function (Crawler $ul) {
              
//                 file_put_contents('debug_ul.html', $ul->html());

                
//                 $ul->filter('li')->each(function (Crawler $li) {
                
//                     file_put_contents('debug_li.html', $li->html());

                
//                     $title = $li->filter('span')->text();
//                     $followers = $li->filter('span')->eq(1)->text();

                
//                     $followers = preg_replace('/[^0-9]/', '', $followers);

//                     $this->results[] = [
//                         'title' => $title,
//                         'followers' => $followers
//                     ];
//                 });
//             });
//         });

        
//         $data = $this->results;
//         return view('scraper', compact('data'));
//     }
// }



// public function scraper()
// {
//     $client = new Client();
//     // dd($client);
//     $url = 'https://www.instagram.com/mubshar_khan_943/';
//     $response = $client->request('GET', $url);    
//     $html = (string) $response->getBody();
//     dd($html);


//     // For debugging purposes, save the HTML to a file
//     file_put_contents('debug.html', $html);

//     $crawler = new Crawler($html);

//     // Extract the title
//     $title = $crawler->filter('title')->text();

//     // Return the title in a view or handle as needed
//     return view('scraper', compact('title'));
// }
// }


// working for only meta tags ::::::::
// public function scraper()
// {
//     $client = new Client();
//     $url = 'https://www.instagram.com/danish/';
//     $response = $client->request('GET', $url);
//     $html = (string) $response->getBody();
//     // dd($html);


//     $crawler = new Crawler($html);

//     $metaTags = $crawler->filter('meta')->each(function (Crawler $node, $i) {
//         return [
//             'name' => $node->attr('name'),
//             'property' => $node->attr('property'),
//             'content' => $node->attr('content')
//         ];
//     });
  
//     $videoTags = $crawler->filter('video')->each(function (Crawler $node, $i) {

//         return [
            
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });

//     $sourceTags = $crawler->filter('video source')->each(function (Crawler $node, $i) {
//         return [
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });
//     // dd($sourceTags);

//     $description = $crawler->filter('meta[property="og:description"]')->attr('content');
//     preg_match('/(\d+)\sFollowers,\s(\d+)\sFollowing,\s(\d+)\sPosts\s-\sSee\sInstagram\sphotos\sand\svideos\sfrom\s(.+)\s\(@(.+)\)/', $description, $matches);
//     $followers = $matches[1] ?? 'N/A';
//     $following = $matches[2] ?? 'N/A';
//     $posts = $matches[3] ?? 'N/A';
//     $name = $matches[4] ?? 'N/A';
//     $title = $matches[5] ?? 'N/A';

//     return view('scraper', compact('followers', 'following', 'posts', 'name', 'title', 'metaTags', 'videoTags', 'sourceTags'));
// }
// ???????????????

// from node js
// public function scraper()
// {
//     $client = new Client();
//     $url = 'http://localhost:3000/scrape?url=https://www.instagram.com/samii_khan_5/';

//     try {
//         $response = $client->request('GET', $url);
//         $data = json_decode($response->getBody(), true);

//         $followers = $data['followers'] ?? 'N/A';
//         $following = $data['following'] ?? 'N/A';
//         $posts = $data['posts'] ?? 'N/A';
//         $title = $data['title'] ?? 'N/A';
//         $image = $data['image'] ?? null;
//         $links = $data['links'] ?? [];

//         return view('scraper', compact('followers', 'following', 'posts', 'title', 'image', 'links'));
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }


// perfecct static data fetched 
// public function scraper()
// {
//     $client = new Client();
//     $url = 'https://www.instagram.com/mubshar_khan_943/';
//     $response = $client->request('GET', $url);
//     $html = (string) $response->getBody();

//     $crawler = new Crawler($html);

//     $metaTags = $crawler->filter('meta')->each(function (Crawler $node, $i) {
//         return [
//             'name' => $node->attr('name'),
//             'property' => $node->attr('property'),
//             'content' => $node->attr('content')
//         ];
//     });

//     $videoTags = $crawler->filter('video')->each(function (Crawler $node, $i) {
//         return [
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });

//     $sourceTags = $crawler->filter('video source')->each(function (Crawler $node, $i) {
//         return [
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });

//     $description = $crawler->filter('meta[property="og:description"]')->attr('content');
//     preg_match('/(\d+)\sFollowers,\s(\d+)\sFollowing,\s(\d+)\sPosts\s-\sSee\sInstagram\sphotos\sand\svideos\sfrom\s(.+)\s\(@(.+)\)/', $description, $matches);
//     $followers = $matches[1] ?? 'N/A';
//     $following = $matches[2] ?? 'N/A';
//     $posts = $matches[3] ?? 'N/A';
//     $name = $matches[4] ?? 'N/A';
//     $title = $matches[5] ?? 'N/A';

//     // Extract images
//     $images = $crawler->filter('img')->each(function (Crawler $node) {
//         return $node->attr('src');
//     });

//     // Extract links
//     $links = $crawler->filter('a')->each(function (Crawler $node) {
//         return $node->attr('href');
//     });

//     return view('scraper', compact('followers', 'following', 'posts', 'name', 'title', 'metaTags', 'videoTags', 'sourceTags', 'images', 'links'));
// }

// ?????? browser shot works 


// public function downloadImage($url)
// {
//     $client = new Client();
//     $response = $client->get($url);

//     if ($response->getStatusCode() == 200) {
//         $filename = Str::random(40) . '.' . pathinfo($url, PATHINFO_EXTENSION);
//         $path = 'public/images/' . $filename;
//         Storage::put($path, $response->getBody());
//         return Storage::url($path);
//     }

//     return null;
// }

public function scraper()
{
    $url = 'https://www.instagram.com/danish_ahmad250/';

    // Use Browsershot to render JavaScript content and get the HTML
    $html = Browsershot::url($url)->waitUntilNetworkIdle()->bodyHtml();
    
    // Create a new Crawler instance
    $crawler = new Crawler($html);

    // Extract meta tags
    $metaTags = $crawler->filter('meta')->each(function (Crawler $node) {
        return [
            'name' => $node->attr('name'),
            'property' => $node->attr('property'),
            'content' => $node->attr('content')
        ];
    });

    // Extract video tags
    $videoTags = $crawler->filter('video')->each(function (Crawler $node) {
        return [
            'src' => $node->attr('src'),
            'type' => $node->attr('type')
        ];
    });

    // Extract source tags within video elements
    $sourceTags = $crawler->filter('video source')->each(function (Crawler $node) {
        return [
            'src' => $node->attr('src'),
            'type' => $node->attr('type')
        ];
    });

    // Extract description and meta information
    $description = $crawler->filter('meta[property="og:description"]')->attr('content');
    preg_match('/(\d+)\sFollowers,\s(\d+)\sFollowing,\s(\d+)\sPosts\s-\sSee\sInstagram\sphotos\sand\svideos\sfrom\s(.+)\s\(@(.+)\)/', $description, $matches);
    $followers = $matches[1] ?? 'N/A';
    $following = $matches[2] ?? 'N/A';
    $posts = $matches[3] ?? 'N/A';
    $name = $matches[4] ?? 'N/A';
    $title = $matches[5] ?? 'N/A';

    // Extract images
    $images = $crawler->filter('img')->each(function (Crawler $node) {
        $src = $node->attr('src');
        // Filter for Instagram image URLs
        if (str_contains($src, 'instagram.fisb1-2.fna.fbcdn.net')) {
            return $src;
        }
        return null;
    });
    $images = array_filter($images); // Remove null values

    // Extract links
    $links = $crawler->filter('a')->each(function (Crawler $node) {
        return $node->attr('href');
    });

    return view('scraper', compact('followers', 'following', 'posts', 'name', 'title', 'metaTags', 'videoTags', 'sourceTags', 'images', 'links'));
}

// public function scraper()
// {
//     $url = 'https://www.instagram.com/danish_ahmad250/';

    
//     $html = Browsershot::url($url)->waitUntilNetworkIdle()->bodyHtml();
        
//     $crawler = new Crawler($html);

//     // Extract meta tags
//     $metaTags = $crawler->filter('meta')->each(function (Crawler $node) {
//         return [
//             'name' => $node->attr('name'),
//             'property' => $node->attr('property'),
//             'content' => $node->attr('content')
//         ];
//     });

//     // Extract video tags
//     $videoTags = $crawler->filter('video')->each(function (Crawler $node) {
//         return [
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });

//     // Extract source tags within video elements
//     $sourceTags = $crawler->filter('video source')->each(function (Crawler $node) {
//         return [
//             'src' => $node->attr('src'),
//             'type' => $node->attr('type')
//         ];
//     });

//     // Extract description and meta information
//     $description = $crawler->filter('meta[property="og:description"]')->attr('content');
//     preg_match('/(\d+)\sFollowers,\s(\d+)\sFollowing,\s(\d+)\sPosts\s-\sSee\sInstagram\sphotos\sand\svideos\sfrom\s(.+)\s\(@(.+)\)/', $description, $matches);
//     $followers = $matches[1] ?? 'N/A';
//     $following = $matches[2] ?? 'N/A';
//     $posts = $matches[3] ?? 'N/A';
//     $name = $matches[4] ?? 'N/A';
//     $title = $matches[5] ?? 'N/A';

//     // Extract images
//     $images = $crawler->filter('img')->each(function (Crawler $node) {
//         $src = $node->attr('src');
//         // Filter for Instagram image URLs
//         if (str_contains($src, 'instagram.fisb1-2.fna.fbcdn.net')) {
//             return $src;
//         }
//         return null;
//     });
//     $images = array_filter($images); // Remove null values

//     // Download images
//     $downloadedImages = [];
//     foreach ($images as $image) {
//         $localImage = $this->downloadImage($image);
//         if ($localImage) {
//             $downloadedImages[] = $localImage;
//         }
//     }

//     // Extract links
//     $links = $crawler->filter('a')->each(function (Crawler $node) {
//         return $node->attr('href');
//     });

//     return view('scraper', compact('followers', 'following', 'posts', 'name', 'title', 'metaTags', 'videoTags', 'sourceTags', 'downloadedImages', 'links'));
// }




//  dataaaaaaaaaaaaaaaaaaaaaa



}




//         $client = new Client();
//         $url = 'https://www.instagram.com/oceangreendevelopers/';
//         $response = $client->request('GET', $url);
//         $html = (string) $response->getBody();

//         $crawler = new Crawler($html);

//         $crawler->filter('#maincounter-wrap')->each(function (Crawler $item) {
//             $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
//         });

//         $data = $this->results;
//         return view('scraper', compact('data'));
//     }
// }
