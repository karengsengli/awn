@extends('user_template')
@section('content')
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Portfolio Detailsss</h2>
                        <div class="page_link">
                            <a href="/">Home</a>
                            <a href="/portofolio">Portfolio</a>
                            <a href="">Portfolio Details</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Portfolio Details Area =================-->
        <section class="portfolio_details_area p_120">
            <div class="container">
                <div class="portfolio_details_inner">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left_img">
                                <img class="img-fluid" src="{{$project->img}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio_right_text">
                                <h4>{{$project->title}}</h4>
                                <p>{{$project->subtitle}}</p>
                                <ul class="list">
                                    <li><span>Client</span>:  {{$project->client}}</li>
                                    <li><span>Website</span>:  {{$project->client_web}}</li>
                                    <li><span>Completed</span>:  {{$project->complete_date}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <p>{!!$project->detail!!}</p>
                </div>
            </div>
        </section>
  
@endsection