@extends('user_template')
@section('content')        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Portfolio</h2>
                        <div class="page_link">
                            <a href="/">Home</a>
                            <a href="/portfolio">Portfolio</a>
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
                                        <h4>Some</h4>
                                        <p>Total Something</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-book"></i>
                                        <h4>1465</h4>
                                        <p>Total Projects</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-users"></i>
                                        <h4>3965</h4>
                                        <p>Total Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="welcome_right_img">
                            <img src="img/banner/awn1.png" class="img-responsive ml-lg-5" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->
        
        <!--================Projects Area =================-->
        <section class="projects_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>My Recent Completed Projects</h2>
                    <p>Describe a little about your projects.</p>
                </div>
                <div class="projects_fillter">
                    <ul class="filter list">
                        <li class="active" data-filter="all"><a class="category" href="#" data-id='all'>All Categories</a></li>
                        @foreach($project_categorys as $project_category)
                        <li  data-filter=".category{{$project_category->id}}"><a href="#" data-id='{{$project_category->id}}' class="category">{{$project_category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class=" row" id="project_area">
                    @include('project_data')
                </div>
            </div>
        </section>
        <!--================End Projects Area =================-->
        <script type="text/javascript">
            $(document).ready(function($) {

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