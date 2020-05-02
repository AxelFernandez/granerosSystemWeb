<?php


class Category_model extends CI_Model {


	public function getSuperCategories(){
		$result =null;
		$query = $this->db->query("Select * from category where idSuperCategory = 0");
		$result = $this->formatSuperCategory($query->result_array());
		return $result;

	}

	private function formatSuperCategory($array){
		$result = '<li class="nav-item"><a class="nav-link active" href="#">Categorias</a></li>';
		foreach ($array as $item){
			$result .=
				'<li class="nav-item">
					<a class="nav-link" href="'.base_url().'index.php/main/index/'.$item['idcategory'].'">'.$item['description'].'</a>
				</li>';
		}
		return $result;
	}

	public function getAllCategories($param){
		$result =null;
		$param = is_null($param)? 0: $param;
	    $query = $this->db->query("Select * from category where idSuperCategory = ".$param);
		$result = $this->formatCategory($query->result_array());
		return $result;
	}

	private function formatCategory($array){
        $result = null;
		foreach ($array as $item){
			$result= $result. '<a href="'.base_url().'index.php/main/index/'.$item['idcategory'].'" type="button" class="list-group-item list-group-item-action">'.$item['description'].'</a>' ;
		}
		return $result;
	}


    public function showCategory(){
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('category');
        $crud->display_as('description','Descripcion');
        $crud->display_as('idSuperCategory','Categoria Padre');
		$crud->set_relation('idSuperCategory','category','description');
		$crud->columns('description','idSuperCategory');
		$crud->set_language("spanish");
        $crud->unset_clone();
        $crud->unset_export();
        $crud->unset_read();
        $crud->unset_print();
		$crud->callback_before_insert(array($this,'category_callback'));
		$output = $crud->render();
        return $output;
    }


    public function category_callback($post_array){
		if(is_null($post_array['idSuperCategory']) || empty($post_array['idSuperCategory'])){
			$post_array['idSuperCategory'] = 0;
		}
		return $post_array;
	}


    public function getAllApi($idcategory){
		$this->load->model('Validator_model','validator');
		$query = $this->db->query("Select * from category where idSupercategory = ".$idcategory);
		$hadChildren = $this->validator->hadChildren($idcategory);
		return json_encode(array('categories' => $query->result_array(),
								'hadChildren' => $hadChildren));
	}
}
