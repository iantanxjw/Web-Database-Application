
{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}

{!! Form::hidden('movie', "MOVIE1") !!}
{!! Form::hidden('email', Auth::user()->email) !!}
<button type="submit" class="btn btn-primary">MOVIE1</button>

{!! Form::close() !!}

{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}

{!! Form::hidden('movie', "MOVIE2") !!}
{!! Form::hidden('email', 'POOPER') !!}
<button type="submit" class="btn btn-primary">MOVIE2</button>

{!! Form::close() !!}

{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}

{!! Form::hidden('movie', "MOVIE3") !!}
{!! Form::hidden('email', 'NOT YOU') !!}
<button type="submit" class="btn btn-primary">MOVIE3</button>

{!! Form::close() !!}