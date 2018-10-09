<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

        public function get_all_entry()
        {
                $query = $this->db->get('kiosk_list');
                return $query->result();
        }

        public function insert_profile_advert($data)
        {
                $this->db->trans_start();
                $this->db->insert('profile_advert', $data);
                $insert_id = $this->db->insert_id();
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    return FALSE;
                } 
                else {
                        $this->db->trans_commit();
                        return $insert_id;
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