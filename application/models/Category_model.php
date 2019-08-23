<?php


class Category_model extends CI_Model {


	public function getAllCategories(){
		$result =null;
	    $query = $this->db->query("Select description from category");
		$result = $this->formatCategory($query->result_array());
		return $result;
	}

	private function formatCategory($array){
        $result = null;
		foreach ($array as $item){
			$result= $result. '<a href="'.base_url().'index.php/main/index/'.$item['description'].'" type="button" class="list-group-item list-group-item-action">'.$item['description'].'</a>' ;
		}
		return $result;
	}

    public function showCategory(){
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('category');
        $crud->columns('description');
        $crud->display_as('description','Descripcion');
        $crud->set_language("spanish");
        $crud->unset_clone();
        $crud->unset_export();
        $crud->unset_read();
        $crud->unset_print();
        $output = $crud->render();
        return $output;
    }
}
