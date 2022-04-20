@extends("frame")

@section("content")
	<header>
		<h2>"식단, 어떻게 짜야 하나요??" <br> <strong>diet 사용자들과 식단 정보를 공유하며</strong><br>나만의 식단을 만들어봐요!</h2>
	</header>
	<div class="row aln-center">
		<div class="col-4 col-6-medium col-12-small">
			<!-- Feature -->
			<section>
				<a href="{{ route("meal.view")}}" class="image featured"><img src="/images/list.png" alt="" /></a>
				<header>
					<h3>diet 사용자들과 식단 정보를 공유</h3>
				</header>
				<p>식단 정보를 <strong>diet 사용자들과</strong> 공유하며, 서로 다양한 식단 정보를 얻고 정보를 주며,
					다양한 식단으로 <strong>다이어트</strong>를 쉽고 즐겁게!</p>
			</section>

		</div>
		<div class="col-4 col-6-medium col-12-small">

			<!-- Feature -->
			<section>
				<a href="{{route("users.detail",empty(Auth::user()->id) ? 0 : Auth::user()->id)}}" class="image featured"><img src="/images/mypage.png" alt="" /></a>
				<header>
					<h3>나의 하루 한끼 영양분 정보</h3>
				</header>
				<p>사용자의 신체정보와 활동량을 계산해 <br><strong>한끼당 권장 섭취 영양분</strong> 을 보여줍니다.
					한끼 권장 섭취 영양분을 고려해 <strong>나만의 식단</strong>을 만들고 공유해봐요!</p>
			</section>

		</div>
		<div class="col-4 col-6-medium col-12-small">

			<!-- Feature -->
			<section>
				<a href="{{"meal.make"}}" class="image featured"><img src="/images/make.png" alt="" /></a>
				<header>
					<h3>나만의 식단 만들기</h3>
				</header>
				<p>계산된 <strong>권장 섭취 영양분</strong>를 고려해 나만의 식단을 만들기,
					음식당 영양분을 보여주고 총 식단의 영양분 정보를 <strong>한눈의 보기 편하게</strong> 계산해줍니다.</p>
			</section>

		</div>
	</div>


@endsection
@section('script')
	<script>
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("diet Main");
			$("title").text("diet Main");

			@if(Session::has("message"))
				swal({
					type: "{{Session::get("type")}}",
					title: "{{Session::get("message")}}",
					button: '확인',
				});
			@endif

		});
	</script>
@endsection
