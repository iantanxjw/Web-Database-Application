@extends('layouts.master')
@section('title', 'Search')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h2><strong>Advanced Search</strong></h2>
                        {{--http://bootsnipp.com/snippets/qAqE9--}}
                        <form action="" data-toggle="validator">
                            <div class="form-inline required">
                                <div class="form-group has-feedback">
                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="test" value="0" />
                                        </span>

                                        <div class="form-control form-control-static">Title Text Search</div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>

                                </div>
                                <div class="form-group has-feedback ">
                                    <label class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="test" value="1" />
                                        </span>
                                        <div class="form-control form-control-static">Location Text Search</div>
                                        <span class="glyphicon form-control-feedback "></span>
                                    </label>
                                </div>
                            </div>

                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control input-lg" />
                                    <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="button">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">Most Popular Titles With Plot Matching ""</div>
                                <div class="panel-body"></div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection