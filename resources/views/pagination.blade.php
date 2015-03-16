<div class="row">
	<div class="col-xs-12 text-center">
		@if (isset($day))
			<ul class="pagination">
				<li>
					@if ($day - 1 <= 0)
						<a href="#"><i class="glyphicon glyphicon-chevron-left"></i></a>
					@else
						<a href="/day/{{ $day - 1 }}"><i class="glyphicon glyphicon-chevron-left"></i></a>
					@endif
				</li>
				@for ($i = 1; $i <= $pages; $i++)
					@if ($i == $day)
						<li class="active"><a href="/day/{{ $i }}">{{$i}}</a></li>
					@else
						<li><a href="/day/{{ $i }}">{{$i}}</a></li>
					@endif
				@endfor
				<li>
					@if ($day + 1 > $pages)
						<a href="#"><i class="glyphicon glyphicon-chevron-right"></i></a>
					@else
						<a href="/day/{{ $day + 1 }}"><i class="glyphicon glyphicon-chevron-right"></i></a>
					@endif
				</li>
			</ul>
		@endif
	</div>
</div>