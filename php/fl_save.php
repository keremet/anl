<?php
	include 'connect.php';
	function execStmt($qry, $arr) {
		global $db;
		$stmt = $db->prepare($qry);
		if (!$stmt->execute($arr)) {
?> 
			<html>
			<head>
				<meta charset="utf-8">
			</head>
			<body>
			Ошибка 	<?php print_r($stmt->errorInfo()); ?> 
			</body>
			</html>		
<?php
		} else {
			header('Location: index.php');
		}
	}
	
	if ($_POST['id'] != '') {
		if ($_POST['oper_type'] == 'delete') {
			execStmt("DELETE FROM anl_fl WHERE id = ?", array($_POST['id']));
		} else {
			execStmt("UPDATE anl_fl SET name = ?, birthday = ?
					, birthplace = ?, address_reg = ?, address_fact = ?
					, tel = ?, email = ?, vk = ?
					, ok = ?, facebook = ?, instagram = ?
					, skype = ?, twitter = ?
					  WHERE id = ?",
				array( $_POST['anl_name'],$_POST['anl_birthday_cor']
				  ,$_POST['anl_birthplace'],$_POST['anl_address_reg'],$_POST['anl_address_fact']
				  ,$_POST['anl_tel'],$_POST['anl_email'],$_POST['anl_vk']
				  ,$_POST['anl_ok'],$_POST['anl_facebook'],$_POST['anl_instagram']
				  ,$_POST['anl_skype'],$_POST['anl_twitter']
				  ,$_POST['id']));
		}
	} else {
		execStmt("INSERT INTO anl_fl (name, birthday
					, birthplace, address_reg, address_fact
					, tel, email, vk
					, ok, facebook, instagram
					, skype, twitter) 
				  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
			array( $_POST['anl_name'],$_POST['anl_birthday_cor']
				  ,$_POST['anl_birthplace'],$_POST['anl_address_reg'],$_POST['anl_address_fact']
				  ,$_POST['anl_tel'],$_POST['anl_email'],$_POST['anl_vk']
				  ,$_POST['anl_ok'],$_POST['anl_facebook'],$_POST['anl_instagram']
				  ,$_POST['anl_skype'],$_POST['anl_twitter']
				  ));
	}
?>
