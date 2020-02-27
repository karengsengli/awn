

        @foreach ($data as $value)

        <article class="row blog_item">
         <div class="col-md-3">
             <div class="blog_info text-right">
                <ul class="blog_meta list">
                    <li>Post Writer<i class="lnr lnr-user"></i></li>
                    <li>{{$value->created_at}}<i class="lnr lnr-calendar-full"></i></li>
                    <li>{{$value->view}} Views<i class="lnr lnr-eye"></i></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="blog_post">
                <img src="{{$value->img}}" alt="">
                <div class="blog_details">
                    <a href="/single_blog/{{$value->id}}"><h2>{{$value->title}}</h2></a>
                    <p>{!!str_limit($value->details, 250)!!}</p>
                    <a href="/single_blog/{{$value->id}}" class="blog_btn">View More</a>
                </div>
            </div>
        </div>
    </article>
    @endforeach
    <div class="float-right">{!! $data->links() !!}</div>

