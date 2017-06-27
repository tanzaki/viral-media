@extends('layouts.app')
@section('content')
    <div class="toplevel_page_list_gags">
        <div class="container">
            <div class="row">
                <div class="col-sm-8" id="main_section">
                    <div id="list_gags">

                        <!-- using short-code `lorem` for generate random, simply, dummy text -->
                        <?php
                        use App\Gag;
                        $articles = Gag::latest()->get();
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
