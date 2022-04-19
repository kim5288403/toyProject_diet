@extends("frame")
@section("content")
	<div class="row">


		<!-- Content -->
		<div id="content" class="col-12 col-12-medium imp-medium">

			<!-- Post -->
			<article class="box post">
				<header>
					<h2>Behold! This is the <strong>left sidebar</strong> layout<br />
						with a sidebar on the left!</h2>
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
			width: 50%;
			height: 20%;
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
		}

		.nutrition div{
			width: 50%;
			display: flex;
			justify-content: center;
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
		}
		.infoHeader{
			margin-top: 2%;
			width: 100%;
			display: flex;
			justify-content: center;
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
					console.log(result["list"]);
					for (let j = 0; j < result["list"].length; j++){
						appendList = "";
						appendList += "<li>";
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
										appendList += "<h2>"+result["list"][j].title+"</h2>";
									appendList += "</div>";
									appendList += "<div class='nutrition'>";
										appendList += "<div>";
											appendList += "<h3>(fat) : <span class='fat'>"+result["list"][j].fat+"</span></h3><span>g</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(protein) : <span class='protein'>"+result["list"][j].protein+"</span></h3><span>g</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(carbohydrate) : <span class='carbohydrate'>"+result["list"][j].carbohydrate+"</span></h3><span>g</span>"
										appendList += "</div>";
										appendList += "<div>";
											appendList += "<h3>(calorie) : <span class='calorie'>"+result["list"][j].calorie+"</span></h3><span>cal</span>"
										appendList += "</div>";
									appendList += "</div>";
									appendList += "<div class='hashTag'>";
									appendList += "</div>";
								appendList += "</div>";
							appendList += "</div>";
						appendList += "</li>";
						$("#mealUl").append(appendList);
					}

				},
				error:function (error,message,status) {
					alert("error : "+error+"message : "+message+"status : "+status);
				}
			});
		}

	</script>
@endsection
