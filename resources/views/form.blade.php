@extends('app')

@section('content')
	<div class="row">
		<div class="col-sm-4-col-sm-offset-4">
			<h1 id="addPhotosHeader">Add photos</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<form class="form" action="{{ url('/create') }}" method="POST" enctype="multipart/form-data" onsubmit="showUploadText()">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<input class="form-control" type="file" name="photos[]" multiple="true">
				</div>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		var header = document.getElementById('addPhotosHeader');

		function showUploadText () {
			header.innerHTML = 'Uploading images...';
		}
	</script>
@endSection