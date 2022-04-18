@extends("frame")
@section("content")
	<div class="row">
		<!-- Sidebar -->
		<div id="sidebar" class="col-4 col-12-medium">

			<!-- Excerpts -->
			<section>
				<ul class="divided">
					<li>
						<!-- Excerpt -->
						<article class="box excerpt">
							<header>
								<span class="date">고기</span>
							</header>
							<div class="food" id="meat">
							</div>
						</article>
					</li>
					<li>
						<!-- Excerpt -->
						<article class="box excerpt">
							<header>
								<span class="date">채소</span>
							</header>
							<div class="food" id="vegetable">
							</div>
						</article>
					</li>
					<li>
						<!-- Excerpt -->
						<article class="box excerpt">
							<header>
								<span class="date">밥</span>
							</header>
							<div class="food" id="rice">
							</div>
						</article>
					</li>
					<li>
						<!-- Excerpt -->
						<article class="box excerpt">
							<header>
								<span class="date">견과</span>
							</header>
							<div class="food" id="nut">
							</div>
						</article>
					</li>
					<li>
						<!-- Excerpt -->
						<article class="box excerpt">
							<header>
								<span class="date">과일</span>
							</header>
							<div class="food" id="fruit">
							</div>
						</article>
					</li>
				</ul>
			</section>
		</div>

		<!-- Content -->
		<div id="content" class="col-8 col-12-medium imp-medium">

			<!-- Post -->
			<article class="box post">
					<header>
						<h2>나만의 <strong>식단 </strong>만들기</h2>
					</header>
					<div class="meal">
						<div class="meat">
						</div>
						<div class="vegetable">
						</div>
						<div class="nut">
						</div>
						<div class="fruit">
						</div>
						<div class="rice">
						</div>
					</div>
					<div class="nutrition">
						<div>
							<h3>(fat) : <span class="fat">0</span></h3><span>g</span>
						</div>
						<div>
							<h3>(protein) : <span class="protein">0</span></h3><span>g</span>
						</div>
						<div>
							<h3>(carbohydrate) : <span class="carbohydrate">0</span></h3><span>g</span>
						</div>
						<div>
							<h3>(calory) : <span class="calory">0</span></h3><span>cal</span>
						</div>
					</div>
				<form id="create" method="post" action="">
					<div class="row gtr-50" >
						<div class="col-12 col-12-small">
							<label style="text-align: left">title</label>
							<input name="Title" placeholder="Title" type="text" value=""/>
						</div>
						<div class="col-12 col-12-small">
							<label style="text-align: left">HashTag</label>
							<input name="HashTag" placeholder="HashTag" type="text" value=""/>
						</div>
						<input class="hide" name="food_id">
						<input class="hide" name="calorie">
						<input class="hide" name="fat">
						<input class="hide" name="protein">
						<input class="hide" name="carbohydrate">
						<div class="col-12 col-12-small">
							<button type="button" class="form-button-submit button icon solid fa-envelope">식단 만들기</button>
						</div>
					</div>
				</form>
			</article>
		</div>

	</div>
@endsection
@section("css")
	<style>
		.food_image img{
			width: 70px;
		}
		.food_image p{
			height: 0px;
		}
		.food_image{
			border: 1px solid #cccccc;
			border-radius: 1.25rem;
			width: 90px;
			cursor: pointer;
			text-align: center;
			max-height: 121px;
			margin: 1%;
		}
		.food{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
		}

		span[class="date"]{
			background-color: #ed786a !important;
		}

		.meal{
			border: 2px solid #cccccc;
			border-radius: 1.25rem;
			height: 700px;
			max-height: 700px;
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
		}

		.meal .meat,.nut{
			border-bottom: 2px solid #cccccc;
			border-right: 2px solid #cccccc;
			width: 50%;
			height: 33%;
		}

		.meal .vegetable,.fruit{
			border-bottom: 2px solid #cccccc;
			width: 50%;
			height: 33%;
		}

		.meal .rice{
			width: 100%;
			height: 34%;
		}

		.meal .rice,.vegetable,.fruit,.meat,.nut{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
		}

		.nutrition{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.nutrition div{
			display: flex;
		}

		#create .hide{
			display: none;
		}

	</style>
@endsection
@section("script")
	<script>
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("making meal");
			$("title").text("making meal");

			$.ajax({
				url:"{{route('food.data')}}",
				method:"get",
				success:function (result) {
					let food_append = "";
					for (let i=0; i < result.length; i++){
						food_append = "";
						food_append += "<div class='food_image' id='"+result[i].id+"' data-check=0 data-category='"+result[i].category+"' data-fat='"+result[i].fat+"' data-carbohydrate='"+result[i].carbohydrate+"' data-protein='"+result[i].protein+"' data-sugar='"+result[i].sugar+"' data-calroy='"+result[i].calroy+"'>";
						food_append += "<img src='/images/food/"+result[i].image+".png'>";
						food_append += "<p>"+result[i].name+"</p>";
						food_append += "</div>";
						$("div[id='"+result[i].category+"']").append(food_append);
					}
				},
				error:function (error,message,status) {
					alert("error : "+error+"message : "+message+"status : "+status);
				}
			});

			$(document).on("click",".food_image",function () {
				 let category = $(this).data("category");
				 let check = $(this).data("check");
				 if (check === 0){
					 $(this).data("check",1);
					 $(".meal").find("div[class='"+category+"']").append($(this));
				 }else{
					$(this).data("check",0);
					$("div[id='"+category+"']").append($(this));
				 }
				 food();

			});

			$("input[name='HashTag']").on("input",function () {
				if ($(this).val().charAt(0) === "#"){
					$.ajax({
						url:"{{route('hashTag.data')}}",
						method:"get",
						data:{
							"search" : $(this).val()
						},
						success:function (result) {
							console.log(result);
						},
						error:function (error,message,status) {
							alert("error : "+error+"message : "+message+"status : "+status);
						}
					})
				}
			});

		});

		function food() {
			let food = $("div[class='meal']").find(".food_image");
			let protein = 0;
			let fat = 0;
			let carbohydrate = 0;
			let calory = 0;

			for(let i = 0; i < food.length; i++){
				console.log(food[i].attributes);
				fat = fat+parseInt(food[i].attributes[4].value);
				carbohydrate = carbohydrate+parseInt(food[i].attributes[5].value);
				protein = protein+parseInt(food[i].attributes[6].value);
				calory = calory+parseInt(food[i].attributes[8].value);
			}

			$({ val : 0 }).animate({ protein : protein , fat : fat , carbohydrate : carbohydrate , calory : calory}, {
				duration: 1000,
				step: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let caloryNum = Math.floor(this.calory).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(carbohydrateNum);
					$("span[class='calory']").text(caloryNum);
				},
				complete: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let caloryNum = Math.floor(this.calory).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(carbohydrateNum);
					$("span[class='calory']").text(caloryNum);
				}
			});
		}

	</script>
@endsection
