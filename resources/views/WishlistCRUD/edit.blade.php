
{!! Form::model($wishlist, ['method' => 'PATCH','route' => ['WishlistCRUD.update', $wishlist->id]]) !!}

{!! Form::text('movie', $wishlist->movie,[ 'readonly' => 'true']) !!}
{!! Form::text('reason', null) !!}
<button type="submit" class="btn btn-primary">EDIT IT</button>

{!! Form::close() !!}