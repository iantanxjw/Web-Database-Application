
{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}
{!! Form::hidden('mv_id_array', "123") !!}
{!! Form::hidden('u_id', Auth::user()->id) !!}
<button type="submit" class="btn btn-primary">MOVIE1</button>

{!! Form::close() !!}

{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}

{!! Form::hidden('mv_id_array', "123") !!}
{!! Form::hidden('u_id', '2') !!}
<button type="submit" class="btn btn-primary">MOVIE2</button>

{!! Form::close() !!}

{!! Form::open(array('route' => 'WishlistCRUD.store','method'=>'POST')) !!}

{!! Form::hidden('mv_id_array', "123") !!}
{!! Form::hidden('u_id', '3') !!}
<button type="submit" class="btn btn-primary">MOVIE3</button>

{!! Form::close() !!}