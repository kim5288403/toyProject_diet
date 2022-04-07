<!DOCTYPE HTML>
<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>join</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.html">join</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.html"><span>Introduction</span></a></li>
									<li>
										<a href="#" class="icon fa-chart-bar"><span>Dropdown</span></a>
										<ul>
											<li><a href="#">Lorem ipsum dolor</a></li>
											<li><a href="#">Magna phasellus</a></li>
											<li><a href="#">Etiam dolore nisl</a></li>
											<li>
												<a href="#">Phasellus consequat</a>
												<ul>
													<li><a href="#">Magna phasellus</a></li>
													<li><a href="#">Etiam dolore nisl</a></li>
													<li><a href="#">Phasellus consequat</a></li>
												</ul>
											</li>
											<li><a href="#">Veroeros feugiat</a></li>
										</ul>
									</li>
									<li><a class="icon solid fa-cog" href="left-sidebar.html"><span>Left Sidebar</span></a></li>
									<li><a class="icon solid fa-retweet" href="right-sidebar.html"><span>Right Sidebar</span></a></li>
									<li><a class="icon solid fa-sitemap" href="{{route("users.detail")}}"><span>my page</span></a></li>
								</ul>
							</nav>

					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
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
														<option value="남자">male</option>
														<option value="여자">female</option>
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
					</div>
				</section>

			<!-- Footer -->
				<section id="footer">
					<div class="container">
						<header>
							<h2>Questions or comments? <strong>Get in touch:</strong></h2>
						</header>
						<div class="row">
							<div class="col-12 col-12-medium">
								<section>
									<p>Erat lorem ipsum veroeros consequat magna tempus lorem ipsum consequat Phaselamet
									mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique. Curabitur
									leo nibh, rutrum eu malesuada.</p>
									<div class="row">
										<div class="col-6 col-12-small">
											<ul class="icons">
												<li class="icon solid fa-home">
													1234 Somewhere Road<br />
													Nashville, TN 00000<br />
													USA
												</li>
												<li class="icon solid fa-phone">
													(000) 000-0000
												</li>
												<li class="icon solid fa-envelope">
													<a href="#">info@untitled.tld</a>
												</li>
											</ul>
										</div>
										<div class="col-6 col-12-small">
											<ul class="icons">
												<li class="icon brands fa-twitter">
													<a href="#">@untitled</a>
												</li>
												<li class="icon brands fa-instagram">
													<a href="#">instagram.com/untitled</a>
												</li>
												<li class="icon brands fa-dribbble">
													<a href="#">dribbble.com/untitled</a>
												</li>
												<li class="icon brands fa-facebook-f">
													<a href="#">facebook.com/untitled</a>
												</li>
											</ul>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="links">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</section>

		</div>
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
		<link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
		<script type="text/javascript">
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
	</body>
</html>