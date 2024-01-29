<?php
require_once('../config.php');
Class Users extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function save_users(){
		extract($_POST);
		$data = '';
		foreach($_POST as $k => $v){
			if(!in_array($k,array('id','password'))){
				if(!empty($data)) $data .=" , ";
				$data .= " {$k} = '{$v}' ";
			}
		}
		if(!empty($password) && !empty($id)){
			$password = md5($password);
			if(!empty($data)) $data .=" , ";
			$data .= " `password` = '{$password}' ";
		}
		if(empty($id)){
			$qry = $this->conn->query("INSERT INTO users set {$data}");
			if($qry){
				$id=$this->conn->insert_id;
				$this->settings->set_flashdata('success','Detalles del usuario guardados exitosamente.');
				foreach($_POST as $k => $v){
					if($k != 'id'){
						if(!empty($data)) $data .=" , ";
						$this->settings->set_userdata($k,$v);
					}
				}
				if(!empty($_FILES['img']['tmp_name'])){
					if(!is_dir(base_app."uploads/avatars"))
						mkdir(base_app."uploads/avatars");
					$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
					$fname = "uploads/avatars/$id.$ext";
					$accept = array('image/jpeg','image/png');
					if(!in_array($_FILES['img']['type'],$accept)){
						$err = "Image file type is invalid";
					}
					if($_FILES['img']['type'] == 'image/jpeg')
						$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
					elseif($_FILES['img']['type'] == 'image/png')
						$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
					if(!$uploadfile){
						$err = "Image is invalid";
					}
					$temp = imagescale($uploadfile,200,200);
					if(is_file(base_app.$fname))
					unlink(base_app.$fname);
					if($_FILES['img']['type'] == 'image/jpeg')
					$upload =imagejpeg($temp,base_app.$fname);
					elseif($_FILES['img']['type'] == 'image/png')
					$upload =imagepng($temp,base_app.$fname);
					else
					$upload = false;
					if($upload){
						$this->conn->query("UPDATE `users` set `avatar` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}'");
						$this->settings->set_userdata('avatar',$fname."?v=".time());
					}

					imagedestroy($temp);
				}
				return 1;
			}else{
				return 2;
			}

		}else{
			$qry = $this->conn->query("UPDATE users set $data where id = {$id}");
			if($qry){
				$this->settings->set_flashdata('success','Detalles del usuario actualizados correctamente.');
				foreach($_POST as $k => $v){
					if($k != 'id'){
						if(!empty($data)) $data .=" , ";
						$this->settings->set_userdata($k,$v);
					}
				}
				if(!empty($_FILES['img']['tmp_name'])){
					if(!is_dir(base_app."uploads/avatars"))
						mkdir(base_app."uploads/avatars");
					$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
					$fname = "uploads/avatars/$id.$ext";
					$accept = array('image/jpeg','image/png');
					if(!in_array($_FILES['img']['type'],$accept)){
						$err = "Image file type is invalid";
					}
					if($_FILES['img']['type'] == 'image/jpeg')
						$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
					elseif($_FILES['img']['type'] == 'image/png')
						$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
					if(!$uploadfile){
						$err = "Image is invalid";
					}
					$temp = imagescale($uploadfile,200,200);
					if(is_file(base_app.$fname))
					unlink(base_app.$fname);
					if($_FILES['img']['type'] == 'image/jpeg')
					$upload =imagejpeg($temp,base_app.$fname);
					elseif($_FILES['img']['type'] == 'image/png')
					$upload =imagepng($temp,base_app.$fname);
					else
					$upload = false;
					if($upload){
						$this->conn->query("UPDATE `users` set `avatar` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$id}'");
						$this->settings->set_userdata('avatar',$fname."?v=".time());
					}

					imagedestroy($temp);
				}

				return 1;
			}else{
				return "UPDATE users set $data where id = {$id}";
			}
			
		}
	}
	public function delete_users(){
		extract($_POST);
		$qry = $this->conn->query("DELETE FROM users where id = $id");
		if($qry){
			$this->settings->set_flashdata('success','Detalles del usuario eliminados correctamente.');
			return 1;
		}else{
			return false;
		}
	}
	public function save_agent(){
		if(!empty($_POST['password']))
		$_POST['password'] = md5($_POST['password']);
		else
		unset($_POST['password']);
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$this->conn->real_escape_string($v)}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `agent_list` where `email` = '{$email}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = " Email already taken.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `agent_list` set {$data} ";
		}else{
			$sql = "UPDATE `agent_list` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$aid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"Cuenta creada con éxito.");
			else{
				if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 2)
					$this->settings->set_flashdata('success'," Cuenta actualizada con éxito.");
				else
					$this->settings->set_flashdata('success'," Cuenta de agente actualizada exitosamente.");
			}
			if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 2){
					$this->settings->set_userdata('login_type',2);
				foreach($_POST as $k =>$v){
					$this->settings->set_userdata($k,$v);
				}
				$this->settings->set_userdata('id',$aid);
			}
			if(!empty($_FILES['img']['tmp_name'])){
				if(!is_dir(base_app."uploads/agents"))
					mkdir(base_app."uploads/agents");
				$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
				$fname = "uploads/agents/$aid.$ext";
				$accept = array('image/jpeg','image/png');
				if(!in_array($_FILES['img']['type'],$accept)){
					$err = "Image file type is invalid";
				}
				if($_FILES['img']['type'] == 'image/jpeg')
					$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
				elseif($_FILES['img']['type'] == 'image/png')
					$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
				if(!$uploadfile){
					$err = "Image is invalid";
				}
				$temp = imagescale($uploadfile,200,200);
				if(is_file(base_app.$fname))
				unlink(base_app.$fname);
				if($_FILES['img']['type'] == 'image/jpeg')
				$upload =imagejpeg($temp,base_app.$fname);
				elseif($_FILES['img']['type'] == 'image/png')
				$upload =imagepng($temp,base_app.$fname);
				else
				$upload = false;
				if($upload){
					$this->conn->query("UPDATE `agent_list` set `avatar` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$aid}'");
					if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 2){
						$this->settings->set_userdata('avatar',$fname."?v=".time());
					}
				}

				imagedestroy($temp);
			}

		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = " An error occurred.";
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	} 
	function delete_agent(){
		extract($_POST);
		$delete = $this->conn->query("UPDATE `agent_list` set delete_flag = 1 where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Agente eliminado con éxito");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	public function save_cliente(){
		if(!empty($_POST['password']))
		$_POST['password'] = md5($_POST['password']);
		else
		unset($_POST['password']);
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$this->conn->real_escape_string($v)}' ";
			}
		}
		$check = $this->conn->query("SELECT * FROM `clientes` where `email` = '{$email}' and delete_flag = 0 ".(!empty($id) ? " and id != {$id} " : "")." ")->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = " Email already taken.";
			return json_encode($resp);
			exit;
		}
		if(empty($id)){
			$sql = "INSERT INTO `clientes` set {$data} ";
		}else{
			$sql = "UPDATE `clientes` set {$data} where id = '{$id}' ";
		}
			$save = $this->conn->query($sql);
		if($save){
			$aid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			if(empty($id))
				$this->settings->set_flashdata('success',"Cuenta creada con éxito.");
			else{
				if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 3)
					$this->settings->set_flashdata('success'," Cuenta actualizada con éxito.");
				else
					$this->settings->set_flashdata('success'," Cuenta de cliente actualizada exitosamente.");
			}
			if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 3){
					$this->settings->set_userdata('login_type',3);
				foreach($_POST as $k =>$v){
					$this->settings->set_userdata($k,$v);
				}
				$this->settings->set_userdata('id',$aid);
			}
			if(!empty($_FILES['img']['tmp_name'])){
				if(!is_dir(base_app."uploads/clientes"))
					mkdir(base_app."uploads/clientes");
				$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
				$fname = "uploads/clientes/$aid.$ext";
				$accept = array('image/jpeg','image/png');
				if(!in_array($_FILES['img']['type'],$accept)){
					$err = "Image file type is invalid";
				}
				if($_FILES['img']['type'] == 'image/jpeg')
					$uploadfile = imagecreatefromjpeg($_FILES['img']['tmp_name']);
				elseif($_FILES['img']['type'] == 'image/png')
					$uploadfile = imagecreatefrompng($_FILES['img']['tmp_name']);
				if(!$uploadfile){
					$err = "Image is invalid";
				}
				$temp = imagescale($uploadfile,200,200);
				if(is_file(base_app.$fname))
				unlink(base_app.$fname);
				if($_FILES['img']['type'] == 'image/jpeg')
				$upload =imagejpeg($temp,base_app.$fname);
				elseif($_FILES['img']['type'] == 'image/png')
				$upload =imagepng($temp,base_app.$fname);
				else
				$upload = false;
				if($upload){
					$this->conn->query("UPDATE `clientes` set `avatar` = CONCAT('{$fname}', '?v=',unix_timestamp(CURRENT_TIMESTAMP)) where id = '{$aid}'");
					if($id == $this->settings->userdata('id') && $this->settings->userdata('login_type') == 3){
						$this->settings->set_userdata('avatar',$fname."?v=".time());
					}
				}

				imagedestroy($temp);
			}

		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = " An error occurred.";
			$resp['err'] = $this->conn->error."[{$sql}]";
		}
		return json_encode($resp);
	} 
	function delete_cliente(){
		extract($_POST);
		$delete = $this->conn->query("UPDATE `clientes` set delete_flag = 1 where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Cliente eliminado con éxito");
		}else{
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	public function save_favorito(){
		extract($_POST);
	
		
		if (!isset($_SESSION['userdata']['id'])) {
			$resp['status'] = 'failed';
			$resp['msg'] = 'Usuario no autenticado. Inicia sesión para agregar a favoritos.';
			return json_encode($resp);
		}
	
		$realEstateId = $this->conn->real_escape_string($realEstateId);
		$userId = $this->conn->real_escape_string($_SESSION['userdata']['id']);
	
		
		$checkQuery = $this->conn->query("SELECT * FROM `favoritos` WHERE `cliente_id` = '{$userId}' AND `state_id` = '{$realEstateId}'");
	
		if ($checkQuery->num_rows > 0) {
		
			$resp['status'] = 'failed';
			$resp['msg'] = 'Este inmueble ya esta en tus favoritos.';
			return json_encode($resp);
		}
	
	
		$insertQuery = $this->conn->query("INSERT INTO `favoritos` (`cliente_id`, `state_id`) VALUES ('{$userId}', '{$realEstateId}')");
	
		if ($insertQuery) {
		
			$resp['status'] = 'success';
			$resp['msg'] = 'Inmueble agregado a favoritos correctamente.';
		} else {
		
			$resp['status'] = 'failed';
			$resp['msg'] = 'Error al agregar el inmueble a favoritos.';
		}
	
		return json_encode($resp);
	}
	
	
	
}

$users = new users();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
switch ($action) {
	case 'save':
		echo $users->save_users();
	break;
	case 'save_agent':
		echo $users->save_agent();
	break;
	case 'delete_agent':
		echo $users->delete_agent();
	break;
	case 'delete':
		echo $users->delete_users();
	break;
	case 'save_cliente':
		echo $users->save_cliente();
	break;
	case 'delete_cliente':
		echo $users->delete_cliente();
	break;
	case 'save_favorito':
		echo $users->save_favorito();
	break;
	default:
		// echo $sysset->index();
		break;
}