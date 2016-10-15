<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Search</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Form::radio('type', 'movie', true) }} {{-- movie is the default selected option --}}
<<<<<<< HEAD
                        {{ Form::label('movie', 'Search by Movie') }}
                        {{ Form::radio('type', 'location') }}
                        {{ Form::label('location', 'Search by Location') }}
=======
                        {{ Form::label('movie', 'Search by Movie:') }}
                        {{ Form::radio('type', 'location') }}
                        {{ Form::label('location', 'Search by Location:') }}
>>>>>>> 0a2b886e9a2bf1c89c7067150d63110af1f09b58
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Form::text('search', null, ['placeholder' => 'Search...', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>