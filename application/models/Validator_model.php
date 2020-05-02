<?php


class Validator_model extends CI_Model
{
	/*
	 * This method validate if not in a GC function
	 */
	public function validate($category){
		$result = $category;
		if ($category == "add" ||
			$category == "edit"||
			$category == "read"){

			$result = null;
		}

		return $result;
	}

	/*
	 * This method get true if had children and have show more sub categories or must show registry
	 */
	public function hadChildren($idCategory){
		$query = $this->db->query("Select count(*) as result from category where idSuperCategory = ".$idCategory);
		$row = $query->row();
		return $result = $row->result != 0 ? true : false;
	}


}
