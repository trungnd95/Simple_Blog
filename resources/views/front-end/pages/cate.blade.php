@extends ('front-end.layouts.master')

@section('body.header')
    <header class="intro-header" style="background-image: url({{asset('public/front-end/img/home-bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Blog</h1>
                        <hr class="small">
                        <span class="subheading">Writting to relax</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection 

@section ('body.content')
    
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1>{!! $cate->name !!}</h1>
                @foreach($articles_cat as $item)
                <article class="article_typesome">
                    <header class="postheader_typesome">
                        <ul>
                            <?php 
                            $user_id = $item->user_id;
                            $user = Simple_Blog\User::where('id',$user_id)->first();
                            ?>
                            <li><img class="author-thumb_typesome" src="{{asset('public/upload/images/'.$user->avatar)}}" alt="Author image" nopin="nopin"></li>
                            <li class="name-thumb_typesome"><a href="#">{!! $user->name !!}</a></li>
                            <li class="date_typesome"><time>{!! $item-> created_at !!}</time></li>
                            <li class="posttags_typesome">
                                <?php
                                $cate_id = $item->cate_id;
                                $cate = Simple_Blog\Cate::where('id',$cate_id)->first();
                                
                                ?>
                                <a href="#">{{$cate->name}}</a>
                            </li>
                        </ul>
                        
                        <h2 class="posttitle_typesome"><a href="{{route('detail.show',[$item->id])}}" rel="bookmark">
                            {!! $item->title !!}
                        </a></h2>

                    </header>

                    <div class="postcontent_typesome">
                        <p>{!! substr($item->content,0,300)!!} ... </p>
                    </div>


                    <footer class="excerptfooter_typesome">
                        <section class="read_typesome">
                            <a class="more_typesome" href="{{route('detail.show',[$item->id])}}">Read More</a>
                        </section>

                        <section class="share_typesome">
                            <h4>Share: &nbsp;</h4>
                            <a href="" onclick="window.open('https://twitter.com/share?url='+encodeURIComponent(window.location.href),'width=626,height=436');return false;" target="_blank" class="fa fa-twitter-square"><span class="hidden_typesome">Twitter</span></a>
                            <a href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href),'facebook-share-dialog','width=626,height=436');return false;" target="_blank" class="fa fa-facebook-square"><span class="hidden_typesome">Facebook</span></a>
                            <a href="" onclick="window.open('https://plus.google.com/share?url='+encodeURIComponent(window.location.href),'width=626,height=436');return false;" target="_blank" class="fa fa-google-plus-square"><span class="hidden_typesome">Google +</span></a>
                        </section>
                    </footer>

                    </article>
                    <hr/>
                @endforeach
                <!-- Pager -->
                @if(count($articles_cat) > 5)
                <ul class="pager">
                    <li class="next">
                        <a href="{{$articles_cat->nextPageUrl()}}">Older Posts &rarr;</a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    
@endsection 