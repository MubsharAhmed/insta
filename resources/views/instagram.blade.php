<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        .posts {
            display: flex;
            flex-wrap: wrap;
        }
        .like-comment {
            font-size: 10px;
            color: #333;
            padding-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:20px;margin-bottom:20px;padding:50px;background-color:#ddd;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ $data['profile_picture'] }}" class="profile-pic" style="border-radius:50%;">
                </div>
                <div class="col-md-9">
                    <h2 class="username">{{ $data['username'] }}</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <span class="number-of-posts">{{ $data['media_count'] }}</span> posts
                        </div>
                        <div class="col-md-4">
                            <span class="followers">{{ $data['followers_count'] }}</span> followers
                        </div>
                    </div>
                    <div class="row" style="margin-top:60px;">
                        <h4 class="name">{{ $data['name'] }}</h4>
                    </div>
                    <div class="row">
                        <h4 class="biography">{{ $data['biography'] }}</h4>
                    </div>
                    <br>
                    <hr><br>
                    <div class="row">
                        <p>POSTS</p>
                    </div>
                    <div class="row posts">
                        @foreach ($data['media']['data'] as $post)
                            <div class="col-md-4 equal-height">
                                <img style="min-height:50px;background-color:#fff;width:100%" src="{{ $post['media_url'] }}">
                                <div class="row like-comment">
                                    <div class="col-md-6">{{ $post['like_count'] }} LIKES</div>
                                    <div class="col-md-6">{{ $post['comments_count'] }} COMMENTS</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
