
<?php
date_default_timezone_set('Europe/Moscow');
$users = 
[
	[
		'name' => 'Ulya',    
		'surname' => 'Ulyanova',
		'email' => 'Ulya@email.ru',
		'password' => 'sss'
	],
	[
		'name' => 'Ivan',    
		'surname' => 'Ivanov',
		'email' => 'Ivan@email.ru',
		'password' => 'aaa'
	],
	[
		'name' => 'Nikolay',    
		'surname' => 'Nikolayevich',
		'email' => 'Nikolay@email.ru',
		'password' => 'bbb'
	]
];
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$password2 = filter_var(trim($_POST['pass2']), FILTER_SANITIZE_STRING);

if(!empty($name) && isset($name) && !empty($surname) && isset($surname) && !empty($email) && isset($email) && !empty($password) && isset($password) && !empty($password2) && isset($password2))

{ 
	if ($password == $password2)
	{
		$key = array_search($email, array_column($users, 'email'));
		if($key !== false)
		{
			$result = array(
				'message' => $email."- Вход в систему",
				'return' => true
			); 
			mylog($result['message']);
			echo json_encode($result); 
		}
		else 
		{
			$result = array(

				'message' => "Ошибка. Email не найден",
				'return' => false
			); 
			mylog($result['message']);
			echo json_encode($result); 
		}
	}
	else
	{
		$result = array(

			'message' => "Ошибка. Разные пароли",
			'return' => false
		); 
		mylog($result['message']);
		echo json_encode($result); 
	}

}
else {
	$result = array(

		'message' => "Ошибка. Незаполненные поля",
		'return' => false
	); 
	mylog($result['message']);
	echo json_encode($result); 

}
function mylog($data){
	$data = date('[Y-m-d H:i:s] - ') . print_r($data, true) . PHP_EOL;
	file_put_contents('log.txt', $data, FILE_APPEND);
}
?>