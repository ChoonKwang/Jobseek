<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model {

        public function get_all_entry()
        {
                $query = $this->db->get('gate_msg');
                return $query->result();
        }

        public function insert_entry($data)
        {
                $this->db->trans_start();
                $this->db->insert('gate_msg', $data);
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
                $this->db->update('gate_msg', $data, array('gm_id' => $id));
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
                $this->db->delete('gate_msg', array('gm_id' => $id));
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