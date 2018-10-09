<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

        public function get_all_entry()
        {
                $query = $this->db->get('kiosk_list');
                return $query->result();
        }

        public function get_invoice($id)
        {
                $query = $this->db->get_where('payment_invoice', array('pa_id' => $id));
                return $query->result();
        }

        public function insert_payment_entry($data_sub, $data_invoice)
        {
                $this->db->trans_start();
                $this->db->insert('payment_subscription', $data_sub);
                $this->db->insert('payment_invoice', $data_invoice);
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