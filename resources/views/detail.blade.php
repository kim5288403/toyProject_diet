@extends("frame")
@section("content")
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
										<h3>하루 사용하는 칼로리(tdee) : <span class="tdee">{{$info["suggest_nutrition"]->tdee}}</span></h3><span>cal</span>
									</div>
									<div class="suggest_nutrition">
										<h3>하루 기초 대사량 : <span class="basal_metabolism">{{$info["suggest_nutrition"]->basal_metabolism}}</span></h3><span>cal</span>
									</div>
								</article>

							</li>
							<li>
								<!-- Excerpt -->
								<article class="box excerpt">
									<span class="date">하루 권장 영양 정보</span>
									<div class="suggest_nutrition">
										<h3>지방(fat) : <span class="fat">{{$info["suggest_nutrition"]->fat}}</span></h3><span>g</span>
									</div>
									<div class="suggest_nutrition">
										<h3>단백질(protein) : <span class="protein">{{$info["suggest_nutrition"]->protein}}</span></h3><span>g</span>
									</div>
									<div class="suggest_nutrition">
										<h3>탄수화물(carbohydrate) : <span class="carbohydrate">{{$info["suggest_nutrition"]->carbohydrate}}</span></h3><span>g</span>
									</div>
									<div class="suggest_nutrition">
										<h3>칼로리(calory) : <span class="calory">{{$info["suggest_nutrition"]->calory}}</span></h3><span>cal</span>
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

@endsection
@section("css")
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
@endsection
@section("script")
	<script>
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("MY PAGE");
			$("title").text("MY PAGE");



			let protein = "{!! $info["suggest_nutrition"]->protein !!}";
			let fat = "{!! $info["suggest_nutrition"]->fat !!}";
			let carbohydrate = "{!! $info["suggest_nutrition"]->carbohydrate !!}";
			let calory = "{!! $info["suggest_nutrition"]->calory !!}";
			let tdee = "{!! $info["suggest_nutrition"]->tdee !!}";
			let basal_metabolism = "{!! $info["suggest_nutrition"]->basal_metabolism !!}";

			$({ val : 0 }).animate({ protein : protein , fat : fat , carbohydrate : carbohydrate , calory : calory , basal_metabolism : basal_metabolism , tdee : tdee}, {
				duration: 1000,
				step: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let caloryNum = Math.floor(this.calory).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let tdeeNum = Math.floor(this.tdee).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let basal_metabolismNum = Math.floor(this.basal_metabolism).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(caloryNum);
					$("span[class='calory']").text(carbohydrateNum);
					$("span[class='tdee']").text(tdeeNum);
					$("span[class='basal_metabolism']").text(basal_metabolismNum);
				},
				complete: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let caloryNum = Math.floor(this.calory).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let tdeeNum = Math.floor(this.tdee).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let basal_metabolismNum = Math.floor(this.basal_metabolism).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(caloryNum);
					$("span[class='calory']").text(carbohydrateNum);
					$("span[class='tdee']").text(tdeeNum);
					$("span[class='basal_metabolism']").text(basal_metabolismNum);
				}
			});
		});
	</script>
@endsection
