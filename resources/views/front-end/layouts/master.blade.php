<!DOCTYPE html>
<html lang="en">
@include ('front-end.partials.head')

<body>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    
    @yield('body.header')

    <!-- Main Content -->
    <div class="container">
        @yield('body.content')
    </div>

    <hr>

   @include('front-end.partials.footer')

    <!-- jQuery -->
    <script src="{{asset('public/front-end/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/front-end/js/bootstrap.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/front-end/js/clean-blog.min.js')}}"></script>
     <script src="{{asset('front-end/js/clean-blog.min.js')}}"></script>
    <script type='text/javascript'>$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#bbttop').fadeIn();}else{$('#bttop').fadeOut();}});$('#bttop').click(function(){$('body,html').animate({scrollTop:0},800);});});</script>
    
</body>

</html>
