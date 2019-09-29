<?php
/**
 * Created by PhpStorm.
 * User: Axel
 * Date: 22/08/2019
 * Time: 21:55
 */

class Registry_model extends CI_Model
{
    public function showForUsers($category){
		$category = $this->validate($category);
    	if (is_null($category)){
    		$category = $this->getIdFromName(null);
		}else{
			$category = $this->getIdFromName($category);
		}
		$this->globalCategoryId = $category->idcategory;
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('registry');
		$crud->set_read_fields('title','description','image');
		$crud->columns('title', 'description','idstate');
        $crud->fields('title','description','image','insertDate','iduser','idstate','idcategory');
	//	$crud->unset_add_fields('idstate');

		//$crud->change_field_type('idstate','invisible');
		$crud->change_field_type('idcategory','hidden');
		$crud->change_field_type('insertDate','hidden');
        $crud->change_field_type('iduser','hidden');

        $crud->display_as('title','Titulo');
        $crud->display_as('description','Descripcion');
        $crud->display_as('idstate','Estado');
        $crud->set_language("spanish");
		$crud->set_relation('idstate','state','description');
        $crud->where('registry.idcategory',$category->idcategory);
        $crud->set_subject($category->description);
        $crud->unset_clone();
        $crud->unset_export();
        $crud->unset_print();
        $crud->set_field_upload('image');
        if ($this->session->userdata(CATEGORY)== USER) {
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->where('registry.iduser',$this->session->userdata(ID));
		}
		$crud->callback_before_insert(array($this,'setDate_callback'));

        $output = $crud->render();
        return $output;
    }
	function setDate_callback($post_array){
		$post_array['insertDate'] = date('Y-d-m');
		$post_array['iduser'] = $this->session->userdata(ID);
		$post_array['idstate'] = 1;
		$post_array['idcategory'] = $this->globalCategoryId;
		return $post_array;
	}


	public function getIdFromName($name){
		$result =null;
		if (is_null($name)){
			$query = $this->db->query("Select * from category LIMIT 1");
		}else{
			$query = $this->db->query("Select * from category where description = '".$name."'LIMIT 1");
		}

		$result = $query->row();


		return $result;

	}
	function validate($category){
    	$result = $category;
    	if ($category == "add" ||
			$category == "edit"||
			$category == "read"){

    		$result = null;
		}

		return $result;
	}

	public function showPending(){
		$this->load->library('grocery_CRUD');
		$crud = new grocery_CRUD();
		$crud->set_table('registry');
		$crud->set_read_fields('title','description','image');
		$crud->columns('title', 'description','idstate','idcategory');
		$crud->fields('title','description','image','insertDate','iduser','idstate','idcategory');
		$crud->change_field_type('idcategory','hidden');
		$crud->change_field_type('insertDate','hidden');
		$crud->change_field_type('iduser','hidden');
		$crud->display_as('title','Titulo');
		$crud->display_as('description','Descripcion');
		$crud->display_as('idstate','Estado');
		$crud->set_language("spanish");
		$crud->set_relation('idstate','state','description');
		$crud->set_relation('idcategory','category','description');
		$crud->where('registry.idstate','1');
		$crud->unset_clone();
		$crud->unset_add();
		$crud->unset_export();
		$crud->unset_print();
		$crud->set_field_upload('image');
		$output = $crud->render();
		return $output;





	}

	public function getAllApi($param){
		$query = $this->db->query("Select * from registry where idCategory = ".$param );
		return json_encode(array('registry' => $query->result_array()));
	}
}
