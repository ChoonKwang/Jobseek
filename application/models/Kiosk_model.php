<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kiosk_model extends CI_Model {

        public function get_all_entry()
        {
                $query = $this->db->get('kiosk_list');
                return $query->result();
        }

        public function insert_entry($data)
        {
                $this->db->trans_start();
                $this->db->insert('kiosk_list', $data);
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
                $this->db->update('kiosk_list', $data, array('kiosk_id' => $id));
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
                $this->db->delete('kiosk_list', array('kiosk_id' => $id));
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