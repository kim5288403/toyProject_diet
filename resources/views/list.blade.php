@extends("frame")
@section("content")
	<div class="row">


		<!-- Content -->
		<div id="content" class="col-12 col-12-medium imp-medium">

			<!-- Post -->
			<article class="box post">
				<header>
					<h2>저희 다이어트 사용자들과 여러가지 <br/><strong>식단을</strong> 공유해요!</h2>
				</header>
				<ul id="mealUl" class="divided">
				</ul>
			</article>
			<div class="page"></div>
		</div>

	</div>
@endsection
@section("css")
	<style>
		@media (max-width: 697px) {
			.nutrition{
				font-size: 75%!important;
			}
		}
		@media (max-width: 564px) {
			.info{
				width: 100% !important;
			}
			.info .infoHeader{
				display: none;
			}
			.info .nutrition{
				display: none;
			}
			.meal{
				width: 100% !important;
				height: 80% !important;
			}
			#mealUl .content {
				display: flex;
				flex-wrap: wrap;
			}
		}

		#mealUl{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: center;
		}

		#mealUl li{
			display: flex;
			justify-content: center;
			width: 80%;
		}

		#mealUl .content{
			display: flex;
			width: 100%;
			height: 700px;
			border: 2px solid #ed786a;
			border-radius: 1.25rem;
		}

		#mealUl h2{
			width: 100%;
			height: 15%;
			margin-top: 2%;
		}

		.meal{
			display: flex;
			flex-wrap: wrap;
			width: 50%;
			height: 94%;
			margin: 2%;
			border-radius: 1.25rem;
			border: 3px solid #cccccc;
		}

		.meat,.vegetable{
			width: 50%;
			height: 33%;
			border-bottom: 3px solid #cccccc;
			border-right: 3px solid #cccccc;
		}

		.nut,.fruit{
			width: 50%;
			height: 33%;
			border-bottom: 3px solid #cccccc;
		}

		.rice{
			width: 100%;
			height: 44%;
		}

		.page{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: center;
		}

		.info{
			width: 40%;
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: center;
		}

		.page a{
			margin: 2%;
			cursor: pointer;
		}

		.nutrition{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-between;
			font-size: 100%;
		}

		.nutrition div{
			width: 100%;
			display: flex;
			justify-content: left;
		}

		.hashTag{
			width: 100%;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: center;
		}

		.hashTag h4{
			margin: 2%;
			color: #ed786a;
			font-size: 100%;
		}

		.infoHeader{
			margin-top: 2%;
			width: 100%;
			display: flex;
			justify-content: center;
		}

		.meal .rice,.vegetable,.fruit,.meat,.nut{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
		}

		.food_image img{
			width: 100%;
			max-height: 60%;
		}

		.food_image p{
			font-size: 70%;
			height: 0px;
		}

		.rice .food_image{
			border: 1px solid #cccccc;
			border-radius: 1.25rem;
			width: 15%;
			cursor: pointer;
			text-align: center;
			max-height: 35%;
			margin: 1%;
		}

		.food_image{
			border: 1px solid #cccccc;
			border-radius: 1.25rem;
			width: 31%;
			cursor: pointer;
			text-align: center;
			max-height: 47%;
			margin: 1%;
		}

	</style>
@endsection
@section("script")
	<script>
		$(document).ready(function () {
			$("h1[id='logo']").find("a").text("Meal List");
			$("title").text("Meal List");
			getList();
			$(document).on("click",".page_num",function () {
				getList($(this).text());
				$("a[class='page_num'][id='"+$(this).text()+"']").css("color","red");
				$("a[class='page_num'][id!='"+$(this).text()+"']").css("color","black");
			});
		});
		function getList(page = 1){
			$.ajax({
				url:"{{route("meal.getData")}}",
				method:"get",
				data:{
					"page": page
				},
				success:function (result) {
					if (page === 1){
						let appendText = "";
						for (let i = 1; i <= Math.ceil(result["total"]/10); i++){
							appendText = "";
							appendText += "<a class='page_num' id='"+i+"'>"+i+"</a>";
							$(".page").append(appendText);
						}
					}

					$("#mealUl").find("li").remove();
					let appendList = "";
					let appendFood = "";

					for (let j = 0; j < result["list"].length; j++){
						console.log(result["list"][j]);
						appendList = "";
						appendList += "<li id='"+result["list"][j].id+"'>";
							appendList += "<div class='content'>";
								appendList += "<div class='meal'>";
										appendList += "<div class='meat'></div>";
										appendList += "<div class='nut'></div>";
										appendList += "<div class='vegetable'></div>";
										appendList += "<div class='fruit'></div>";
										appendList += "<div class='rice'></div>";
								appendList += "</div>";
								appendList += "<div class='info'>";
									appendList += "<div class='infoHeader'>";
										appendList += "<h2>'"+result["list"][j]["users"].name+"' 님의 <br><strong>"+result["list"][j].title+"</strong></h2>";
									appendList += "</div>";
									appendList += "<div class='nutrition'>";
										appendList += "<div>";
											appendList += "<h3>(fat) : <span class='fat'>"+result["list"][j].fat+"</span></h3><span>g</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(protein) : <span class='protein'>"+result["list"][j].protein+"</span></h3><span>g</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(calorie) : <span class='calorie'>"+result["list"][j].calorie+"</span></h3><span>cal</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(carbohydrate) : <span class='carbohydrate'>"+result["list"][j].carbohydrate+"</span></h3><span>g</span>"
										appendList += "</div>";
									appendList += "</div>";
									appendList += "<div class='hashTag'>";
									if (result["list"][j]["meal_hash_tag"].length > 0){
										for (let k = 0; k < result["list"][j]["meal_hash_tag"].length; k++){
											appendList += "<h4>#"+result["list"][j]["meal_hash_tag"][k].hash_tag[0].name+"</h4>";
										}
									}
									appendList += "</div>";
								appendList += "</div>";
							appendList += "</div>";
						appendList += "</li>";
						$("#mealUl").append(appendList);

						for (let l = 0; l < result["list"][j]["meal_food"].length; l++){
							appendFood = "";
							appendFood += "<div class='food_image'>";
							appendFood += "<img src='/images/food/"+result["list"][j]["meal_food"][l].food_image+".png'>";
							appendFood += "<p>"+result["list"][j]["meal_food"][l].food_name+"</p>";
							appendFood += "</div>";
							$("li[id='"+result["list"][j].id+"']").find("."+result["list"][j]["meal_food"][l].food_category+"").append(appendFood);
						}

					}



				},
				error:function (error,message,status) {
					alert("error : "+error+"message : "+message+"status : "+status);
				}
			});
		}

	</script>
@endsection
