@extends('layouts.app')
@section('content')
    <div class="toplevel_page_list_gags">
        <div class="container">
            <div class="row">
                <div class="col-sm-8" id="main_section">
                    <div id="list_gags">

                        <!-- using short-code `lorem` for generate random, simply, dummy text -->
                        <?php
                        $articles_json = <<<HTML
                [
  {
    "title": "Mexican Government Teams Up With Leonardo DiCaprio In Last-Ditch Effort To Save Vaquita",
    "type": "image",
    "media_source": "https:\/\/miscmedia-9gag-fun.9cache.com\/images\/long-post-cover\/37558474_1497853797.8644_Nuga5E_460c.jpg"
  },
  {
    "title": "Haha, joke&#039;s on you",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/aeeKddB_460s.jpg"
  },
  {
    "title": "After all this time, this is still my favorite game ending.",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/awQNwxy_460s.jpg"
  },
  {
    "title": "Just end it all ready",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/aMAeq9R_460s.jpg"
  },
  {
    "title": "Love it",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/am2qVg2_460s.jpg"
  },
  {
    "title": "Grandma, there&#039;s a virus in my laptop!",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/aY4j9Lq_460s.jpg"
  },
  {
    "title": "Intrigued, tell me more!",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/ar51qX6_460s.jpg"
  },
  {
    "title": "9gag comments are gold",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/aoOm69e_460s_v1.jpg"
  },
  {
    "title": "Finals start tomorrow :(",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/agYrWYW_460s.jpg"
  },
  {
    "title": "How to start a match of Battlefield 1",
    "type": "image",
    "media_source": "https:\/\/img-9gag-fun.9cache.com\/photo\/aDzRN79_460s.jpg"
  }
]
HTML;
                        $articles = (json_decode($articles_json));
                        foreach ($articles as $article) {
                            $media_html = '<div></div>';// default html
                            if ($article->type === 'image') {
                                $media_html = "
<div class='gag-media-content'>
    <a href='#'>
        <img src='{$article->media_source}'>
    </a>
</div>
";
                            }
                            $counts_html = "
<div class='counts'>
    <span class='points'>
        <a href='#'>2,728 points</a>
    </span>
     ·
    <span class='comments'>
        <a href='#'>200 comments</a>
    </span>
</div>";
                            $actions_html = "
<div class='actions'>
    <div class='actions-in-left pull-left'>
        <span class='btn btn-default btn-like'>
            <span class='glyphicon glyphicon-chevron-up'></span>
        </span>
        <span class='btn btn-default btn-unlike'>
            <span class='glyphicon glyphicon-chevron-down'></span>
        </span>
        <span class='btn btn-default btn-comment'>
            <span class='glyphicon glyphicon-comment'></span>
        </span>
    </div>
    <div class='actions-in-right pull-right'>
        <span class='btn btn-facebook btn-share-facebook'>
            Facebook
        </span>
        <span class='btn btn-twitter btn-share-twitter'>
            Twitter
        </span>
    </div>
</div>";
                            echo <<<HTML

<div class="gag-item">
    <h4 class="gag-title">
        <a href="#">{$article->title}</a>
    </h4>
    $media_html
    $counts_html
    $actions_html
    <div style="clear:both"></div>
    <hr>
</div>
HTML;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-4" id="sidebar_section">
                    <div class="featured_items">
                        <?php
                        shuffle($articles);
                        foreach ($articles as $article) {
                            $media_html = <<<HTML
                    <img src="{$article->media_source}" alt="">
HTML;
                            echo <<<HTML
                    <div class="featured_item_wrap">
                        <div class="image_wrap">
                            <a href="#">$media_html</a>
                        </div>
                        <a href="#" class="title">{$article->title}</a>
                    </div>
HTML;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
