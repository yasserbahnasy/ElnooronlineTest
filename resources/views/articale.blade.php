@extends('layouts.main')

@section('Maincontent')
    <div class="col-sm-9">
      
      <h2>{{$Articale->title}}</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by {{$Articale->User->name}}, {{date('d-m-Y', strtotime($Articale->created_at))}}.</h5>
      
    @if (Auth::user())
        @if($Articale->user_id == Auth::user()->id )
        <h5><span class="label label-danger"><a href="/">Edit</a></span> <span class="label label-danger"><a href="/">Delete</a></span></h5>
        @endif
    @endif
      <div class="clearfix">
      <img src="../images/{{$Articale->image_url}}" class="img-rounded" alt="Responsive image" width="100%">
      </div>
      <br>
      <p>{{$Articale->content}}.</p>
      <hr>
    @if (Auth::user())
            @if($type == 1)
                You Choice A like Bottom
            @elseif($type == 2)
                You Choice A Dislike Bottom
            @else
                Please Choice Like Or Dislike
            @endif
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <form class="form-horizontal" id="form1" name="form1" e method="POST" action="javascript:avoid(0);" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div id="divider"><p></p></div>
                       
                        <button type="submit" onclick="addLike({{$Articale->id}})" class="btn btn-primary">
                            Like
                        </button>
                      
                        <button type="submit" onclick="addDisLike({{$Articale->id}})" class="btn btn-primary">
                            Dislike
                        </button>
                    </form>
                </div>
            </div>
        
    @endif
    
      </div>
    </div>
@endsection