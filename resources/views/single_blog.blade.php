@extends('user_template')
@section('content')
          <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>BLOG DETAILS</h2>
                        <div class="page_link">
                            <a href="/">Home</a>
                            <a href="/blog">Blog</a>
                            <a href="">Blog Detail</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="{{$post->img}}" alt="">
                                </div>                                  
                            </div>
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li>Post Writer<i class="lnr lnr-user"></i></li>
                                        <li>{{$post->created_at}}<i class="lnr lnr-calendar-full"></i></li>
                                        <li>{{$post->view}} Views<i class="lnr lnr-eye"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details text-justify">
                                <h2>{{$post->title}}</h2>
                                <p>{!!$post->details!!}</p>
                            </div>
                            
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    @if($previous)
                                    <div class="thumb">
                                        <a href="/single_blog/{{$previous->id}}"><img class="img-fluid" src="{{$previous->img}}" alt=""></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="/single_blog/{{$previous->id}}"><span class="lnr text-white lnr-arrow-left"></span></a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="/single_blog/{{$previous->id}}"><h4>{{$previous->title}}Title</h4></a>
                                    </div>
                                    @endif
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    @if($next)
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="/single_blog/{{$next->id}}"><h4>{{$next->title}}</h4></a>
                                    </div>
                                    <div class="arrow">
                                        <a href="/single_blog/{{$next->id}}"><span class="lnr text-white lnr-arrow-right"></span></a>
                                    </div>
                                    <div class="thumb">
                                        <a href="/single_blog/{{$next->id}}"><img class="img-fluid" src="{{$next->img}}" alt=""></a>
                                    </div> 
                                    @endif                                     
                                </div>                                  
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                <h4>Mr Aung Win Naing</h4>
                                <p>About you</p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat tempore maxime, harum autem repellat ipsam totam consectetur, voluptatibus sed animi voluptate nihil saepe, nesciunt aperiam veniam pariatur. Odio, nisi doloribus.</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget" id="top_post">
                            </aside>
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum nemo, perferendis dolorem, tempore
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns">Subcribe</a>
                                </div>  
                                <p class="text-bottom">You can unsubscribe at any time</p>  
                                <div class="br"></div>                          
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function($) {
                $.ajax({
                  url: "{{route("top_5_post")}}",
                  type: 'GET',
                  success: function(response){
                    var html=`<h3 class="widget_title">Popular Posts</h3>`;
                    $.each( response ,function(index, v) {
                        var text=v.title;
                        if (text>=20) {
                            var check_text=text.substring(20,0);
                            text=check_text;
                           
                        }
                        html+=`<div class="media post_item">
                                    <img src="${v.img}" alt="post">
                                    <div class="media-body">
                                        <a href="/single_blog/${v.id}"><h3>${text}</h3></a>
                                    </div>
                                </div>`;
                    });
                    html+=`<div class="br"></div>`;
                    $('#top_post').html(html);
                    },
                    error: function(request, status, error){
                    }
                });                
            });
        </script>
        <!--================Blog Area =================-->
@endsection