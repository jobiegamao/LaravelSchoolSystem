
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
            <h4>Southeast University</h4>
            <h2><em>Your</em> Classroom</h2>
            <div class="main-button">
                <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
            </div>
        </div>
    </div>
</section>

<section class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fas fa-clipboard"></i>All Courses</h4>
              </div>
              <div class="content-hide">
                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.</p>
                <div class="scroll-to-section"><a href="#section2">More Info.</a></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fas fa-school"></i>About SEU</h4>
              </div>
              <div class="content-hide">
                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.</p>
                <div class="scroll-to-section"><a href="#section3">Details</a></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fas fa-book"></i>Contact Us</h4>
              </div>
              <div class="content-hide">
                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet. Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.</p>
                <div class="scroll-to-section"><a href="#section4">Read More</a></div>
            </div>
            </div>
          </div>
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
