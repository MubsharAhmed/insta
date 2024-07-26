<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Laravel Scraper</title>

    <style>
        .wrapper > .card:first-child .card-header {
            background-color: orange;
            color: white;
        }

        .wrapper > .card:nth-child(2) .card-header {
            background-color: red;
            color: white;
        }

        .wrapper > .card:nth-child(3) .card-header {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 wrapper">
         {{--   @foreach($data as $key => $value)
                <div class="card text-center mt-4">
                    <h5 class="card-header">{{ $key }}</h5>
                    <div class="card-body">
                        <p class="card-text">{{ $value }}</p>
                    </div>
                </div>
            @endforeach--}}
        </div>
    </div>
</div>
</body>
</html> -->



 {{-- <!-- >>>>@working for only header section meta tags -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraper Results</title>
</head>
<body>
    <h1>Scraper Results</h1>
    <p>Followers: {{ $followers }}</p>
    <p>Following: {{ $following }}</p>
    <p>Posts: {{ $posts }}</p>
    <p>Name: {{ $name }}</p>
    <p>Title: {{ $title }}</p>

    <h2>Meta Tags</h2>
    <ul>
        @foreach ($metaTags as $meta)
            <li>
                @if ($meta['name'])
                    Name: {{ $meta['name'] }} - Content: {{ $meta['content'] }}
                @elseif ($meta['property'])
                    Property: {{ $meta['property'] }} - Content: {{ $meta['content'] }}
                @else
                    Unknown Meta: {{ json_encode($meta) }}
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Video Tags</h2>
    <ul>
        @foreach ($videoTags as $video)
            <li>Src: {{ $video['src'] }} | Type: {{ $video['type'] }}</li>
        @endforeach
    </ul>

    <h2>Source Tags within Video Elements</h2>
    <ul>
        @foreach ($sourceTags as $source)
            <li>Src: {{ $source['src'] }} | Type: {{ $source['type'] }}</li>
        @endforeach
    </ul>
</body>
</html> -->--}}


<!-- Node js  -->
{{--<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraper Results</title>
</head>
<body>
    <h1>Scraper Results</h1>
    <p>Followers: {{ $followers }}</p>
    <p>Following: {{ $following }}</p>
    <p>Posts: {{ $posts }}</p>
    <p>Title: {{ $title }}</p>
    @if($image)
        <img src="{{ $image }}" alt="Profile Image" width="200">
    @endif

    <h2>Links</h2>
    <ul>
        @foreach ($links as $link)
            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
        @endforeach
    </ul>
</body>
</html> -->--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraper Results</title>
</head>
<body>
    <h1>Scraper Results</h1>
    <p>Followers: {{ $followers }}</p>
    <p>Following: {{ $following }}</p>
    <p>Posts: {{ $posts }}</p>
    <p>Name: {{ $name }}</p>
    <p>Title: {{ $title }}</p>

    <h2>Meta Tags</h2>
    <ul>
        @foreach ($metaTags as $meta)
            <li>
                @if ($meta['name'])
                    Name: {{ $meta['name'] }} - Content: {{ $meta['content'] }}
                @elseif ($meta['property'])
                    Property: {{ $meta['property'] }} - Content: {{ $meta['content'] }}
                @else
                    Unknown Meta: {{ json_encode($meta) }}
                @endif
            </li>
        @endforeach
    </ul>

    <h2>Video Tags</h2>
    <ul>
        @foreach ($videoTags as $video)
            <li>Src: {{ $video['src'] }} | Type: {{ $video['type'] }}</li>
        @endforeach
    </ul>

    <h2>Source Tags within Video Elements</h2>
    <ul>
        @foreach ($sourceTags as $source)
            <li>Src: {{ $source['src'] }} | Type: {{ $source['type'] }}</li>
        @endforeach
    </ul>

    <h2>Images</h2>
    <ul>
     {{--   @foreach ($downloadedImages as $image)
            <!-- <li><img src="{{ $image }}" alt="Instagram Image" width="200" height="200"></li> -->
        @endforeach--}}
        @foreach ($images as $image)
        <li><img src="{{ $image }}" alt="Insta"></li>
        @endforeach
    </ul>

    <h2>Links</h2>
    <ul>
        @foreach ($links as $link)
            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
        @endforeach
    </ul>
</body>
</html>






