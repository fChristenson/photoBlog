@extends('app')
@section('content');
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h1 id="header">Theme</h1>
		</div>
	</div>
	<div class="row">
		<h2>
			How about <span id="suggestion">Landscape</span> ?
		</h2>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<button id="themeBtn" class="btn btn-primary" onclick="getTheme()">Get random category</button>
		</div>
	</div>
	<script type="text/javascript">
		var suggestion = document.getElementById('suggestion'),
				themes = [
					'Landscape',
					'Shadows',
					'People',
					'Buildings',
					'Products',
					'Food',
					'Animals',
					'City life',
					'Boats',
					'Cars',
					'Travel'
				];

			function getTheme () {
				var index = Math.floor(Math.random() * themes.length);
				suggestion.innerHTML = themes[index];
			}
	</script>
@endSection