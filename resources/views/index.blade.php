@extends('user_template')
@section('content')
<style>
  p {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
</style>
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="home_left_img">
                                <img src="img/banner/awn.png" alt="" class="img-fluid img-responsive">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner_content">
                                <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="1000">
                                    <h5>Hello, this is me</h5>
                                </div>
                                <div data-aos="fade-right" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="1500">
                                    <h2>Aung Win Naing</h2>
                                </div>
                                <p>Your Slogan Here</p>
                                <a class="banner_btn" href="/contact">Contact Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
            <div class="container">
                <div class="row welcome_inner">
                    <div class="col-lg-6">
                        <div class="welcome_text">
                            <h4>Who Am I?</h4>
                            <p>Describe a little about yourself.</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-database"></i>
                                        <h4 class="counter">89</h4>
                                        <p>Total Something</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-book"></i>
                                        <h4 class="counter">165</h4>
                                        <p>Total Projects</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-users"></i>
                                        <h4 class="counter">365</h4>
                                        <p>Total Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="welcome_right_img">
                            <img src="img/banner/awn1.png" class="img-fluid img-responsive" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Feature Area =================-->
        <section class="feature_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>offerings to my clients</h2>
                    <p>Describe what you do.</p>
                </div>
                <div class="feature_inner row">
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <i class="flaticon-city"></i>
                            <h4>Service One</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi architecto perferendis dignissimos quia, accusamus quasi voluptatem, vel, similique ducimus</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <i class="flaticon-skyline"></i>
                            <h4>Service Two</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi architecto perferendis dignissimos quia, accusamus quasi voluptatem, vel, similique ducimus</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <i class="flaticon-sketch"></i>
                            <h4>Service Three</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi architecto perferendis dignissimos quia, accusamus quasi voluptatem, vel, similique ducimus</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Area =================-->
        
        <!--================Projects Area =================-->
        <section class="projects_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>My Recent Completed Projects</h2>
                    <p>Describe a little about yourself.</p>
                </div>
                <div class="projects_fillter">
                    <ul class="filter list">
                        <li class="active" data-filter="all"><a class="category" href="#" data-id='all'>All Categories</a></li>
                        @foreach($project_categorys as $project_category)
                        <li  data-filter=".category{{$project_category->id}}"><a href="#" data-id='{{$project_category->id}}' class="category">{{$project_category->name}}</a></li>
                        @endforeach
                        <!-- <li data-filter=".work"><a href="#">Category Two </a></li>
                        <li data-filter=".web"><a href="#">Category Three</a></li> -->
                    </ul>
                </div>
                <div class="row" id="project_area">
                    @include('project_data')
                </div>
            </div>
        </section>
        <!--================End Projects Area =================-->
        
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
        
        <!--================Latest Blog Area =================-->
        <section class="latest_blog_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Latest Posts from Blog</h2>
                    <p>Describe something what you want tell about your blog.</p>
                </div>
                <div class="row latest_blog_inner" id="post">
                    
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function($) {
                $.ajax({
                  url: "{{route("gp")}}",
                  type: 'GET',
                  success: function(response){
                    var html='';
                    var html2='';
                    $.each( response ,function(index, v) {
                        var text=v.details;
                        var text_only=$(text).text();
                        if (text_only.length>=50) {
                            var check_text=text_only.substring(50,0)+"...";
                            text_only=check_text;
                        }
                        html+=`<div class="col-lg-4 col-md-6 ">
                                    <div class="l_blog_item">
                                        <div class="l_blog_img">
                                            <img class="img-fluid" src="${v.img}" alt="">
                                        </div>
                                        <div class="l_blog_text">
                                            <div class="date">
                                                <a href="/single_blog/${v.id}">${v.created_at}  |  By Post Writer</a>
                                            </div>
                                            <a href="/single_blog/${v.id}"><h4>${v.title}</h4></a>
                                            <p>${text_only}</p>
                                        </div>
                                    </div>
                                </div>`
                        html2+=``
                    });
                    $('#post').html(html);
                    },
                    error: function(request, status, error){
                    }
                }); 


                $(".filter li ").on('click',function(e){

                    $(".filter li ").removeClass("active");
                    $(this).addClass("active");
                    e.preventDefault();

                    var selector = $(this).attr("data-filter");
                    $(".projects_inner").isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 450,
                            easing: "linear",
                            queue: false,
                        }
                    });
                    return false;
                });
                var category="all";

                $(document).on('click', '.pagination a', function(event){
                  event.preventDefault(); 
                  var page = $(this).attr('href').split('page=')[1];
                  fetch_data(page);
                 });


                 function fetch_data(page)
                 {
                  $.ajax({
                   url:"/pagination/project_fetch_data?page="+page,
                   data:{category:category},
                   success:function(data)
                   {
                    $('#project_area').html(data);
                   }
                  });
                 }
                $('.category').click(function(event) {
                    event.preventDefault();
                   var my_id =$(this).attr('data-id');
                   category=my_id;
                   var page = $(this).attr('href').split('page=')[1];
                   $.ajax({
                          url: "/pagination/project_fetch_data?page="+page,
                          data: { category:my_id},
                          success: function(data){
                            $('#project_area').html(data);
                            },
                            error: function(request, status, error){
                            }
                        });
                });
            });
        </script>
@endsection