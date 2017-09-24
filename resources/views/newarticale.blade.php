@extends('layouts.main')
@section('Maincontent')

        <div class="col-md-9">
           
                <div class="panel-body">
                    <form class="form-horizontal" e method="POST" action="newArticale" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">content</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="content" name="content" required autofocus rows="6">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image_url" id="image_url" aria-describedby="fileHelp">
                                @if ($errors->has('image_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add New Articale
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       

@endsection
