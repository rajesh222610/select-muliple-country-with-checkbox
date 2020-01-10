<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

<style type="text/css">
	.custom-box{
		position: absolute;
		top: 47%;
		left: 7%;
		border: 1px solid #e1e1cc;
	}
	.country{
		overflow-y: scroll;
		height: 150px;
		padding-left: 24px;
	}
	.city{
		overflow-y: scroll;
		height: 150px;
		padding-left: 24px;
	}

	.arrow-right{
		width: 20%;
		float: right;
		margin-top: -40px;
		text-align: right;
		padding: 11px;
	}
	.country-city-box{
		padding-left: 0px;
	}
</style>
</head>
<body>
	<div class="container jumbotron" style="margin-top: 50px;">
		<div class="row">
			<div class="col-sm-4">
				<input class="form-control" id="search" type="text" name="search">
			</div>
			<div class="col-sm-4">
				<input type="submit" class="btn btn-primary" name="submit">
			</div>	
		</div>
		<div class="container custom-box">
			<div class="col-sm-6 country-city-box">
				<ul class="country">

				</ul>
			</div>
			<div class="col-sm-6 country-city-box">
				<ul class="city">

				</ul>
			</div>	
		</div>
	</div>


</body>
<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
			url: "test.php", 
			dataType:"json",
			success: function(data){
				var text="";
				var textcity="";
				// on keyup 
				$("#search").keyup(function(){
					var search = $(this).val().toLowerCase();
					$('.country').html('');

					$.each(data, function(i, v) {
						if (v.country.search(new RegExp(search, "i")) != -1) {
							$('.country').append('<li><label class="checkbox country-check" style="width: 80%;"><input type="checkbox" class="c_'+v.id+'" id="'+v.id+'" value=""/>'+v.country+'</label><span class="glyphicon glyphicon-chevron-right arrow-right" id="'+v.id+'"></span></li>');
						}
					});

					$(".country-check").change(function(e){
						var id =e.target.id;
						if ($('#'+id).is(':checked')) {
							textcity += '<div id="demo_'+id+'" class="collapse">';
							for (y in data[id].city) {
								textcity += '<li>';
								textcity += '<label class="checkbox" style="width: 80%;">';
								textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
								textcity += '</label>';
								textcity += '</li>';
							}
							textcity += '</div>';
							$(".city").html(textcity);
							$("#demo_"+id).show("500");
						}else{
							$("#demo_"+id).hide("500");
						}
					});

					$("span.arrow-right").click(function(e){
						var id =e.target.id;
						if ($('.c_'+id).is(':checked')) {
							textcity += '<div id="demo_'+id+'" class="collapse">';
							for (y in data[id].city) {
								textcity += '<li>';
								textcity += '<label class="checkbox" style="width: 80%;">';
								textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
								textcity += '</label>';
								textcity += '</li>';
							}
							textcity += '</div>';
							$(".city").html(textcity);
							$("#demo_"+id).show("500");
						}else{
							textcity += '<div id="demo_'+id+'" class="collapse">';
							for (y in data[id].city) {
								textcity += '<li>';
								textcity += '<label class="checkbox" style="width: 80%;">';
								textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
								textcity += '</label>';
								textcity += '</li>';
							}
							textcity += '</div>';
							$(".city").html(textcity);
							$("#demo_"+id).toggle("500");
						}
					});
				});


				// On document ready

				for (x in data) {
					text += '<li>';
					text += '<label class="checkbox country-check" style="width: 80%;">';
					text +=	'<input type="checkbox" class="c_'+data[x].id+'" id="'+data[x].id+'" value=""/>'+data[x].country;
					text += '</label>';
					text += '<span class="glyphicon glyphicon-chevron-right arrow-right" id="'+data[x].id+'"></span>';
					text += '</li>';
				} 
				$(".country").html(text);

				$(".country-check").change(function(e){
					var id =e.target.id;
					if ($('#'+id).is(':checked')) {
						textcity += '<div id="demo_'+id+'" class="collapse">';
						for (y in data[id].city) {
							textcity += '<li>';
							textcity += '<label class="checkbox" style="width: 80%;">';
							textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
							textcity += '</label>';
							textcity += '</li>';
						}
						textcity += '</div>';
						$(".city").html(textcity);
						$("#demo_"+id).show("500");
					}else{
						$("#demo_"+id).hide("500");
					}
				});

				$("span.arrow-right").click(function(e){
					var id =e.target.id;
					if ($('.c_'+id).is(':checked')) {
						textcity += '<div id="demo_'+id+'" class="collapse">';
						for (y in data[id].city) {
							textcity += '<li>';
							textcity += '<label class="checkbox" style="width: 80%;">';
							textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
							textcity += '</label>';
							textcity += '</li>';
						}
						textcity += '</div>';
						$(".city").html(textcity);
						$("#demo_"+id).show("500");
					}else{
						textcity += '<div id="demo_'+id+'" class="collapse">';
						for (y in data[id].city) {
							textcity += '<li>';
							textcity += '<label class="checkbox" style="width: 80%;">';
							textcity +=	'<input type="checkbox" value="" />'+data[id].city[y].city;
							textcity += '</label>';
							textcity += '</li>';
						}
						textcity += '</div>';
						$(".city").html(textcity);
						$("#demo_"+id).toggle("500");
					}
				});
			}
		});

});

</script>

</html>