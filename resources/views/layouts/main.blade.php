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
                          <h4>Yasser's Blog</h4>
                          <ul class="nav nav-pills nav-stacked">
                            <li><a href="../department/1">Sports</a></li>
                            <li><a href="../department/2">News</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">PRIVACY POLICY</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">About</a></li>
                          </ul><br>
                           <form method="get" action="../searchQuery" enctype="multipart/form-data">
                              <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Search Keyword.." name="word" value="{{ isset($word) ? $word:'' }}">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                      <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                  </span>  
                              </div>
                           </form>
                        </div>

                        @yield('Maincontent')

                      </div>
                    </div>

                    <footer class="container-fluid">
                      <p>Develop By Yasser Bahnasy</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
