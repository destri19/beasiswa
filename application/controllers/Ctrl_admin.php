<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_admin extends CI_Controller
{
    public function index()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('level_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'pengajuan'   => $this->madmin->count_data('pengajuan'),
                'userss'      => $this->madmin->count_data('userss'),
                'dinilai'     => $this->madmin->count_data('dinilai'),
                'belum'       => $this->madmin->count_data('belum'),
                'judul_web'   => "Dashboard",

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/dashboard', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function logout()
    {
        if ($this->session->userdata('username_user') != '') {
            $this->session->sess_destroy();
            redirect('Ctrl_front/login');
        }
    }
    public function ubah_pass()
    {
        $sess = $this->session->userdata('username_user');
        if ($sess == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'         => $this->madmin->base('bio', $sess),
                'judul_web'    => "Ubah Password"
            );

            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/ubah_pass', $data);
            $this->load->view('temp_back/footer');

            if (isset($_POST['btnUbahPass'])) {
                $send = array(
                    'plama'    => md5($this->input->post('password_lama')),
                    'pbaru'    => md5($this->input->post('password')),
                    'pconf'    => md5($this->input->post('password2'))
                );

                if ($data['user']->password != $send['plama']) {
                    $this->session->set_flashdata('error', '<p> Password Lama Tidak Sesuai! <strong></strong></p>');
                } else if ($send['pbaru'] != $send['pconf']) {
                    $this->session->set_flashdata('error', '<p> Password Baru dengan Konfirmasi Tidak Sesuai! <strong></strong></p>');
                } else {
                    $data = array(
                        'old_user'    => $sess,
                        'password'    => $send['pbaru']
                    );
                    $acts = $this->madmin->about_me('update-pass', $data);

                    $this->session->set_flashdata('success', '<p> Password Berhasil Diubah! <strong></strong></p>');
                }
                redirect('Ctrl_admin/ubah_pass');
            }
        }
    }
    public function data_mahasiswa()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('level_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Data Mahasiswa",
                'id_pendaftaran' => $this->mfront->pendaftaran('id_baru'),
                'mahasiswa' => $this->madmin->get_mahasiswa('data_mhs')

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/data_mahasiswa', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function tambah_mahasiswa()
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
                    'keterangan' => 'belum dinilai',
                ];

                $save = $this->madmin->save_mahasiswa($simpan_data);

                if ($save) {
                    $this->session->set_flashdata('success', '<p> Data dan File berhasil disimpan,terima kasih.</p>');
                } else {
                    $this->session->set_flashdata('error', '<p> Gagal! Data dan File tidak berhasil disimpan , ulangi kembali!</p>');
                }
                redirect('Ctrl_admin/data_mahasiswa');
            } else {
                redirect('Ctrl_admin/data_mahasiswa');
            }
        } else {
            redirect('Ctrl_admin/data_mahasiswa');
        }
    }
    public function edit_mahasiswa()
    {
        if (isset($_POST['btnedit'])) {
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
                $update_data = [
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
                ];
                $where = $this->input->post('id_pendaftaran');
                $update = $this->madmin->update_mahasiswa($update_data, $where);

                if ($update) {
                    $this->session->set_flashdata('success', '<p> Data dan File berhasil disimpan,terima kasih.</p>');
                } else {
                    $this->session->set_flashdata('error', '<p> Gagal! Data dan File tidak berhasil disimpan , ulangi kembali!</p>');
                }
                redirect('Ctrl_admin/data_mahasiswa');
            } else {
                redirect('Ctrl_admin/data_mahasiswa');
            }
        } else {
            redirect('Ctrl_admin/data_mahasiswa');
        }
    }
    public function hapus_mahasiswa()
    {
        if (isset($_POST['btnhapus'])) {

            $where = $this->input->post('id_pendaftaran');
            $delete = $this->madmin->delete_mahasiswa($where);

            if ($delete) {
                $this->session->set_flashdata('success', '<p> Data Mahasiswa Berhasil Dihapus! <strong></strong></p>');
                redirect('Ctrl_admin/data_mahasiswa');
            } else {
                $this->session->set_flashdata('error', '<p> Data Mahasiswa Gagal Dihapus!</p>');
                redirect('Ctrl_admin/data_mahasiswa');
            }
            redirect('Ctrl_admin/data_mahasiswa');
        }
        redirect('Ctrl_admin/data_mahasiswa');
    }

    public function data_kriteria()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('level_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Data Kriteria",
                'kriteria' => $this->madmin->get_kriteria('data_krt')

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/data_kriteria', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function tambah_kriteria()
    {
        if (isset($_POST['btnsimpan'])) {
            $send = array(
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'bobot' => $this->input->post('bobot'),
            );
            $save = $this->madmin->save_kriteria($send);

            if ($save == true) {
                $this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Disimpan! <strong></strong></p>');
                redirect('Ctrl_admin/data_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Kriteria Gagal Disimpan!</p>');
                redirect('Ctrl_admin/data_kriteria');
            }
            redirect('Ctrl_admin/data_kriteria');
        }
    }
    public function edit_kriteria($id)
    {
        if (isset($_POST['btnedit'])) {
            $data = array(
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'bobot' => $this->input->post('bobot'),
            );
            $where = $id;
            $update = $this->madmin->update_kriteria($data, $where);

            if ($update == true) {
                $this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Diupdate! <strong></strong></p>');
                redirect('Ctrl_admin/data_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Kriteria Gagal Diupdate!</p>');
                redirect('Ctrl_admin/data_kriteria');
            }
            redirect('Ctrl_admin/data_kriteria');
        }
    }
    public function hapus_kriteria()
    {
        if (isset($_POST['btnhapus'])) {

            $where = $this->input->post('id');
            $delete = $this->madmin->delete_kriteria($where);

            if ($delete == true) {
                $this->session->set_flashdata('success', '<p> Data Kriteria Berhasil Dihapus! <strong></strong></p>');
                redirect('Ctrl_admin/data_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Kriteria Gagal Dihapus!</p>');
                redirect('Ctrl_admin/data_kriteria');
            }
            redirect('Ctrl_admin/data_kriteria');
        }
    }
    public function sub_kriteria()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('level_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Data Sub Kriteria",
                'data_kriteria' => $this->madmin->get_kriteria('data_krt'),
                'sub_kriteria' => $this->madmin->get_subkriteria('sub_kriteria'),

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/sub_kriteria', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function tambah_subkriteria()
    {
        if (isset($_POST['btnTambah'])) {
            $gn = $this->input->post('id_kriteria');
            $cek = $this->madmin->get_namakriteria('gets', $gn);
            $nama_kriteria = $cek['res']->nama_kriteria;

            $send = array(
                'id_kriteria' => $gn,
                'nama_kriteria' => $nama_kriteria,
                'nilai' => $this->input->post('nilai'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $save = $this->madmin->save_subkriteria($send);

            if ($save == true) {
                $this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Disimpan! <strong></strong></p>');
                redirect('Ctrl_admin/sub_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Disimpan!</p>');
                redirect('Ctrl_admin/sub_kriteria');
            }
            redirect('Ctrl_admin/sub_kriteria');
        }
    }
    public function edit_subkriteria($id)
    {
        if (isset($_POST['btnEdit'])) {
            $gn = $this->input->post('id_kriteria');
            $cek = $this->madmin->get_namakriteria('gets', $gn);
            $nama_kriteria = $cek['res']->nama_kriteria;
            $data = array(
                'id_kriteria' => $gn,
                'nama_kriteria' => $nama_kriteria,
                'nilai' => $this->input->post('nilai'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $where = $id;
            $update = $this->madmin->update_subkriteria($data, $where);

            if ($update == true) {
                $this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Diupdate! <strong></strong></p>');
                redirect('Ctrl_admin/sub_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Diupdate!</p>');
                redirect('Ctrl_admin/sub_kriteria');
            }
            redirect('Ctrl_admin/sub_kriteria');
        }
    }
    public function hapus_subkriteria()
    {
        if (isset($_POST['btnHapus'])) {

            $where = $this->input->post('id_sub');
            $delete = $this->madmin->delete_subkriteria($where);

            if ($delete == true) {
                $this->session->set_flashdata('success', '<p> Data Sub Kriteria Berhasil Dihapus! <strong></strong></p>');
                redirect('Ctrl_admin/sub_kriteria');
            } else {
                $this->session->set_flashdata('error', '<p> Data Sub Kriteria Gagal Dihapus!</p>');
                redirect('Ctrl_admin/sub_kriteria');
            }
            redirect('Ctrl_admin/sub_kriteria');
        }
    }
    public function data_user()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('username_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Manajemen User",
                'data_user' => $this->madmin->get_user('data_user'),

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/data_user', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function tambah_user()
    {
        if (isset($_POST['btnTambah'])) {
            $send = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level_akses' => $this->input->post('level_akses'),
            );
            $save = $this->madmin->save_user($send);

            if ($save == true) {
                $this->session->set_flashdata('success', '<p> Data User Berhasil Disimpan! <strong></strong></p>');
                redirect('Ctrl_admin/data_user');
            } else {
                $this->session->set_flashdata('error', '<p> Data User Gagal Disimpan!</p>');
                redirect('Ctrl_admin/data_user');
            }
            redirect('Ctrl_admin/data_user');
        }
    }
    public function edit_user()
    {
        if (isset($_POST['btnedit'])) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level_akses' => $this->input->post('level_akses')
            );
            $where = $this->input->post('id');
            $update = $this->madmin->update_user($data, $where);

            if ($update == true) {
                $this->session->set_flashdata('success', '<p> Data User Berhasil Diupdate! <strong></strong></p>');
                redirect('Ctrl_admin/data_user');
            } else {
                $this->session->set_flashdata('error', '<p> Data User Gagal Diupdate!</p>');
                redirect('Ctrl_admin/data_user');
            }
            redirect('Ctrl_admin/data_user');
        }
    }
    public function hapus_user()
    {
        if (isset($_POST['btnHapus'])) {

            $where = $this->input->post('id');
            $delete = $this->madmin->delete_user($where);

            if ($delete == true) {
                $this->session->set_flashdata('success', '<p> Data User Berhasil Dihapus! <strong></strong></p>');
                redirect('Ctrl_admin/data_user');
            } else {
                $this->session->set_flashdata('error', '<p> Data Tim Gagal Dihapus!</p>');
                redirect('Ctrl_admin/data_user');
            }
            redirect('Ctrl_admin/data_user');
        }
    }
    public function data_periode()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('username_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Data Periode",
                'data_periode' => $this->madmin->get_periode('data_periode'),

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/data_periode', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function tambah_periode()
    {
        if (isset($_POST['btnTambah'])) {
            $send = array(
                'periode' => $this->input->post('periode'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $save = $this->madmin->save_periode($send);

            if ($save == true) {
                $this->session->set_flashdata('success', '<p> Data Periode Berhasil Disimpan! <strong></strong></p>');
                redirect('Ctrl_admin/data_periode');
            } else {
                $this->session->set_flashdata('error', '<p> Data Periode Gagal Disimpan!</p>');
                redirect('Ctrl_admin/data_periode');
            }
            redirect('Ctrl_admin/data_periode');
        }
    }
    public function edit_periode()
    {
        if (isset($_POST['btnedit'])) {
            $data = array(
                'periode' => $this->input->post('periode'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $where = $this->input->post('id_periode');
            $update = $this->madmin->update_periode($data, $where);

            if ($update == true) {
                $this->session->set_flashdata('success', '<p> Data Periode Berhasil Diupdate! <strong></strong></p>');
                redirect('Ctrl_admin/data_periode');
            } else {
                $this->session->set_flashdata('error', '<p> Data Periode Gagal Diupdate!</p>');
                redirect('Ctrl_admin/data_periode');
            }
            redirect('Ctrl_admin/data_periode');
        }
    }
    public function hapus_periode()
    {
        if (isset($_POST['btnHapus'])) {

            $where = $this->input->post('id_periode');
            $delete = $this->madmin->delete_periode($where);

            if ($delete == true) {
                $this->session->set_flashdata('success', '<p> Data Periode Berhasil Dihapus! <strong></strong></p>');
                redirect('Ctrl_admin/data_periode');
            } else {
                $this->session->set_flashdata('error', '<p> Data Periode Gagal Dihapus!</p>');
                redirect('Ctrl_admin/data_periode');
            }
            redirect('Ctrl_admin/data_periode');
        }
    }
    public function form_penilaian()
    {
        $sess = $this->session->userdata('username_user');
        if ($this->session->userdata('username_user') == NULL) {
            redirect('Ctrl_front/login');
        } else {
            $data = array(
                'user'        => $this->madmin->base('bio', $sess),
                'judul_web'    => "Form Penilaian",
                'mahasiswa' => $this->madmin->get_mahasiswa('data_mhs'),
                'sub_k1' => $this->madmin->get_subk1('sub_kriteria'),
                'sub_k2' => $this->madmin->get_subk2('sub_kriteria'),
                'sub_k3' => $this->madmin->get_subk3('sub_kriteria'),
                'sub_k4' => $this->madmin->get_subk4('sub_kriteria'),

            );
            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/form_penilaian', $data);
            $this->load->view('temp_back/footer');
        }
    }
    public function input_nilai()
    {
        if (isset($_POST['btninnilai'])) {
            $parmhs = $this->input->post('parameter_mahasiswa');
            $parpres = $this->input->post('parameter_prestasi');
            $paripk = $this->input->post('parameter_ipk');
            $parorg = $this->input->post('parameter_organisasi');

            // parameter mahasiswa
            $cekmhs = $this->madmin->get_nilaikriteria('gets', $parmhs);
            $nilaimhs = $cekmhs['res']->nilai;
            $idmhs = $cekmhs['res']->id_kriteria;
            $bbmhs = $this->madmin->get_bobotkriteria('gets', $idmhs);
            $bobotmhs = $bbmhs['res']->bobot;

            $p_mhs = $nilaimhs * $bobotmhs / 100;
            $parameter_mahasiswa = substr($p_mhs, 0, 8);

            // parameter prestasi
            $cekpres = $this->madmin->get_nilaikriteria('gets', $parpres);
            $nilaipres = $cekpres['res']->nilai;
            $idpres = $cekpres['res']->id_kriteria;
            $bbpres = $this->madmin->get_bobotkriteria('gets', $idpres);
            $bobotpres = $bbpres['res']->bobot;

            $p_pres = $nilaipres * $bobotpres / 100;
            $parameter_prestasi = substr($p_pres, 0, 8);

            // parameter ipk
            $cekipk = $this->madmin->get_nilaikriteria('gets', $paripk);
            $nilaiipk = $cekipk['res']->nilai;
            $idipk = $cekipk['res']->id_kriteria;
            $bbipk = $this->madmin->get_bobotkriteria('gets', $idipk);
            $bobotipk = $bbipk['res']->bobot;

            $p_ipk = $nilaiipk * $bobotipk / 100;
            $parameter_ipk = substr($p_ipk, 0, 8);

            // parameter organisasi
            $cekorg = $this->madmin->get_nilaikriteria('gets', $parorg);
            $nilaiorg = $cekorg['res']->nilai;
            $idorg = $cekorg['res']->id_kriteria;
            $bborg = $this->madmin->get_bobotkriteria('gets', $idorg);
            $bobotorg = $bborg['res']->bobot;

            $p_org = $nilaiorg * $bobotorg / 100;
            $parameter_organisasi = substr($p_org, 0, 8);

            $ttl_nilai = $parameter_mahasiswa + $parameter_prestasi + $parameter_ipk + $parameter_organisasi;
            $total_nilai = substr($ttl_nilai, 0, 8);
            $id_pendaftaran = $this->input->post('id_pendaftaran');
            $send = array(
                'id_penilaian' => $id_pendaftaran,
                'nim' => $this->input->post('nim'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nik' => $this->input->post('nik'),
                'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
                'program_studi' => $this->input->post('fakultas'),
                'periode' => $this->input->post('periode'),
                'parameter_mahasiswa' => $parameter_mahasiswa,
                'parameter_prestasi' => $parameter_prestasi,
                'parameter_ipk' => $parameter_ipk,
                'parameter_organisasi' => $parameter_organisasi,
                'total_nilai' => $total_nilai,
                'Keterangan' => 'Tidak Lolos',
            );
            $status = array(
                'status' => 'sudah dinilai',
            );
            $save = $this->madmin->save_nilai($send);
            $where = $this->input->post('id_pendaftaran');
            $update = $this->madmin->update_status($status, $where);

            $dataTop = array(
                'keterangan' => 'Lolos',
            );
            $top30 = $this->madmin->get_top30('top30');
            foreach ($top30 as $top) {
                $id_penilaianTop = $top['id_penilaian'];
                $updateTop = $this->madmin->update_statusTop($dataTop, $id_penilaianTop);
                // $updateUnder = $this->madmin->update_statusTL($dataTL, $id_penilaianTop);
            }

            if ($updateTop) {
                $this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Disimpan! <strong></strong></p>');
                redirect('Ctrl_admin/form_penilaian');
            } else {
                $this->session->set_flashdata('error', '<p> Data Penilaian Gagal Disimpan!</p>');
                redirect('Ctrl_admin/form_penilaian');
            }
            redirect('Ctrl_admin/form_penilaian');
        }
    }
    public function ubah_nilai()
    {
        if (isset($_POST['btnubnilai'])) {
            $parmhs = $this->input->post('parameter_mahasiswa');
            $parpres = $this->input->post('parameter_prestasi');
            $paripk = $this->input->post('parameter_ipk');
            $parorg = $this->input->post('parameter_organisasi');

            // parameter mahasiswa
            $cekmhs = $this->madmin->get_nilaikriteria('gets', $parmhs);
            $nilaimhs = $cekmhs['res']->nilai;
            $idmhs = $cekmhs['res']->id_kriteria;
            $bbmhs = $this->madmin->get_bobotkriteria('gets', $idmhs);
            $bobotmhs = $bbmhs['res']->bobot;

            $p_mhs = $nilaimhs * $bobotmhs / 100;
            $parameter_mahasiswa = substr($p_mhs, 0, 8);

            // parameter prestasi
            $cekpres = $this->madmin->get_nilaikriteria('gets', $parpres);
            $nilaipres = $cekpres['res']->nilai;
            $idpres = $cekpres['res']->id_kriteria;
            $bbpres = $this->madmin->get_bobotkriteria('gets', $idpres);
            $bobotpres = $bbpres['res']->bobot;

            $p_pres = $nilaipres * $bobotpres / 100;
            $parameter_prestasi = substr($p_pres, 0, 8);

            // parameter ipk
            $cekipk = $this->madmin->get_nilaikriteria('gets', $paripk);
            $nilaiipk = $cekipk['res']->nilai;
            $idipk = $cekipk['res']->id_kriteria;
            $bbipk = $this->madmin->get_bobotkriteria('gets', $idipk);
            $bobotipk = $bbipk['res']->bobot;

            $p_ipk = $nilaiipk * $bobotipk / 100;
            $parameter_ipk = substr($p_ipk, 0, 8);

            // parameter organisasi
            $cekorg = $this->madmin->get_nilaikriteria('gets', $parorg);
            $nilaiorg = $cekorg['res']->nilai;
            $idorg = $cekorg['res']->id_kriteria;
            $bborg = $this->madmin->get_bobotkriteria('gets', $idorg);
            $bobotorg = $bborg['res']->bobot;

            $p_org = $nilaiorg * $bobotorg / 100;
            $parameter_organisasi = substr($p_org, 0, 8);

            $ttl_nilai = $parameter_mahasiswa + $parameter_prestasi + $parameter_ipk + $parameter_organisasi;
            $total_nilai = substr($ttl_nilai, 0, 8);
            $id_pendaftaran = $this->input->post('id_pendaftaran');
            $send = array(
                'nim' => $this->input->post('nim'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nik' => $this->input->post('nik'),
                'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
                'program_studi' => $this->input->post('fakultas'),
                'parameter_mahasiswa' => $parameter_mahasiswa,
                'parameter_prestasi' => $parameter_prestasi,
                'parameter_ipk' => $parameter_ipk,
                'parameter_organisasi' => $parameter_organisasi,
                'total_nilai' => $total_nilai,
            );
            $where = $id_pendaftaran;
            $save = $this->madmin->update_nilai($send, $where);
            if ($save) {
                $this->session->set_flashdata('success', '<p> Data Penilaian Berhasil Diubah! <strong></strong></p>');
                redirect('Ctrl_admin/form_penilaian');
            } else {
                $this->session->set_flashdata('error', '<p> Data Penilaian Gagal Diubah!</p>');
                redirect('Ctrl_admin/form_penilaian');
            }
            redirect('Ctrl_admin/form_penilaian');
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
                'judul_web'    => "Data Penilaian",
                'data_penilaian' => $this->madmin->get_penilaian('penilaian'),

            );

            $this->load->view('temp_back/header', $data);
            $this->load->view('temp_back/hasil_penilaian', $data);
            $this->load->view('temp_back/footer');
        }
    }
}
