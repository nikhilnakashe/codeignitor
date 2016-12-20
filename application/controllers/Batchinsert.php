<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batchinsert extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
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
        //$this->load->view('welcome_message');

        if(empty($_POST['sid']) && empty($_POST['sname']) && empty($_POST['sclass']))
        {
            $this->load->database();

            $this->load->model('select');

            $data['h']=$this->select->select();

            $this->load->view('batch_insert', $data);
        }
        else
        {
            $data=array(
                'sid'=>$this->input->post('sid'),
                'sname'=>$this->input->post('sname'),
                'class'=>$this->input->post('sclass')
            );

            $this->load->model('insert_model');
            $this->insert_model->form_insert($data);

            $this->load->database();

            $this->load->model('select');

            $data['h']=$this->select->select();

            $this->load->view('batch_insert', $data);
            $data['message'] = 'Data Inserted Successfully';

            //View Data


        }

    }

    public function delete($row)
    {
        $this->load->database();
        $this->db->where('sid', $row);
        $this->db->delete('DEMOPROJECT');

        $this->load->model('select');

        $data['h']=$this->select->select();

        $this->load->view('batch_insert', $data);
    }

    public function data_submit()
    {
        $data=array(
            'sid'=>$this->input->post('sid'),
            'sname'=>$this->input->post('sname'),
            'class'=>$this->input->post('sclass')
        );
        $this->load->model('insert_model');
        $result = $this->insert_model->form_insert($data);
        echo json_encode($data);
        exit;
        //$this->db->insert('DEMOPROJECT', $data);

    }

    public function batch_insert()
    {
        //$counter=$_GET['countervalue'];

        /*$sid = $this->input->post('sid');
        $sname = $this->input->post('sname');
        $sclass=$this->input->post('sclass');*/

        /*for($i=0; $i<=0; $i++)
        {
            $data[] = array(
                'sid' => $this->input->post('sid['+$i+']'),
                'sname' => $this->input->post('sname['+$i+']'),
                'class' => $this->input->post('sclass['+$i+']')
            );



            /*$data[] = array(
                'sid' => $sid[$i],
                'sname' => $sname[$i],
                'class' => $sclass[$i]
            );
        }*/

        /*$data[] = array(
            'sid' => $this->input->post('sid[0]'),
            'sname' => $this->input->post('sname[0]'),
            'class' => $this->input->post('sclass[0]')
        );


        $this->load->model('insert_model');
        $result=$this->insert_model->batch_insert($data);
        echo json_encode($data);
        exit;*/

        //$this->load->model('Batch');
        //$result = $this->Batch->batchInsert($_POST);
        /*if($result){
            echo 1;
        }
        else{
            echo 0;
        }*/
        $count = $_POST['countervalue'];

        for($i = 0; $i<$count; $i++){
            $entries[] = array(
                'sid'=>$_POST['sid'][$i],
                'sname'=>$_POST['sname'][$i],
                'class'=>$_POST['sclass'][$i],
            );
        }
        $this->db->insert_batch('DEMOPROJECT', $entries);
        echo json_encode($entries);

        exit;

    }

}
