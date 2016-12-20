<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personcolor extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    //function __construct() {
    //	parent::__construct();
    //	$this->load->model('insert_model');
    //}

    public function index()
    {
        $this->load->database();

        $this->load->model('select');

        $data['h'] = $this->select->viewdata();

        $this->load->view('person_color', $data);

    }

    public function data_submit()
    {
        $cname = $this->input->post('cname');
        $data = array(
            'cname' => $this->input->post('cname')
        );

        $data1 = array(
            'pname' => $this->input->post('pname')
        );
        $this->load->model('insert_model');
        $result = $this->insert_model->insert_person($data1);
        $result2 = $this->insert_model->insert_color($data);

        $query = $this->db->query("select * from person p,color c where p.pid=c.cid");
        $data = $query->result();

        echo json_encode($data);
        exit;
    }

    public function viewload_person($id)
    {
        $this->load->model('select');
        $data['p'] = $this->select->select_person($id);

        $this->load->model('select');
        $data['p1'] = $this->select->select_color_for_person($id);

        $this->load->model('select');
        $data['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data['p3']=$this->select->fetchdropdowndata($id);

        $this->load->view('person_view', $data);
    }

    public function viewload_color($id)
    {
        $this->load->model('select');
        $data['p'] = $this->select->select_color($id);

        $this->load->model('select');
        $data['p1'] = $this->select->select_person_for_color($id);

        $this->load->model('select');
        $data['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data['p3']=$this->select->fetchdropdowndatacolor($id);

        $this->load->view('color_view', $data);
    }

    public function delete()
    {
        $id=$_POST['id'];
        $pid=$_POST['pid'];
        //$id=$this->uri->segment(3);
        //$pid=$this->uri->segment(4);

        $this->load->model('delete');
        $this->delete->delete($id);

        $this->load->model('select');
        $data['p'] = $this->select->select_person($pid);

        $this->load->model('select');
        $data['p1'] = $this->select->select_color_for_person($pid);

        $this->load->model('select');
        $data['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data['p3']=$this->select->fetchdropdowndata($pid);

        $this->load->view('person_view', $data);
    }

    public function delete_color()
    {
        $id=$_POST['id'];
        $cid=$_POST['cid'];

        //$id=$this->uri->segment(3);
        //$cid=$this->uri->segment(4);

        $this->load->model('delete');
        $this->delete->delete($id);

        $this->load->model('select');
        $data['p'] = $this->select->select_color($cid);

        $this->load->model('select');
        $data['p1'] = $this->select->select_person_for_color($cid);

        $this->load->model('select');
        $data['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data['p3']=$this->select->fetchdropdowndatacolor($cid);

        $this->load->view('color_view', $data);
    }
    public function addColorToPerson()
    {
        $pid=$_POST['pid1'];
        $cid=$_POST['color'];

        $data=array(
            'pid'=>$pid,
            'cid'=>$cid
        );

        $this->load->model('select');
        $this->select->addData($data);

        $this->load->model('select');
        $data1['p'] = $this->select->select_person($pid);

        $this->load->model('select');
        $data1['p1'] = $this->select->select_color_for_person($pid);

        $this->load->model('select');
        $data1['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data1['p3']=$this->select->fetchdropdowndata($pid);

        $response=$this->load->view('person_view', $data1, TRUE);

        echo json_encode($response);
        //$this->set_output($response);
        exit;
    }

    public function addPersonToColor()
    {
        $pid=$_POST['person'];
        $cid=$_POST['cid1'];

        $data1=array(
            'pid'=>$pid,
            'cid'=>$cid
        );

        $this->load->model('select');
        $this->select->addData($data1);

        $this->load->model('select');
        $data['p'] = $this->select->select_color($cid);

        $this->load->model('select');
        $data['p1'] = $this->select->select_person_for_color($cid);

        $this->load->model('select');
        $data['p2'] = $this->select->select_all_data();

        $this->load->model('select');
        $data['p3']=$this->select->fetchdropdowndatacolor($cid);

        $response=$this->load->view('color_view', $data, TRUE);

        echo json_encode($response);
        //$this->set_output($response);
        exit;
    }
}
