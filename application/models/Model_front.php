<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_front extends CI_Model
{
    public function pendaftaran($menu = '', $data = '')
    {
        switch ($menu) {
            case 'id_baru':
                $no_max = $this->db->select_max('id_pendaftaran', 'id_pendaftaran')->get('tbl_pendaftaran')->row();
                $no_max = $no_max->id_pendaftaran;
                $no_max = (int) substr($no_max, 6) + 1;
                return date('Y-m-') . sprintf("%06s", time());
                break;
            default:
                # code...
                break;
        }
    }
    public function submit_daftar($simpan_data)
    {
        return $this->db->insert('tbl_pendaftaran', $simpan_data);
    }
    function auth($data)
    {
        $query = $this->db->where("username", $data['username'])->where("password", $data['password'])->get('tbl_user');
        return array(
            'res'    => $query->row(),
            'sum'    => $query->num_rows()
        );
    }
}
