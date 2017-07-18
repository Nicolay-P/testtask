<?php
include_once dirname(__FILE__)."/db.php";
$db=new dbConnectClass();

echo 'Запрос: SELECT `book_authors` FROM `books` GROUP BY `book_authors` HAVING count(`book_title`)<7';https://gitlab.com/effective-group/php-test-task
$sql="SELECT `book_authors` FROM `books` GROUP BY `book_authors` HAVING count(`book_title`)<7";
$result=$db->pdo->query($sql);
$result=$result->fetchAll();
echo '<br><b>Результат:</b>';
foreach($result as $res){
	echo '<br>';
	echo $res["book_authors"];
}

?>


<br>
<h3>Добавить в базу</h3>
<form method='POST' action='config/toDatabase.php'>
	<label>Название книги: </label>
	<input type='text' name='newbooktitle'/>
	<br>
	<br>

	<label>Авторы :</label>
	<p>(введите всех авторов через запятую)</p>
	<input type='text' name='authorsline'/>
	<br>
	<br>
	<button>Добавить</button>
</form>
<hr>