<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Тестовое задание</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="   crossorigin="anonymous"></script>
</head>
<body>

	<div class="container mt-4">
			<div class="row"> 
				<div class="col">
					<div id='error'>

					</div>
					<div class="my_form">
						<h1>Тестовое задание</h1>
						<form method="post" id="ajax_form" action="" >
							<input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"><br>
							<input type="text" class="form-control" name="surname" id="surname" placeholder="Введите фамилию"><br>
							<input type="email" class="form-control" name="email" id="email" placeholder="Введите email"><br>
							<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
							<input type="password" class="form-control" name="pass2" id="pass2" placeholder="Повторите пароль"><br>
							<button id = "btn" class="btn btn-success" type="submit">Зарегистрироваться</button>
						</form>
					</div>
				</div>
			</div>
	</div>

	<script type="text/javascript">
		/* Article FructCode.com */
		$( document ).ready(function() 
		{
			$("#btn").click(
				function()
				{
					sendAjaxForm('result_form', 'ajax_form', 'check.php');
					return false; 
				}
			);
		});
		function sendAjaxForm(result_form, ajax_form, url) 
		{
			$.ajax({
		        url:     url, 
		        type:     "POST", //метод отправки
		        dataType: "html", //формат данных
		        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
		        success: function(response) //Данные отправлены успешно
		        { 
		        	result = $.parseJSON(response);
		        	if(result.return == true)
		        	{
		        		$('#error').attr('class', 'alert alert-success');
		        		$('#error').text(result.message);
		        		$('.my_form').fadeOut();
		        	}
		        	else
		        	{
		        		$('#error').attr('class', 'alert alert-danger');
		        		$('#error').text(result.message);

		        	}
		        	
		        },
		    	error: function(response) // Данные не отправлены
		    	{ 
		    		$('#error').attr('class', 'alert alert-danger');
		    		$('#error').html('Ошибка. Данные не отправлены.');
		    	}
	    	});
		}

	</script>
</body>
</html>