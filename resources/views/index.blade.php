@extends('layouts.app')



@section('content')



<div align="right">
	<a href="{{ route('crud.create') }}" class="btn btn-success btn-sm">Add</a>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success">
	<p> {{ $message }} </p>
</div>
@endif
<p><br>

	<form class="form-inline my-2 my-lg-0" method="GET" action="/search">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <p>
<table class="table table-bordered table-striped">
	<tr>
		<th width="12%">Image</th>
		<th width="30%">First Name</th>
		<th width="30%">Last Name</th>
		<th width="30%">Orang Tua</th>
		<th width="23%">Option</th>
	</tr>

	@foreach($data as $row)
		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75"/></td>
			<td>{{ $row->first_name }}</td>
			<td>{{ $row->last_name }}</td>
			<td><a href="/ortu/{{$row->ortu_id}}/profile" class="btn btn-default">{{$row->ortu->ayah}}</a></td>
			<td>
				<a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary m-1">Detail</a>
				<a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning m-1">Edit</a>
				<form action="{{ route('crud.destroy', $row->id) }}" method="post">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger m-1">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>
{!! $data->links() !!}
@endsection