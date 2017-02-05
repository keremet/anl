<head>
	<meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
	<title>ФЛ</title>
</head>
<table style="page-break-before: always;" width="650" border="0" cellpadding="0" cellspacing="0">
<tr valign="TOP">
	<!--td align="left"><a href="exit.php">Выход</a-->
	<td align="left"><a href="fl.php">Добавить ФЛ</a>
</table>
<br/>
<?php
	include "oft_table.php";
	include "connect.php";
	oftTable::init('ФЛ');
	oftTable::header(array('ID','ФИО','ДАТА РОЖДЕНИЯ'
			,'МЕСТО РОЖДЕНИЯ','МЕСТО РЕГИСТРАЦИИ','МЕСТО ЖИТЕЛЬСТВА'
			,'ТЕЛЕФОНЫ','EMAIL','ВКОНТАКТ','ОДНОКЛАССНИКИ','FACEBOOK'
			,'INSTAGRAM','SKYPE','TWITTER'));
	foreach($db->query(
			"SELECT id, name, DATE_FORMAT(birthday, '%d-%m-%Y') as birthday
			   , birthplace, address_reg, address_fact
			   , tel, email, vk, ok
			   , facebook, instagram, skype, twitter
			 FROM anl_fl
			 ORDER BY id"
			) as $row){
	oftTable::row(array($row['id'],'<a href=fl.php?id='.$row['id'].'>'.$row['name'].'</a>', $row['birthday']
		, $row['birthplace'], $row['address_reg'], $row['address_fact']
		, $row['tel'], $row['email'], $row['vk'], $row['ok']
		, $row['facebook'], $row['instagram'], $row['skype'], $row['twitter']
		));
	}

	oftTable::end();
?> 
</body>
</html>
