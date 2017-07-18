<?php
include_once dirname(__FILE__)."/../db.php";
if( isset($_POST['newbooktitle'])&&isset($_POST['authorsline']) ){  //при добавлении книги и авторов к ней
	$NewBookTitle=trim(strip_tags($_POST['newbooktitle']));
	$AuthorsLine=trim(strip_tags($_POST['authorsline']));

	if( strlen($NewBookTitle)==0 || strlen($AuthorsLine)==0){       //если пустые поля
		echo 'Данные введены не полностью!<br>';
		echo '<a href="./../"'.'>Назад</a>';

	}
	else{
		$AuthorsLineArr = explode(",", $AuthorsLine);               //$AuthorsLine-строка всех соавторов добавляемой книги,разделенных запятой 
		$db=new dbConnectClass();

		foreach($AuthorsLineArr as $arg){
			$sql="INSERT INTO `books` (`book_title`, `book_authors`) VALUES ('".$NewBookTitle."', '".trim($arg)."')";  

			/* 
			* при добавлении в `books` срабатывает триггер и данные добавляются в таблицу 'authors'
			*/	
			$db->pdo->query($sql);
		}
		echo 'Данные записаны в базу данных';	
		echo '<br>';
		echo '<a href="./../"'.'>Назад</a>';

	}

}
?>
