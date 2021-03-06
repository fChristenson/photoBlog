@extends('app')
@section('content')
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h1>Day {{ $day or '1'}}</h1>
		</div>
	</div>
	@include('pagination')
	<div class="row">
		@if ($pages < 1)
			<div class="col-sm-4 col-sm-offset-4">
				<h1>The blog is empty :(</h1>
			</div>
		@else
			@for ($i = 0; $i < count($images); $i++)
				<div class="col-xs-12 col-sm-4">
					<a href="/images/{{ $images[$i]->name }}" class="thumbnail">
						<img src="<?=Croppa::url("/images/" . $images[$i]->name, 320, 320)?>" alt="image">
					</a>
				</div>
			@endfor
		@endif
	</div>
	@include('pagination')
@endSection