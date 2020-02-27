@extends('user_template')
@section('content')
          <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Services</h2>
                        <div class="page_link">
                            <a href="/">Home</a>
                            <a href="/service">Services</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Feature Area =================-->
        <section class="feature_area feature_tow p_120">
            <div class="container">
                <div class="main_title">
                    <h2>offerings to my clients</h2>
                    <p>Describe what you do.</p>
                </div>
                <div class="feature_inner row">
                    <div class="col-lg-4">
                        <div class="feature_item">
                            <i class="flaticon-city"></i>
                            <h4>Service One</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis distinctio sit sunt magni et maiores unde dolore sed. Esse tempora temporibus in quis aliq</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature_item">
                            <i class="flaticon-skyline"></i>
                            <h4>Service Two</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis distinctio sit sunt magni et maiores unde dolore sed. Esse tempora temporibus in quis aliq</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature_item">
                            <i class="flaticon-sketch"></i>
                            <h4>Service Three</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad corporis distinctio sit sunt magni et maiores unde dolore sed. Esse tempora temporibus in quis aliq</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Area =================-->
        
        <!--================Testimonials Area =================-->
        <section class="testimonials_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>What My Clients Say!</h2>
                    <p>Your customers' feedback.</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="testi_inner">
                            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item text-center active">
                                        <img src="img/team/man1.jpg" alt="">
                                        <h3>Mr Name</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto dolore error eos ullam consectetur at, eligendi, cum ratione. Reprehenderit cumque provident perferendis quis facilis fugit officia, esse quam! Dicta, labore.</p>
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="img/team/man2.jpg" alt="">
                                        <h3>Mr Name</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto dolore error eos ullam consectetur at, eligendi, cum ratione. Reprehenderit cumque provident perferendis quis facilis fugit officia, esse quam! Dicta, labore.</p>
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img src="img/team/man3.jpg" alt="">
                                        <h3>Mr Name</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto dolore error eos ullam consectetur at, eligendi, cum ratione. Reprehenderit cumque provident perferendis quis facilis fugit officia, esse quam! Dicta, labore.</p>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!--================End Testimonials Area =================-->
@endsection