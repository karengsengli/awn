@extends('user_template')
@section('content')
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Blog</h2>
                        <div class="page_link">
                            <a href="/">Home</a>
                            <a href="/blog">Blog</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" >
                        <div class="blog_left_sidebar"  >
                            <div class="blog_left_sidebar" id="post_area" >
                            @include('presult')
                            </div>
                         </div>   
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                                <h4>Mr Aung Win Naing</h4>
                                <p>About You</p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat tempore maxime, harum autem repellat ipsam totam consectetur, voluptatibus sed animi voluptate nihil saepe, nesciunt aperiam veniam pariatur. Odio, nisi doloribus.</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget" id="top_post">
                                
                                <!-- <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Post Title</h3></a>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post2.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Post Title</h3></a>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post3.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Post Title</h3></a>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="img/blog/popular-post/post4.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html"><h3>Post Title</h3></a>
                                    </div>
                                </div> -->
                                
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <a href="" class="d-flex justify-content-between category " data-id='all'>
                                            <p>All </p>
                                            <p>{{$count}}</p>
                                        </a>
                                    </li>
                                    @foreach($categorys as $category)
                                    <li>
                                        <a href="" class="d-flex justify-content-between category " data-id='{{$category->id}}'>
                                            <p>{{$category->name}}</p>
                                            <p>{{$category->blog_post->count()}}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                                                                        
                                </ul>
                                <div class="br"></div>
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
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" name="email" >
                                    </div>
                                    
                                    <a href="#" class="bbtns" id="save">Subcribe</a>
                                    
                                </div>  
                                <p class="text-bottom" id="newstext">You can unsubscribe at any time</p>  
                                <div class="br"></div>                          
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    <script type="text/javascript">

    

    /*$(window).on('hashchange', function() {

        if (window.location.hash) {

            var page = window.location.hash.replace('#', '');

            if (page == Number.NaN || page <= 0) {

                return false;

            }else{

                getData(page);

            }

        }

    });*/

    

    $(document).ready(function()

    {
        var category="all";

        $(document).on('click', '.pagination a', function(event){
          event.preventDefault(); 
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page);
         });


         function fetch_data(page)
         {
          $.ajax({
           url:"/pagination/fetch_data?page="+page,
           data:{category:category},
           success:function(data)
           {
            $('#post_area').html(data);
           }
          });
         }
        $('.category').click(function(event) {
            event.preventDefault();
           var my_id =$(this).attr('data-id');
           category=my_id;
           var page = $(this).attr('href').split('page=')[1];
           $.ajax({
                  url: "/pagination/fetch_data?page="+page,
                  data: { category:my_id},
                  success: function(data){
                    $('#post_area').html(data);
                    },
                    error: function(request, status, error){
                    }
                });
        });
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

        $('#save').click(function(event) {
                event.preventDefault();
                var email=$('#email').val();
                if (email=='') {

                }
                else{
                     $.ajax({
                         type: "POST",
                         url: "/newsletters",
                         data: { "_token": "{{ csrf_token() }}", email: email} ,
                         success: function(response){
                            if (response[0]=='You already subscribe') {
                                
                                $('#unsubscribe').modal('show');
                                $('#news_email').text(response[2]);
                                $('#my_news_id').val(response[1]);

                            }
                            else{
                                $('#email').val('');
                                $('#subscribe').modal('show');
                            }
                            $('#newstext').text(response[0]);
                         },
                         error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('#newstext').text('please check your email');
                          }
                 });

                }
                
            });
        

       /* $(document).on('click', '.pagination a',function(event)

        {

            event.preventDefault();

  

            $('li').removeClass('active');

            $(this).parent('li').addClass('active');

  

            var myurl = $(this).attr('href');

            var page=$(this).attr('href').split('page=')[1];

  

            getData(page);

        });*/

  

    });

  

    /*function getData(page){

        $.ajax(

        {

            url: '?page=' + page,

            type: "get",

            datatype: "html"

        }).done(function(data){

            $("#post_area").empty().html(data);
            location.hash = page;

        }).fail(function(jqXHR, ajaxOptions, thrownError){

              alert('No response from server');

        });

    }*/
    

</script>

@endsection