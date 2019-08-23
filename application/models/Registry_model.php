<?php
/**
 * Created by PhpStorm.
 * User: Axel
 * Date: 22/08/2019
 * Time: 21:55
 */

class Registry_model extends CI_Model
{
    public function showForUsers(){
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('registry');
        $crud->columns('title', 'description','idstate');
        $crud->set_relation('idcategory','category','description');
        $crud->set_relation('idstate','state','description');
        $crud->display_as('title','Titulo');
        $crud->display_as('description','Descripcion');
        $crud->display_as('idstate','Estado');
        $crud->set_language("spanish");
        $crud->unset_clone();
        $crud->unset_export();
        $crud->unset_read();
        $crud->unset_print();
        $output = $crud->render();
        return $output;
    }
}