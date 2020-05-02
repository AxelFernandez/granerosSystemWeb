<?php
/**
 * Created by PhpStorm.
 * User: Axel
 * Date: 14/07/2019
 * Time: 21:22
 */
class User_model extends CI_Model
{
	public function userValidate($user,$pass){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function showUsers(){
		$this->load->library('grocery_CRUD');
		$crud = new grocery_CRUD();
		$crud->set_table('user');
		$crud->columns('user', 'iduserCategory');
		$crud->set_relation('iduserCategory','userCategory','description');
		$crud->display_as('user','Nombre');
		$crud->display_as('iduserCategory','Categoria');
		$crud->change_field_type('password','password');
		$crud->set_language("spanish");
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_read();
		$crud->unset_print();
		$output = $crud->render();
		return $output;
	}

	public function changePassword($user, $pass, $newpass){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		foreach ($query->result_array() as $datarow){
			if ($datarow['password']==$pass){
				$this->db->query("Update user set password='".$newpass."' where iduser='".$datarow['iduser']."';");
				return true;
			}
			else{return false;}
		}
	}
}
