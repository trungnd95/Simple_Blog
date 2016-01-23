@extends ('front-end.layouts.master')

@section('body.header')
<header class="intro-header" style="background-image: url({{asset('public/front-end/img/post-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Trung Manucian</h1>
                    <hr class="small">
                    <span class="subheading">Writting to relax</span>
                </div>
            </div>
        </div>
    </div>
</header>
<hr/>
@endsection 

@section ('body.content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <article class="article_typesome">

            <header class="postheader_typesome">
                <ul>
                <li><time class="date_typesome">{!! $article->created_at!!}</time></li>
                    <?php 
                        $cate_id =  $article->cate_id;
                        $cate =  Simple_Blog\Cate::where('id',$cate_id)->first();   

                    ?>
                    <li class="posttags_typesome"><a href="{{ route('tag.index',[$cate->id,$cate->alias])}}">{!! $cate->name !!}</a></li>

                </ul>

                <h1 class="posttitle_typesome">{!! $article->title !!}</h1>

            </header>

            <div class="postcontent_typesome">
                {!! $article->content !!}
            </div>

            <div class="back_typesome">
                <p class="go-back"><a href="{{route('index')}}" class="fa fa-long-arrow-left"><span>Back</span></a></p>
                <p class="nav" id="bttop"><a href="" class="fa fa-long-arrow-up"><span>Back to top</span></a></p>
            </div>

            <footer class="postfooter_typesome">
                <?php 
                    $user_id = $article->user_id;
                    $user = Simple_Blog\User::where('id', $user_id)->first();
                ?>
                <div style="background-image: url({{ asset('public/upload/images/'.$user->avatar)}})" class="authorimage_typesome"></div>
                <div class="author_typesome">
                    <ul>
                        <li><h4 class="authorname_typesome"><a href="{{ route('author.index',[$user->id]) }}">{!! $user->name !!}</a></h4></li>
                        <li><h5 class="authordata_typesome">Vietnam</h5></li>
                    </ul>
                    <p class="authorbio_typesome">Người vô hình, vô tình biết code...</p>
                </div>



                <section class="sharepost_typesome">
                    <h4>Share this:</h4>
                    <a href="" onclick="window.open('https://twitter.com/share?url='+encodeURIComponent(window.location.href),'width=626,height=436');return false;" target="_blank" class="fa fa-twitter-square"><span class="hidden_typesome">Twitter</span></a>
                    <a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href),'facebook-share-dialog','width=626,height=436');return false;" target="_blank" class="fa fa-facebook-square"><span class="hidden_typesome">Facebook</span></a>
                    <a href="" onclick="window.open('https://plus.google.com/share?url='+encodeURIComponent(window.location.href),'width=626,height=436');return false;" target="_blank" class="fa fa-google-plus-square"><span class="hidden_typesome">Google +</span></a>


                </section>

            </footer>

        </article>
    </div>
</div>
@endsection 