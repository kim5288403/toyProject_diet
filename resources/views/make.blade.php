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
				<form id="create" method="post" action="{!! route("meal.create") !!}">
					@csrf
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
							<h3>(calorie) : <span class="calorie">0</span></h3><span>cal</span>
						</div>
					</div>
					<div class="row gtr-50" >
						<div class="col-12 col-12-small">
							<label style="text-align: left">title</label>
							<input name="title" placeholder="Title" type="text" value=""/>
							<input class="hide" name="hashTag" >
							<input class="hide" name="food" >
							<input class="hide" name="fat" >
							<input class="hide" name="calorie" >
							<input class="hide" name="protein" >
							<input class="hide" name="carbohydrate" >
						</div>
						<div class="col-12 col-12-small">
							<label style="text-align: left">HashTag</label>
							<div class="editable">
							</div>
							<ul id="hashTagUl" class="divided" style="background-color:#f7f7f7; ">
								<li>
								</li>
							</ul>

						<div class="col-12 col-12-small">
							<button id="createButton" type="button" class="form-button-submit button icon solid fa-envelope">식단 만들기</button>
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

		#hashTagUl {
			border-bottom-left-radius: 1.25rem;
			border-bottom-right-radius: 1.25rem;
		}

		#hashTagUl li div{
			text-align: left;
			margin-left: 2%;
			cursor: pointer;
		}

		div.editable{
			width: 100%;
			height: 50px;
			border: 1px solid #dcdcdc;
			overflow-y: auto;
		}

		.editable input{
			border:none;
			border-right:0px;
			border-top:0px;
			boder-left:0px;
			boder-bottom:0px;
			width: 105px;
			font-weight: 600;
			color: #ed786a;
			pointer-events: none;
		}

	</style>
@endsection
@section("script")
	<script>
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("making meal");
			$("title").text("making meal");

			$('.editable').each(function(){
				this.contentEditable = true;
			});

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

			$(".editable").on("keyup",function () {
				if ($(this).text().charAt(0) === "#"){
					$("#hashTagUl").show();
					$.ajax({
						url:"{{route('hashTag.data')}}",
						method:"get",
						data:{
							"search" : $(this).text()
						},
						success:function (result) {
							let appendText = "";
							$("ul[id='hashTagUl']").find("li").find("div").remove();

							for(let i = 0; i < result.length; i++){
								appendText = "";
								appendText += "<div class='hashTag' id='"+result[i].id+"'><h4>#"+result[i].name+"</h4><span>게시물 "+result[i].tag_count+" 건</span></div>";
								$("ul[id='hashTagUl']").find("li").append(appendText);
							}
						},
						error:function (error,message,status) {
							alert("error : "+error+"message : "+message+"status : "+status);
						}
					})
				}
			});

			$(document).on("click",".hashTag",function () {
				$(".editable").append("<input class='hashTag' id='"+$(this)[0].id+"' value="+$(this).find("h4").text()+" readonly>");
				let close = $(".editable").find("input").clone();
				$(".editable").text("");
				$(".editable").append(close);
				$("#hashTagUl").hide();
				$(".editable").select();
			});

			$("#createButton").on("click",function () {
				let food = $("div[class='meal']").find(".food_image");
				let hashTag = $("form[id='create']").find("input[class='hashTag']");
				let title = $("form[id='create']").find("input[name='title']").val();
				if (title === ""){
				}
				if(food.length === 0){
				}
				let fat = $("span[class='fat']").text();
				let protein = $("span[class='protein']").text();
				let carbohydrate = $("span[class='carbohydrate']").text();
				let calorie = $("span[class='calorie']").text();

				let hashTagId = hashTagFn(hashTag);
				let foodId = foodIdFn(food);

				$("input[name='hashTag']").val(hashTagId);
				$("input[name='food']").val(foodId);
				$("input[name='calorie']").val(calorie);
				$("input[name='carbohydrate']").val(carbohydrate);
				$("input[name='protein']").val(protein);
				$("input[name='fat']").val(fat);
				$("form[id='create']").submit();
			});

		});

		function foodIdFn(food) {
			let value = "";
			for (let i = 0; i < food.length; i++){
				if (0 < i){
					value = value+","+food[i].id;
				}else {
					value = food[i].id;
				}
			}
			return value;
		}

		function hashTagFn(hashTag) {
			let value = "";
			for (let i = 0; i < hashTag.length; i++){
				if (0 < i){
					value = value+","+hashTag[i].attributes[1].value;
				}else {
					value = hashTag[i].attributes[1].value;
				}
			}
			return value;
		}

		function food() {
			let food = $("div[class='meal']").find(".food_image");
			let protein = 0;
			let fat = 0;
			let carbohydrate = 0;
			let calorie = 0;

			for(let i = 0; i < food.length; i++){
				fat = fat+parseInt(food[i].attributes[4].value);
				carbohydrate = carbohydrate+parseInt(food[i].attributes[5].value);
				protein = protein+parseInt(food[i].attributes[6].value);
				calorie = calorie+parseInt(food[i].attributes[8].value);
			}

			$({ val : 0 }).animate({ protein : protein , fat : fat , carbohydrate : carbohydrate , calorie : calorie}, {
				duration: 1000,
				step: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let calorieNum = Math.floor(this.calorie).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(carbohydrateNum);
					$("span[class='calorie']").text(calorieNum);
				},
				complete: function() {
					let fatNum = Math.floor(this.fat).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let proteinNum = Math.floor(this.protein).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let carbohydrateNum = Math.floor(this.carbohydrate).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					let calorieNum = Math.floor(this.calorie).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					$("span[class='fat']").text(fatNum);
					$("span[class='protein']").text(proteinNum);
					$("span[class='carbohydrate']").text(carbohydrateNum);
					$("span[class='calorie']").text(calorieNum);
				}
			});
		}

	</script>
@endsection
