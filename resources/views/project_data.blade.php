@foreach ($projects as $value)
<div class="col-lg-4 col-sm-6 brand web">
    <div class="projects_item">
        <img class="img-fluid" src="{{$value->img}}" alt="">
        <div class="projects_text">
            <a href="/portfolio_detail/{{$value->id}}"><h4>{{$value->title}}</h4></a>
            <p>{{$value->client}}</p>
        </div>
    </div>
</div>
@endforeach
 <div class="float-right">{!! $projects->links() !!}</div>