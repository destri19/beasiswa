<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_mahasiswa extends CI_Controller
{
    public function index()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('level_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'mahasiswa'   => $this->madmin->base_mhs('bio', $sess),
                'status'   => $this->madmin->base_status('status', $sess),
                'data_periode' => $this->madmin->get_periode_open('popen'),
                'judul_web'   => "Dashboard",

            );
            $this->load->view('mahasiswa/header', $data);
            $this->load->view('mahasiswa/dashboard', $data);
            $this->load->view('mahasiswa/footer');
        }
    }
    public function hasil_penilaian()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('username_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Hasil Penilaian",
                'data_penilaian' => $this->madmin->get_penilaian('penilaian'),

            );

            $this->load->view('mahasiswa/header', $data);
            $this->load->view('mahasiswa/hasil_penilaian', $data);
            $this->load->view('mahasiswa/footer');
        }
    }
    public function logout()
    {
        if ($this->session->userdata('username_user') != '') {
            $this->session->sess_destroy();
            redirect('Ctrl_front/login');
        }
    }
}
