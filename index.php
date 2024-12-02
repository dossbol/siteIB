<?php
	$msg_box = "";
	
	if($_POST['btn_submit']){
		$errors = array();
		
		if($_POST['user_name'] == "")	 $errors[] = "Поле 'Ваше имя' не заполнено!";
		if($_POST['user_email'] == "")	 $errors[] = "Поле 'Ваш e-mail' не заполнено!";
		if($_POST['text_comment'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";

		if(empty($errors)){
			
			$message = "Имя пользователя: ", $_POST['user_name'], "<br/>";
			$message = "E-mail пользователя: ", $_POST['user_email'], "<br/>";
			$message = "Текст письма: ", $_POST['text_comment'];
			send_mail($message);
			
			$msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
		}else{

			$msg_box = "";
			foreach($errors as $one_error){
				$msg_box = "<span style='color: red;'>$one_error</span><br/>";
			}
		}
	}

	function send_mail($message){
		$mail_to = "maratdosbol04@mail.ru";

		$subject = "Письмо с обратной связи";

		$headers = "MIME-Version: 1.0\r\n";
		$headers = "Content-type: text/html; charset=utf-8\r\n";
		$headers = "From: Текстовое письмо <golden-link@golden-link.ru>\r\n";

		mail($mail_to, $subject, $message, $headers);		
	}
?>