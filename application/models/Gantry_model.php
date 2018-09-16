<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gantry_model extends CI_Model {

        public function get_all_entry()
        {
                $query = $this->db->get('gate_list');
                return $query->result();
        }

        public function insert_entry($data)
        {
                $this->db->trans_start();
                $this->db->insert('gate_list', $data);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {
                        $this->db->trans_commit();
                        return TRUE;
                }
        }

        public function update_entry($data, $id)
        {
                $this->db->trans_start();
                $this->db->update('gate_list', $data, array('gate_id' => $id));
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        }

        public function delete_entry($id)
        {
                $this->db->trans_start();
                $this->db->delete('gate_list', array('gate_id' => $id));
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {
                    $this->db->trans_commit();
                    return TRUE;
                }
        }
}