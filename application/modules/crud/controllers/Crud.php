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


    public function gender(){
        $data['gender'] = $this->CrudModel->_select('tbl_gender');
        $this->load->view('crud/gender',$data);
    }

    public function service(){
        $data['service'] = $this->CrudModel->_select('tbl_service');
        $this->load->view('crud/service',$data);
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
            $this->gender();
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
            $this->service();
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
        $this->CrudModel->_delete('tbl_patient','patient_id',$id);
        $this->patient();
    }

    public function deleteGender($id){
        $this->CrudModel->_delete('tbl_gender','gender_id',$id);
        $this->gender();
    }

    public function deleteService($id){
        $this->CrudModel->_delete('tbl_service','service_id',$id);
        $this->service();
    }



//    public function edit($id){
//
//    }



}