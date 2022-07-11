<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    function base($menu = '', $data = '')
    {
        switch ($menu) {
            case 'bio':

                return $this->db->get_where('tbl_user', "username='$data'")->row();
                break;

            default:
                # code...
                break;
        }
    }
    function base_mhs($menu = '', $data = '')
    {
        switch ($menu) {
            case 'bio':

                return $this->db->get_where('tbl_pendaftaran', "nim='$data'")->row();
                break;

            default:
                # code...
                break;
        }
    }
    function base_status($menu = '', $data = '')
    {
        switch ($menu) {
            case 'status':

                return $this->db->get_where('tbl_penilaian', "nim='$data'")->row();
                break;

            default:
                # code...
                break;
        }
    }
    public function count_data($menu = '')
    {
        switch ($menu) {
            case 'pengajuan':

                return $this->db->query('SELECT count(*) as total FROM tbl_pendaftaran')->row();
                break;
            case 'userss':

                return $this->db->query('SELECT count(*) as total FROM tbl_user')->row();
                break;
            case 'dinilai':

                return $this->db->query('SELECT count(*) as total FROM tbl_pendaftaran where status = "sudah dinilai"')->row();
                break;
            case 'belum':

                return $this->db->query('SELECT count(*) as total FROM tbl_pendaftaran where status = "belum dinilai"')->row();
                break;

            default:
                # code...
                break;
        }
    }
    function get_mahasiswa($menu = '')
    {
        switch ($menu) {
            case 'data_mhs':
                $query = $this->db->get('tbl_pendaftaran');
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
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
    public function save_mahasiswa($simpan_data)
    {
        return $this->db->insert('tbl_pendaftaran', $simpan_data);
    }
    function update_mahasiswa($data, $where)
    {
        $this->db->where('id_pendaftaran', $where);
        $str = $this->db->update('tbl_pendaftaran', $data);
        return $str;
    }
    function delete_mahasiswa($where)
    {
        $this->db->where('id_pendaftaran', $where);
        $str = $this->db->delete('tbl_pendaftaran');
        return $str;
    }
    function get_kriteria($menu = '')
    {
        switch ($menu) {
            case 'data_krt':
                $query = $this->db->get('tbl_kriteria');
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
    function save_kriteria($send)
    {

        $query = $this->db->insert('tbl_kriteria', $send);
        return $query;
    }
    function update_kriteria($data, $where)
    {
        $this->db->where('id_kriteria', $where);
        $str = $this->db->update('tbl_kriteria', $data);
        return $str;
    }
    function delete_kriteria($where)
    {
        $this->db->where('id_kriteria', $where);
        $str = $this->db->delete('tbl_kriteria');
        return $str;
    }
    function get_subkriteria($menu = '')
    {
        switch ($menu) {
            case 'sub_kriteria':
                $query = $this->db->get('tbl_sub_kriteria');
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
    function get_namakriteria($menu = '', $gn)
    {
        switch ($menu) {
            case 'gets':
                $query = $this->db->query("SELECT * FROM tbl_kriteria where id_kriteria = $gn;");
                return array(
                    'res'    => $query->row(),
                    'sum'    => $query->num_rows()
                );


            default:
                # code...
                break;
        }
    }
    function save_subkriteria($send)
    {

        $query = $this->db->insert('tbl_sub_kriteria', $send);
        return $query;
    }
    function update_subkriteria($data, $where)
    {
        $this->db->where('id_sub', $where);
        $str = $this->db->update('tbl_sub_kriteria', $data);
        return $str;
    }
    function delete_subkriteria($where)
    {
        $this->db->where('id_sub', $where);
        $str = $this->db->delete('tbl_sub_kriteria');
        return $str;
    }

    function about_me($menu = '', $data = '')
    {
        switch ($menu) {
            case 'update-pass':
                $old_user = $data['old_user'];
                $data = array(
                    'password'        => $data['password']
                );
                return $this->db->update('tbl_user', $data, array('username' => $old_user));
                break;

            default:
                # code...
                break;
        }
    }
    function get_user($menu = '')
    {
        switch ($menu) {
            case 'data_user':
                $query = $this->db->get('tbl_user');
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
    function save_user($send)
    {

        $query = $this->db->insert('tbl_user', $send);
        return $query;
    }
    function update_user($data, $where)
    {
        $this->db->where('id', $where);
        $str = $this->db->update('tbl_user', $data);
        return $str;
    }
    function delete_user($where)
    {
        $this->db->where('id', $where);
        $str = $this->db->delete('tbl_user');
        return $str;
    }
    function get_periode($menu = '')
    {
        switch ($menu) {
            case 'data_periode':
                $query = $this->db->get('tbl_periode');
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
    function save_periode($send)
    {

        $query = $this->db->insert('tbl_periode', $send);
        return $query;
    }
    function update_periode($data, $where)
    {
        $this->db->where('id_periode', $where);
        $str = $this->db->update('tbl_periode', $data);
        return $str;
    }
    function delete_periode($where)
    {
        $this->db->where('id_periode', $where);
        $str = $this->db->delete('tbl_periode');
        return $str;
    }
    function get_subk1($menu = '')
    {
        switch ($menu) {
            case 'sub_kriteria':
                $query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '1';");
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function get_subk2($menu = '')
    {
        switch ($menu) {
            case 'sub_kriteria':
                $query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '2';");
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function get_subk3($menu = '')
    {
        switch ($menu) {
            case 'sub_kriteria':
                $query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '3';");
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function get_subk4($menu = '')
    {
        switch ($menu) {
            case 'sub_kriteria':
                $query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_kriteria = '4';");
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function get_nilaikriteria($menu = '', $ckid)
    {
        switch ($menu) {
            case 'gets':
                $query = $this->db->query("SELECT * FROM tbl_sub_kriteria where id_sub = $ckid;");
                return array(
                    'res'    => $query->row(),
                    'sum'    => $query->num_rows()
                );


            default:
                # code...
                break;
        }
    }
    function get_bobotkriteria($menu = '', $bbid)
    {
        switch ($menu) {
            case 'gets':
                $query = $this->db->query("SELECT * FROM tbl_kriteria where id_kriteria = $bbid;");
                return array(
                    'res'    => $query->row(),
                    'sum'    => $query->num_rows()
                );


            default:
                # code...
                break;
        }
    }

    function save_nilai($send)
    {

        $query = $this->db->insert('tbl_penilaian', $send);
        return $query;
    }
    function update_nilai($data, $wheree)
    {
        $this->db->where('id_penilaian', $wheree);
        $str = $this->db->update('tbl_penilaian', $data);
        return $str;
    }
    function update_status($data, $where)
    {
        $this->db->where('id_pendaftaran', $where);
        $str = $this->db->update('tbl_pendaftaran', $data);
        return $str;
    }
    function get_periode_open($menu = '')
    {
        switch ($menu) {
            case 'popen':
                return $this->db->get_where('tbl_periode', "keterangan='BUKA'")->row();
                break;

            default:
                # code...
                break;
        }
    }
    function get_penilaian($menu = '')
    {
        switch ($menu) {
            case 'penilaian':
                $query = $this->db->query("SELECT * FROM tbl_penilaian ORDER BY id ASC");
                return $query->result_array();

            default:
                # code...
                break;
        }
    }
    function get_top30($menu = '')
    {
        switch ($menu) {
            case 'top30':
                $query = $this->db->query("SELECT * FROM tbl_penilaian order by total_nilai DESC LIMIT 30;");
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function update_statusTop($data, $where)
    {
        $this->db->where('id_penilaian', $where);
        $str = $this->db->update('tbl_penilaian', $data);
        return $str;
    }
    function get_under30($menu = '', $where)
    {
        switch ($menu) {
            case 'under30':
                $query = $this->db->get_where('tbl_penilaian', "id_penilaian !='$where'");
                // return $this->db->get('tbl_penilaian')->result_array();
                return $query->result_array();


            default:
                # code...
                break;
        }
    }
    function update_statusTL($data, $where)
    {
        $this->db->where('id_penilaian !=', $where);
        $str = $this->db->update('tbl_penilaian', $data);
        return $str;
    }
}
