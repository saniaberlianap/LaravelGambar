@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('crud.index') }}" class="btn btn-primary">Back</a>
	</div>
	<p>

<h2>Profile Keluarga</h2>

<h2>___________________________</h2>

<h4>Nama Ayah - {{ $ortu->ayah }}</h4>
<h4>Nama Ibu - {{ $ortu->ibu }}</h4>
<h4>Alamat Keluarga - {{ $ortu->alamat }}</h4>

<table class="table table-bordered table-light">
	<tr>
		<th>Anak Kandung</th>
	</tr>

	@foreach($ortu->crud as $crud)
		<tr>
			<td>{{ $crud->first_name }} {{ $crud->last_name }}</td>
		</tr>
	@endforeach
</table>

</div>

@endsection