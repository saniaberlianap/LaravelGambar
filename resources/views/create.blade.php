@extends('parent')

@section('main')

@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div align="right">
	<a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('crud.store') }}" enctype="multipart/form-data">

	@csrf
	<div class="form-group">
		<label class="col-md-4 text-left">Enter First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" class="form-control input-lg">
		</div>
	</div>
	<p>
		<div class="form-group">
			<label class="col-md-4 text-left">Enter Last Name</label>
				<div class="col-md-8">
			<input type="text" name="last_name" class="form-control input-lg">
		</div>
	</div>
	<p>
		<div class="form-group">
			<label class="col-md-4 text-left">Masukkan ID Keluarga</label>
				<div class="col-md-8">
			<input type="text" name="ortu_id" class="form-control input-lg">
		</div>
	</div>
	<p>
		<div class="form-group">
			<label class="col-md-4 text-left">Select Profile Image</label>
				<div class="col-md-8">
					<input type="file" name="image"/>
			</div>
		</div>
		<p>
			<div class="form-group text-center">
				<input type="submit" name="add" class="btn btn-primary input-lg" value="Add">
			</div>
</form>

@endsection