<?php


class Category_model extends CI_Model {


	public function getAllCategories(){
		$query = $this->db->query("Select description from category");


		return $this->formatCategory($query->result_array());
	}

	private function formatCategory($array){

		foreach ($array as $item){

			echo $item['description'];

		}

	}
}
