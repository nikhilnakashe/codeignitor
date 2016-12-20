<?php
class Delete extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function delete($id)
    {
        $this->db->query("delete from personcolor where id=$id");
    }
}