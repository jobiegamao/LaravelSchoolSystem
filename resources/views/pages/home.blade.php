
@extends('layouts.app')
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>
@section('content')
<section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('dist/img/course-video.mp4') }}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Southeast University</h6>
            <h2><em>Your</em> Classroom</h2>
            <div class="main-button">
                <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
            </div>
        </div>
    </div>
</section>


<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('js/isotope.min.js') }}"></script>
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<script src="{{ asset('js/lightbox.js') }}"></script>
<script src="{{ asset('js/tabs.js') }}"></script>
<script src="{{ asset('js/video.js') }}"></script>
<script src="{{ asset('js/slick-slider.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>



<script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
    var
    direction = section.replace(/#/, ''),
    reqSection = $('.section').filter('[data-section="' + direction + '"]'),
    reqSectionPos = reqSection.offset().top - 0;

    if (isAnimate) {
        $('body, html').animate({
        scrollTop: reqSectionPos },
        800);
    } else {
        $('body, html').scrollTop(reqSectionPos);
    }

    };

    var checkSection = function checkSection() {
    $('.section').each(function () {
        var
        $this = $(this),
        topEdge = $this.offset().top - 80,
        bottomEdge = topEdge + $this.height(),
        wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
        var
        currentId = $this.data('section'),
        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
        reqLink.closest('li').addClass('active').
        siblings().removeClass('active');
        }
    });
    };

    $('.main-menu, .scroll-to-section').on('click', 'a', function (e) {
    if($(e.target).hasClass('external')) {
        return;
    }
    e.preventDefault();
    $('#menu').removeClass('active');
    showSection($(this).attr('href'), true);
    });

    $(window).scroll(function () {
    checkSection();
    });
</script>
@endsection
