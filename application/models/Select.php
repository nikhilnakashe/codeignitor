<?php
class select extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function select()
    {
        $query = $this->db->get('DEMOPROJECT');
        return $query;
    }

    public function viewdata()
    {
        $query = $this->db->query("select * from person p,color c where p.pid=c.cid");
        //$query=$this->db->get('color');
        //$data = $query->result();
        return $query;
    }

    public function select_person($pid)
    {
        $query = $this->db->query("select * from person where pid='$pid'");

        return $query;
    }

    public function select_color_for_person($pid)
    {
        $query=$this->db->query("select p.id as id,c.cname as cname,p.pid as pid,p.cid as cid from personcolor p,color c where c.cid=p.cid and p.pid=$pid");

        return $query;
    }

    public function select_color($cid)
    {
        $query = $this->db->query("select * from color where cid='$cid'");

        return $query;
    }

    public function select_person_for_color($cid)
    {
        $query=$this->db->query("select p.id as id,p.pid as pid,p.cid as cid,x.pname as pname from personcolor p,person x where p.pid=x.pid and p.cid=$cid");

        return $query;
    }

    public function select_all_data()
    {
        $query=$this->db->query("select p.pname as pname,c.cname as cname from person p,color c,personcolor z where p.pid=z.pid and c.cid=z.cid");
        return $query;
    }

    public function fetchdropdowndata($pid)
    {
        $query = $this->db->query("SELECT * from color where cid not in(select p.cid as cid from personcolor p,color c where c.cid=p.cid and p.pid=$pid)");
        //$query="SELECT * from color where cid not in(select p.cid as cid from personcolor p,color c where c.cid=p.cid and p.pid=$pid)";
        return $query;
    }

    public function fetchdropdowndatacolor($cid)
    {
        $query= $this->db->query("SELECT * from person where pid not in(select p.pid as pid from personcolor p,person c where c.pid=p.pid and p.cid=$cid)");

        return $query;
    }

    public function addData($data)
    {
        return $this->db->insert('personcolor',$data);
    }
}
?>