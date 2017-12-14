<?php
/**
 * Created by PhpStorm.
 * User: kwoshvick
 * Date: 14/12/17
 * Time: 09:12
 */

class CrudModel extends MX_Controller
{
    public function _insert($table, $data)
    {
        $this->db->insert($table, $data);
    }


    public function _select($table, $condition = null, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        if (isset($order) && $order != null) {
            $this->db->order_by($order, "desc");
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function patient(){
        $this->db->select('*');
        $this->db->from('tbl_patient');
        $this->db->join('tbl_gender', 'tbl_gender.gender_id = tbl_patient.patient_gender');
        $this->db->join('tbl_service', 'tbl_service.service_id = tbl_patient.patient_service_type');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function editpatient($condition){
        $this->db->select('*');
        $this->db->from('tbl_patient');
        $this->db->join('tbl_gender', 'tbl_gender.gender_id = tbl_patient.patient_gender');
        $this->db->join('tbl_service', 'tbl_service.service_id = tbl_patient.patient_service_type');
        if (isset($condition) && $condition != null) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function _delete($id){
        $this->db->where('patient_id', $id);
        $this->db->delete('tbl_patient');
    }

}