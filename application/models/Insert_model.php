<?php
class insert_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    function form_insert($data){

        return $this->db->insert('DEMOPROJECT', $data);
    }

    function batch_insert($data){

        return $this->db->insert_batch('DEMOPROJECT', $data);
    }

    function insert_person($data)
    {
        return $this->db->insert('person', $data);
    }

    function insert_color($data)
    {
        return $this->db->insert('color', $data);
    }
}
?>