<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_front extends CI_Controller
{
    public function index()
    {
        $this->load->view('temp_front/index');
    }
    public function pendaftaran()
    {
        $data = array(
            'id_pendaftaran' => $this->mfront->pendaftaran('id_baru'),
            'data_periode' => $this->madmin->get_periode_open('popen'),
        );
        $this->load->view('temp_front/pendaftaran', $data);
    }
    public function submit_pendaftaran()
    {
        if (isset($_POST['btnsimpan'])) {
            $ktp = $_FILES['ktp']['name'];
            $ktm = $_FILES['ktm']['name'];
            $kk = $_FILES['kk']['name'];
            $sertifikat = $_FILES['sertifikat']['name'];
            $transkrip = $_FILES['transkrip']['name'];
            $organisasi = $_FILES['organisasi']['name'];
            $surat_tdc = $_FILES['surat_tdc']['name'];
            if ($ktp != null && $kk !=  null && $ktm != null && $sertifikat != null && $transkrip != null && $organisasi != null && $surat_tdc != null) {

                $config['upload_path'] = './files/uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg';
                $config['max_size'] = 10000;
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                $this->load->library('upload', $config);



                $field1 = "ktp";
                $field2 = "ktm";
                $field3 = "kk";
                $field4 = "sertifikat";
                $field5 = "transkrip";
                $field6 = "organisasi";
                $field7 = "surat_tdc";
                if ($this->upload->do_upload($field1)) {
                    $uploaded = $this->upload->data();
                    $data_picture_ktp = $uploaded['file_name'];
                }
                if ($this->upload->do_upload($field2)) {
                    $uploaded = $this->upload->data();
                    $data_picture_ktm = $uploaded['file_name'];
                }

                if ($this->upload->do_upload($field3)) {
                    $uploaded = $this->upload->data();
                    $data_picture_kk = $uploaded['file_name'];
                }
                if ($this->upload->do_upload($field4)) {
                    $uploaded = $this->upload->data();
                    $data_picture_serti = $uploaded['file_name'];
                }
                if ($this->upload->do_upload($field5)) {
                    $uploaded = $this->upload->data();
                    $data_picture_trans = $uploaded['file_name'];
                }
                if ($this->upload->do_upload($field6)) {
                    $uploaded = $this->upload->data();
                    $data_picture_org = $uploaded['file_name'];
                }
                if ($this->upload->do_upload($field7)) {
                    $uploaded = $this->upload->data();
                    $data_picture_tdc = $uploaded['file_name'];
                }
                $simpan_data = [
                    'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                    'nik' => $this->input->post('nik'),
                    'nama_lengkap' => $this->input->post('nama_lengkap'),
                    'nim' => $this->input->post('nim'),
                    'ttl' => $this->input->post('ttl'),
                    'angkes' => $this->input->post('angkes'),
                    'fakultas' => $this->input->post('fakultas'),
                    'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
                    'angkatan' => $this->input->post('angkatan'),
                    'semester' => $this->input->post('semester'),
                    'nama_ortu' => $this->input->post('nama_ortu'),
                    'pekerjaan_ortu' => $this->input->post('pekerjaan_ortu'),
                    'ktp' => $data_picture_ktp,
                    'ktm' => $data_picture_ktm,
                    'kk' => $data_picture_kk,
                    'sertifikat' => $data_picture_serti,
                    'transkrip' => $data_picture_trans,
                    'organisasi' => $data_picture_org,
                    'surat_tdc' => $data_picture_tdc,
                    'periode' => $this->input->post('periode'),
                    'status' => 'belum dinilai',
                ];
                $set_user = array(
                    'username' => $this->input->post('nim'),
                    'password' => md5($this->input->post('nim')),
                    'level_akses' => 'MAHASISWA',
                );
                $save_user = $this->madmin->save_user($set_user);

                $save = $this->mfront->submit_daftar($simpan_data);

                if ($save) {
                    $this->session->set_flashdata('success', '<p> Data dan File Anda berhasil disimpan,terima kasih. <strong>Data akan diverifikasi dan tunggu informasi lebih lanjut.Silahkan Login dengan menggunakan NIM sebagai username dan password anda untuk melihat status pengajuan beasiswa anda.</strong></p>');
                } else {
                    $this->session->set_flashdata('error', '<p> Gagal! Data dan File anda tidak berhasil disimpan , ulangi kembali!</p>');
                }
                redirect('Ctrl_front/pendaftaran');
            } else {
                redirect('Ctrl_front/pendaftaran');
            }
        } else {
            redirect('Ctrl_front/pendaftaran');
        }
    }

    public function login()
    {

        if (isset($_POST['btnlogin'])) {
            $login = array(
                'username'    => $this->input->post('username'),
                'password'    =>  md5($this->input->post('password'))
            );
            $masuk    = $this->mfront->auth($login);
            if ($masuk['sum'] == 0) {
                $this->session->set_flashdata('error', '<p> Gagal! Username atau Password tidak sesuai , ulangi kembali!</p>');
                redirect('Ctrl_front/login');
            } else {
                $this->session->set_userdata('level_user', $masuk['res']->level_akses);
                $this->session->set_userdata('username_user', $masuk['res']->username);
                $ceklevel = $this->session->userdata('level_user');
                if ($ceklevel == 'ADMIN' or $ceklevel == 'BIRO') {

                    redirect('Ctrl_admin/index');
                } else {
                    redirect('Ctrl_mahasiswa/index');
                }
            }
        } else {

            $this->load->view('temp_back/login');
        }
    }
}
