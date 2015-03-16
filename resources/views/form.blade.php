@extends('app')

@section('content')
	<div class="row">
		<div class="col-sm-4-col-sm-offset-4">
			<h1>Add photos</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<form class="form" action="{{ url('/create') }}" method="POST" enctype="multipart/form-data" files="true">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<input class="form-control" type="file" name="photo" multiple="true">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
@endSection