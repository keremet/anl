<?php
//session_start();
$id = isset($_GET['id'])?$_GET['id']:null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html><head>
	<meta http-equiv="CONTENT-TYPE" content="text/html; charset=UTF-8">
	<title>ФЛ</title>
<script src="dates.js"></script>	
<script>
function checkDelFl(){
	if(confirm('Действительно удалить ФЛ?')){
		document.getElementById('oper_type').value='delete';
		return true;
	}
	return false;
}

function saveFl()
{
	var arr_err = [];
	
	var birthday = document.getElementById("anl_birthday").value;
	if ( birthday != '' ) {
		document.getElementById("anl_birthday_cor").value = form_and_check_std_dat(birthday, arr_err);
		if(arr_err.length>0){
			alert("Ошибка в дате рождения: "+arr_err[0])
			document.getElementById("anl_birthday").focus();
			document.getElementById("anl_birthday").select();
			return false;
		}
	}
	return true;
}

</script>	
</head>
<body>
<table style="page-break-before: always;" width="262" border="0" cellpadding="0" cellspacing="0">
<tr valign="TOP">
	<!--td align="left"><a href="exit.php">Выход</a-->
	<td align="left"><a href="index.php">Список ФЛ</a>
</table>
<br/>
<?php	
include 'connect.php';
if($id != null){
	$stmt = $db->prepare(
		"SELECT id, name, DATE_FORMAT(birthday, '%d%m%Y') as birthday
			   , birthplace, address_reg, address_fact
			   , tel, email, vk, ok
			   , facebook, instagram, skype, twitter
		 FROM anl_fl
		 WHERE id = ?");
	$stmt->execute(array($id));
	$uch = $stmt->fetch();
}
?>

<form id="main_form" action="fl_save.php" method="post">
<table border="0" cellpadding="0" cellspacing="2">
<tr><td>ФИО<td><input id="anl_name"  name="anl_name" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['name']:'')?>">
<tr><td>Дата рождения<td><input id="anl_birthday"  name="anl_birthday" size="8" 
                        type="text" value="<?=(($id!=null)?$uch['birthday']:'')?>" 
                        maxlength="8" onkeyup="return proverka_dat(this);" onchange="return proverka_dat(this);">
<tr><td>Место рождения<td><input id="anl_birthplace"  name="anl_birthplace" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['birthplace']:'')?>">
<tr><td>Место регистрации<td><input id="anl_address_reg"  name="anl_address_reg" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['address_reg']:'')?>">
<tr><td>Место жительства<td><input id="anl_address_fact"  name="anl_address_fact" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['address_fact']:'')?>">
<tr><td>Телефоны<td><input id="anl_tel"  name="anl_tel" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['tel']:'')?>">
<tr><td>Email<td><input id="anl_email"  name="anl_email" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['email']:'')?>">
<tr><td>Вконтакт<td><input id="anl_vk"  name="anl_vk" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['vk']:'')?>">
<tr><td>Одноклассники<td><input id="anl_ok"  name="anl_ok" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['ok']:'')?>">
<tr><td>Facebook<td><input id="anl_facebook"  name="anl_facebook" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['facebook']:'')?>">
<tr><td>Instagram<td><input id="anl_instagram"  name="anl_instagram" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['instagram']:'')?>">
<tr><td>Skype<td><input id="anl_skype"  name="anl_skype" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['skype']:'')?>">
<tr><td>Twitter<td><input id="anl_twitter"  name="anl_twitter" size="60" 
                        type="text" value="<?=(($id!=null)?$uch['twitter']:'')?>">
</table>

<br><input value="<?=(($id==null)?"Создать ФЛ":"Сохранить")?>" type="submit"  onclick="return saveFl();">
<?php if($id != null){ ?>
<input value="Удалить ФЛ" type="submit" onclick="return checkDelFl();">
<?php } ?>
<input type="hidden" id="oper_type" name="oper_type" value="update">
<input type="hidden" id="id" name="id" value="<?=$id?>">
<input type="hidden" id="anl_birthday_cor" name="anl_birthday_cor">
</form>
</body>
</html> 
