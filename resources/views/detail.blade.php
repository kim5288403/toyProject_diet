<!DOCTYPE HTML>

<!--
	Strongly Typed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>No Sidebar - Strongly Typed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<style>
			div[class="suggest_nutrition"]{
				display: flex;
			}
			span[class="date"]{
				background-color: #ed786a !important;
			}
			div[id="content"]{
				border-radius: 1.25rem;
				border: 2px solid #cccccc;
				text-align: center;
			}
		</style>
	</head>
	<body class="no-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="{{route("index")}}">My page</a></h1>
							<p>A responsive HTML5 site template. Manufactured by HTML5 UP.</p>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="{{route("index")}}"><span>main</span></a></li>
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
									<li><a class="icon solid fa-cog" href="{{route("food.data")}}"><span>Left Sidebar</span></a></li>
									<li><a class="icon solid fa-retweet" href="right-sidebar.html"><span>Right Sidebar</span></a></li>
									<li><a class="icon solid fa-sitemap" href="{{route("users.detail",empty(Auth::user()->id) ? 0 : Auth::user()->id)}}"><span>my page</span></a></li>
								</ul>
							</nav>

					</div>
				</section>

			<!-- Main -->
			<section id="main">
				<div class="container">
					<div class="row">

						<!-- Content -->
						<div id="content" class="col-8 col-12-medium">
							<!-- Post -->
							<article class="box post">
								<header>
									<h2 style="margin-right: 7%"><strong>내 정보</strong></h2>
									<form id="join" method="post" action="">
										<div class="row gtr-50" >
											<div class="col-11 col-12-small">
												<label style="text-align: left">email</label>
												<input name="email" placeholder="email" type="text" value="{{$info->email}}" readonly/>
											</div>
											<div class="col-11 col-12-small">
												<label style="text-align: left">phone</label>
												<input name="phone" placeholder="phone" type="text" value="{{$info->phone}}" readonly/>
											</div>
											<div class="col-6 col-12-small">
												<label style="text-align: left">name</label>
												<input name="name" placeholder="name" type="text" value="{{$info->name}}" readonly/>
											</div>
											<div class="col-5 col-12-small">
												<label style="text-align: left">age</label>
												<input name="age" placeholder="age" type="text" value="{{$info->age}}" readonly/>
											</div>
											<div class="col-6 col-12-small">
												<label style="text-align: left">weight</label>
												<input name="weight" placeholder="weight" type="text" value="{{$info->weight}}" readonly/>
											</div>
											<div class="col-5 col-12-small">
												<label style="text-align: left">height</label>
												<input name="height" placeholder="height" type="text"value="{{$info->height}}" readonly/>
											</div>
											<div class="col-6 col-12-small">
												<label style="text-align: left">exercise_time</label>
												<select name="exercise_time">
													@foreach(getExerciseType() as $key=>$val)
														@if($key === $info->exercise_time)
															<option value="{{$key}}" selected>{{$val}}</option>
														@endif
													@endforeach
												</select>
											</div>
											<div class="col-5 col-12-small">
												<label style="text-align: left">gender</label>
												<select name="gender" >
												@foreach(getGender() as $key=>$val)
													@if($key === $info->gender)
															<option value="{{$key}}" selected>{{$val}}</option>
														@endif
													@endforeach
												</select>
											</div>
										</div>
									</form>
								</header>
							</article>
						</div>

						<!-- Sidebar -->
						<div id="sidebar" class="col-4 col-12-medium">

							<!-- Excerpts -->
							<section>
								<ul class="divided">
									<li>

										<!-- Excerpt -->
										<article class="box excerpt">
											<span class="date">칼로리 정보</span>
											<div class="suggest_nutrition">
												<h3>하루 사용하는 칼로리(tdee) : {{$info["suggest_nutrition"]->tdee}}</h3><span>cal</span>
											</div>
											<div class="suggest_nutrition">
												<h3>하루 기초 대사량 : {{$info["suggest_nutrition"]->basal_metabolism}}</h3><span>cal</span>
											</div>
										</article>

									</li>
									<li>
										<!-- Excerpt -->
										<article class="box excerpt">
											<span class="date">하루 권장 영양 정보</span>
											<div class="suggest_nutrition">
												<h3>지방(fat) : {{$info["suggest_nutrition"]->fat}}</h3><span>g</span>
											</div>
											<div class="suggest_nutrition">
												<h3>단백질(protein) : {{$info["suggest_nutrition"]->protein}}</h3><span>g</span>
											</div>
											<div class="suggest_nutrition">
												<h3>탄수화물(carbohydrate) : {{$info["suggest_nutrition"]->carbohydrate}}</h3><span>g</span>
											</div>
											<div class="suggest_nutrition">
												<h3>칼로리(calory) : {{$info["suggest_nutrition"]->calory}}</h3><span>cal</span>
											</div>
										</article>
									</li>
									<li>

										<!-- Excerpt -->
										<article class="box excerpt">
											<button id="meal_make_button">식단 만들기</button>
										</article>

									</li>
								</ul>
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
							<div class="col-6 col-12-medium">
								<section>
									<form method="post" action="#">
										<div class="row gtr-50">
											<div class="col-6 col-12-small">
												<input name="name" placeholder="Name" type="text" />
											</div>
											<div class="col-6 col-12-small">
												<input name="email" placeholder="Email" type="text" />
											</div>
											<div class="col-12">
												<textarea name="message" placeholder="Message"></textarea>
											</div>
											<div class="col-12">
												<a href="#" class="form-button-submit button icon solid fa-envelope">Send Message</a>
											</div>
										</div>
									</form>
								</section>
							</div>
							<div class="col-6 col-12-medium">
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

	</body>
</html>