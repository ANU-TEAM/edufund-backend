<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('landing/assets/css/main.css') }}" id="main_style">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,800" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('landing/assets/css/green.css') }}">
  <title>Edufund</title>
  <link rel="icon" href="{{ asset('landing/assets/img/favicon.png') }}" type="image/png">
</head>
<body>

<!--Main menu-->
<div class="menu">
  <div class="container menu__wrapper">
    <div class="row">
      <div class="menu__logo menu__item">
        <a href="/">
        <svg class="menu__logo-img" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 48 48">
          <path d="M0 0h24v24H0z" fill="none"/>
          <g>
            <path  d="M 5 13.18 L 5 17.18 L 12 21 L 19 17.18 L 19 13.18 L 12 17 L 5 13.18 Z M 12 3 L 1 9 L 12 15 L 21 10.09 L 21 17 L 23 17 L 23 9 L 12 3 Z" style="fill: rgb(9, 199, 142);"/>
          </g>
        </svg>
        <p class="menu__logo-title">EduFund</p>
        </a>
      </div>
      <div class="menu__item">
        <nav class="menu__right-nav d-l-none">
          <ul>
            <li><a href="{{ asset('landing/assets/edufund.apk') }}" class="site-btn site-btn--accent">Download EduFund</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<!--Main menu-->


<!--Header-->
<header class="header-home">
  <div class="container background background--right background--header background--mobile"
       style="background-image: url({{ asset('landing/assets/img/png.png') }});">
    <div class="row">
      <div class="col-12">
        <h2 class="header-home__title">Making Your Dreams Come True</h2>
        <p class="header-home__description">
          EduFund is a 2021 Google Solution Challenge Project that 
          provides the avenue for students having difficulty with schooling due to financial problems.
          The platform helps students to solicit for financial support from the public.
        </p>
        <div class="header-home__btns header-home__btns-mobile">
          <a href="{{ asset('landing/assets/edufund.apk') }}" class="site-btn site-btn--accent header-home__btn">Start Using Edufund</a>
          
        </div>
      </div>
    </div>
  </div>
</header>
<!--Header-->

<!--Features-->
<section class="section" id="features">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="section__title">An app that allows you to continue schooling.<br/>
          Learn how:</h3>
      </div>
    </div>
    <div class="row features">
      <div class="col-4 col-m-4 col-l-4">
          <div class="features__card card">
              <img alt="" class="features__img" src="{{ asset('landing/assets/img/register.svg') }}" alt="">
            <p class="features__title">Register for Free</p>
          </div>
      </div>
      <div class="col-4 col-m-4 col-l-4">
        <div class="features__card card">
          <img alt="" class="features__img" src="{{ asset('landing/assets/img/apply.svg') }}" alt="">
        <p class="features__title">Submit an Application</p>
      </div>
      </div>
      <div class="col-4 col-m-4 col-l-4">
          <div class="features__card card">
            <img alt="" class="features__img" src="{{ asset('landing/assets/img/money.svg') }}" alt="">
            <p class="features__title">Receive Funds</p>
          </div>
      </div>
    </div>
    <hr>
  </div>
</section>
<!--Features-->

<!--Video-->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="section__title">Want to know more about EduFund?<br/>
          Watch the video.</h3>
      </div>
    </div>
    <div class="row video">
      <div class="col-offset-1 col-10 col-t-12 ">
        <div class="video__video" data-video="_DHPmGeXa-k">
          <div class="video__play"><img src="{{ asset('landing/assets/img/img_play_btn.png') }}" alt=""></div>
          <div class="embed-responsive">
            <div class="embed-responsive-item"></div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>
</section>
<!--Video-->

<!--What is-->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="section__title">What is EduFund?</h3>
        <p class="section__description">EduFund is a platform helps students to solicit for financial support from individuals and 
        organizations. The aim of EduFund is to remove the financial barrier preventing students from acheiving their dreams.</p>
      </div>
    </div>
    <hr>
  </div>
</section>
<!--What is-->

<!--Questions-->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="section__title">Have any questions?</h3>
      </div>
    </div>
    <div class="row questions">
      <div class="col-4 col-m-12">
        <div class="questions__card card">
          <img alt="" src="{{ asset('landing/assets/img/img_question_1.png') }}" class="questions__icon">
          <h4 class="questions__title">Is EduFund Free?</h4>
          <p class="questions__answer">EduFund is 100% free. You do not need to pay any amount to register on the platform.
            Also, EduFund is free to to download. We do not take any percentage from the money donated to you.
          </p>
        </div>
      </div>
      <div class="col-4 col-m-12">
        <div class="questions__card card">
          <img alt="" src="{{ asset('landing/assets/img/img_question_2.png') }}" class="questions__icon">
          <h4 class="questions__title">Who can apply?</h4>
          <p class="questions__answer">Students who has genuine reasons that inhibits from furthering thier education.
          EduFund should be your last resort. If family or friends can support, kindly do not apply.
          For now, we focus more on supporting Primary, Secondary, and Tertiary students</p>
        </div>
      </div>
      <div class="col-4 col-m-12">
        <div class="questions__card card">
          <img alt="" src="{{ asset('landing/assets/img/img_question_3.png') }}" class="questions__icon">
          <h4 class="questions__title">In which countries is EduFund available?</h4>
          <p class="questions__answer">EduFund is currently avaiable in Ghana for now. But, anyone across the globe can
          sponsor any student seeking funding on EduFund. We are looking forward to expanding to various soon.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Questions-->

<!--Download-->
<section class="section section--last">
  <div class="container download">
    <div class="row">
      <div class="col-12">
        <h3 class="download__title">Download EduFund today</h3>
        <h3>and get started on receiving funds to make your dreams come true</h3>
      </div>
    </div>
    <div class="row download__btns">
      <div class="col-12">
        <!-- <a href="" class="site-btn site-btn--dark site-btn--download site-btn--center">
          <img alt="" src="landing/assets/img/img_google.png"></a> -->
          <a href="{{ asset('landing/assets/edufund.apk') }}" class="site-btn site-btn--accent">Download EduFund</a>
      </div>
    </div>
  </div>
  <div class="section  background background--clouds"></div>
</section>
<!--Download-->



<hr>

<!--Footer-->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>© 2021 Edufund – Made by
          <a href="https://dsc.community.dev/all-nations-university/" target="_blank" class="link link--gray">DSC All Nations University</a></p>
      </div>
    </div>
  </div>
</div>
<!--Footer-->

<script src="{{  asset('landing/assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="{{  asset('landing/assets/js/vendor/jquery.waypoints.js') }}"></script>
<script src="{{  asset('landing/assets/js/menu.js') }}"></script>
<script src="{{  asset('landing/assets/js/mobile-menu.js') }}"></script>
<script src="{{  asset('landing/assets/js/video.js') }}"></script>
</body>
</html>
