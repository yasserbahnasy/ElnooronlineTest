@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="container-fluid">
                      <div class="row content">
                        <div class="col-sm-3 sidenav">
                          <h4>Top 4 Articale Views</h4>
                          <ul class="nav nav-pills nav-stacked">
                          @foreach($topviews as $topviews)
                            <li><a href="/articale/{{$topviews->id}}">{{$topviews->title}}</a></li>
                          @endforeach
                          </ul>
                           
                       
                          <h4>Top 4 Articale likes - Dislikes</h4>
                          <ul class="nav nav-pills nav-stacked">
                          @foreach($toplikes as $toplikes)
                            <li><a href="/articale/{{$toplikes->id}}">{{$toplikes->title}}</a></li>
                          @endforeach
                          </ul>

                          <h4>Top 4 Articale (likes - Dislikes) : Views</h4>
                            <ul class="nav nav-pills nav-stacked">
                            @foreach($Percentage as $Percentage)
                              <li><a href="/articale/{{$Percentage->id}}">{{($Percentage->title)}}</a></li>
                            @endforeach
                            </ul>
                            
                        </div>

                        <div class="col-sm-9">
                          <h4><small>RECENT POSTS</small></h4>
                          <hr>
                          @foreach($Articale as $Articale)
                          <h2><a href="/articale/{{$Articale->id}}">{{$Articale->title}}</a></h2>
                          <h5><span class="glyphicon glyphicon-time"></span> Post by {{$Articale->User->name}}, {{date('d-m-Y', strtotime($Articale->created_at))}}.</h5>
                          
                          <div class="clearfix">
                          <a href="/articale/{{$Articale->id}}"><img src="images/{{$Articale->image_url}}" class="img-thumbnail pull-left" alt="..." width="304" height="236"></a>
                          

                          <div class="col-md-offset-5">
                          <p>
                          {{@substr($Articale->content,0,250).' ...'}}
                          </p>
                          <a href="/articale/{{$Articale->id}}"><button type="button" class="btn btn-default">Read More</button></a>
                          
                          </div>
                          </div>
                          <hr>
                          @endforeach
                         
                          
                        </div>

                      </div>
                    </div>

                    <footer class="container-fluid">
                      <p>Yasser Bahnasy</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
