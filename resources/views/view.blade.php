@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-primary">Back</a>
	</div>
	<p>

<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail"/>
<h3>First Name - {{ $data->first_name }}</h3>
<h3>Last Name - {{ $data->last_name }}</h3>
<h3>________________________________</h3>
<h4>Father's name - {{$data->ortu->ayah}}</h4>
<h4>Mother's name - {{$data->ortu->ibu}}</h4>
<h4>Address - {{$data->ortu->alamat}}</h4>

</div>

@endsection