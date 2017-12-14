<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 14/12/17
 * Time: 09:06
 */

class Crud extends MX_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('CrudModel');
        $this->load->library('form_validation');
    }

    public function test(){
        $this->load->view('crud/test');
    }

    public function gender(){
        $this->load->view('crud/gender');
    }

    public function service(){
        $this->load->view('crud/service');
    }

    public function patient(){
        $data['gender'] = $this->CrudModel->_select('tbl_gender');
        $data['service'] = $this->CrudModel->_select('tbl_service');
        $data['patient'] = $this->CrudModel->patient();
        $this->load->view('crud/add_patient',$data);

    }


    public function postGender(){
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        if ($this->form_validation->run() == false) {
            $this->gender();
        } else {
            $data = array(
                'gender_name' => $this->input->post('gender')
            );
            $this->CrudModel->_insert('tbl_gender', $data);
        }
    }

    public function postService(){
        $this->form_validation->set_rules('service', 'Service', 'required');
        if ($this->form_validation->run() == false) {
            $this->service();
        } else {
            $data = array(
                'service_name' => $this->input->post('service')
            );
            $this->CrudModel->_insert('tbl_service', $data);
        }
    }

    public function postPatient(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('observation', 'observation', 'required');
        if ($this->form_validation->run() == false) {
            $this->patient();
        } else {
            $data = array(
                'patient_gender' => $this->input->post('gender'),
                'patient_dob' => $this->input->post('dob'),
                'patient_name' => $this->input->post('name'),
                'patient_service_type' => $this->input->post('service'),
                'patient_observation' => $this->input->post('observation')
            );
            $this->CrudModel->_insert('tbl_patient', $data);
            $this->patient();
        }

    }

    public function deletePatient($id){
        $this->CrudModel->_delete($id);
        $this->patient();
    }

    public function edit($id){

    }



}