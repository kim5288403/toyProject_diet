@extends("frame")

@section("content")
	<div class="row aln-center">
		<div class="col-6 col-6-medium col-12-small">

			<!-- Feature -->
			<section>
				<form id="join" method="post" action="{{route('store')}}">
					@csrf
					<div class="row gtr-50" >
						<div class="col-12 col-12-small">
							<label style="text-align: left">email</label>
							<input name="email" placeholder="email" type="text" />
						</div>
						<div class="col-12 col-12-small">
							<label style="text-align: left">password</label>
							<input name="password" placeholder="password" type="password" />
						</div>
						<div class="col-12 col-12-small">
							<label style="text-align: left">phone</label>
							<input name="phone" placeholder="phone" type="text" />
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">name</label>
							<input name="name" placeholder="name" type="text" />
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">age</label>
							<input name="age" placeholder="age" type="text" />
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">weight</label>
							<input name="weight" placeholder="weight" type="text" />
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">height</label>
							<input name="height" placeholder="height" type="text" />
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">gender</label>
							<select name="gender" >
								<option value="">select</option>
								<option value="male">male</option>
								<option value="female">female</option>
							</select>
						</div>
						<div class="col-6 col-12-small">
							<label style="text-align: left">exercise_time</label>
							<select name="exercise_time" >
								<option value="">select</option>
								<option value="1.2">운동을 하지않는다</option>
								<option value="1.375">가끔 운동(1주일 1-3회 운동)</option>
								<option value="1.55">주로 운동(1주일 3-5회 운동)</option>
								<option value="1.725">매일 운동(1주일 5-7회 운동)</option>
								<option value="1.9">격렬한 운동(강한 강도로 1주일 매일 운동)</option>
							</select>
						</div>
						<div class="col-12">
							<a id="store_button" style="width: 100%" class="form-button-submit button icon solid fa-envelope">join</a>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
@endsection
@section("script")
	<script type="text/javascript">
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("join");
			$("title").text("join");

			@if(Session::has("message"))
				swal({
					type: "{{Session::get("type")}}",
					title: "{{Session::get("message")}}",
					button: '확인',
				});
			@endif

		});

		$("#store_button").on("click",function () {
			//input null 검사
			let inputs = $("form[id='join']").find("input");
			for (let i = 0; i < inputs.length; i++){
				if(inputs[i].value === ""){
					swal({
						type: 'warning',
						title: inputs[i].name + " 입력해주세요.",
						button: '확인',
					});
					return false;
				}
			}
			//selects null 검사
			let selects = $("form[id='join']").find("select");
			for (let i = 0; i < selects.length; i++){
				if(selects[i].value === ""){
					swal({
						type: 'warning',
						title: selects[i].name + " 입력해주세요.",
						button: '확인',
					});
					return false;
				}
			}
			//비밀번호 정규식
			if(!$("input[name='password']").val().match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/)){
				swal({
					type: 'warning',
					title: "비밀번호 : 최소 8 자, 하나 이상의 문자, 하나의 숫자 및 하나의 특수 문자로 입력해주세요.",
					button: '확인',
				});
				return false;
			}
			//핸드폰번호 정규식
			if(!$("input[name='phone']").val().match(/^\d{3}-\d{4}-\d{4}$/)){
				swal({
					type: 'warning',
					title: "핸드폰번호 : 010-****-**** 형식으로 입력해주세요.",
					button: '확인',
				});
				return false;
			}
			//이름 정규식
			if(!$("input[name='name']").val().match( /^[가-힣]+$/ )){
				swal({
					type: 'warning',
					title: "이름 : 한글만 입력해주세요",
					button: '확인',
				});
				return false;
			}
			//나이 정규식
			if(!$("input[name='age']").val().match( /^[0-9]{1,3}$/ )){
				swal({
					type: 'warning',
					title: "나이 : 3자리 미만 숫자만 입력해주세요",
					button: '확인',
				});
				return false;
			}
			//몸무게 정규식
			if(!$("input[name='weight']").val().match( /^[0-9]{1,3}$/ )){
				swal({
					type: 'warning',
					title: "몸무게 :3자리 미만 숫자만 입력해주세요",
					button: '확인',
				});
				return false;
			}
			//키 정규식
			if(!$("input[name='height']").val().match( /^[0-9]{1,3}$/ )){
				swal({
					type: 'warning',
					title: "키 : 3자리 미만 숫자만 입력해주세요",
					button: '확인',
				});
				return false;
			}
			$("form[id='join']").submit();
		});

	</script>
@endsection
