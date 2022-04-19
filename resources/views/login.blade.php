@extends("frame")

@section("content")
	<div class="row aln-center">
		<div class="col-6 col-6-medium col-12-small">

			<!-- Feature -->
			<section>
				<form method="get" action="{{route("login")}}">
					<div class="row gtr-50">
						<div class="col-12 col-12-small">
							<input name="email" placeholder="email" type="text" />
						</div>
						<div class="col-12 col-12-small">
							<input name="password" placeholder="password" type="password" />
						</div>
						<div class="col-6">
							<button class="form-button-submit button icon solid fa-envelope">login</button>
						</div>
						<div class="col-6">
							<a href="{{route("join")}}" class="form-button-submit button icon solid fa-envelope">join</a>
						</div>
					</div>
				</form>
			</section>

		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("login");
			$("title").text("login");

		});
		@if(Session::has("message"))
			swal({
				type: "{{Session::get("type")}}",
				title: "{{Session::get("message")}}",
				button: '확인',
			});
		@endif
	</script>
@endsection
