<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_jadwal_poli');
        $this->load->model('M_getDok');
        $this->load->model('M_getPer'); 

        $data['title'] = 'MANPRO-RS | Jadwal Poliklinik';

        $data['poliklinik'] = $this->m_jadwal_poli->getPoliklinik(); 
        $data['M_jadwal_poli'] = $this->db->get('tb_poliklinik')->result_array(); 

        $data['dokter'] = $this->m_getDok->getDokter(); 
        $data['M_getDok'] = $this->db->get('tb_dokter')->result_array();
        
        $data['perawat'] = $this->m_getPer->getPer(); 
        $data['M_getPer'] = $this->db->get('tb_perawat')->result_array(); 

        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['jadwal_poli'] = $this->m_jadwal_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/jadwal_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function list_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | List Poliklinik';

        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['list_poli'] = $this->m_list_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/list_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function dokter_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dokter Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/dokter_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function pasien()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Pasien';
        $data['page'] = 'pasien';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['pasien'] = $this->m_pasien->tampil_data()->result();
        $this->load->view('pages/poliklinik/pasien', $data);
        $this->load->view('footers/normal_footer');
    }

    public function perawat_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Perawat Poliklinik';
        $data['page'] = 'perawat_poli';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['perawat_poli'] = $this->m_perawat_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/perawat_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function obat()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Obat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['obat'] = $this->m_obat->tampil_data()->result();
        $this->load->view('pages/poliklinik/obat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function treatment()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Treatment';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['treatment'] = $this->m_treatment->tampil_data()->result();
        $this->load->view('pages/poliklinik/treatment', $data);
        $this->load->view('footers/normal_footer');
    }

    public function regis_poli()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_regis_poli'); 

        $data['title'] = 'MANPRO-RS | Resgistrasi';
        
        $data['getPasien'] = $this->m_regis_poli->getPasien(); 
        $data['M_regis_poli'] = $this->db->get('tb_pasien')->result_array();

        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['regis_poli'] = $this->m_regis_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/regis_poli', $data);
        $this->load->view('footers/normal_footer');
    }

    public function medrec()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('M_medrec');
        $data['getPasien'] = $this->m_medrec->getPasien(); 
        $data['M_medrec'] = $this->db->get('tb_pasien')->result_array();

        $this->load->model('M_getDok');
        $data['dokter'] = $this->m_getDok->getDokter(); 
        $data['M_getDok'] = $this->db->get('tb_dokter')->result_array();
        
        $this->load->model('M_getDiagnosa');
        $data['getDiagnosa'] = $this->M_getDiagnosa->getDiagnosa(); 
        $data['M_getDiagnosa'] = $this->db->get('tb_treatment')->result_array();
        
        $this->load->model('M_getObat');
        $data['getObat'] = $this->m_getObat->getObat(); 
        $data['M_getObat'] = $this->db->get('tb_drugs')->result_array();

        $data['title'] = 'MANPRO-RS | Medical Recapitulate';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $data['medrec'] = $this->m_medrec->tampil_data()->result();
        $this->load->view('pages/poliklinik/medrec', $data);
        $this->load->view('footers/normal_footer');
    }

    public function tambah_aksi_dokter()
    {
        $nama_dok           = $this->input->post('nama_dok');
        $no_telp        = $this->input->post('no_telp');
        $spesialis      = $this->input->post('spesialis');
        $status         = $this->input->post('status');

        $data = array(
            'nama_dok'      => $nama_dok,
            'no_telp'   => $no_telp,
            'spesialis' => $spesialis,
            'status'    => $status,
        );

        $this->m_dokter_poli->input_data($data, 'tb_dokter');
        redirect('poliklinik/dokter_poli');
    }

    public function tambah_aksi_perawat()
    {
        $nama           = $this->input->post('nama');
        $no_telp        = $this->input->post('no_telp');
        $spesialis      = $this->input->post('spesialis');
        $status         = $this->input->post('status');

        $data = array(
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'spesialis' => $spesialis,
            'status'    => $status,
        );

        $this->m_perawat_poli->input_data($data, 'tb_perawat');
        redirect('poliklinik/perawat_poli');
    }

    public function tambah_aksi_jadwal()
    {
        $id_poli           = $this->input->post('id_poli');
        $id_dokter        = $this->input->post('id_dokter');
        $id_perawat      = $this->input->post('id_perawat');
        $hari         = $this->input->post('hari');
        $jam         = $this->input->post('jam');

        $data = array(
            'id_poli'      => $id_poli,
            'id_dokter'   => $id_dokter,
            'id_perawat' => $id_perawat,
            'hari'    => $hari,
            'jam'    => $jam,
        );

        $this->m_jadwal_poli->input_data($data, 'tb_jadwal');
        redirect('poliklinik/index');
    }

    public function tambah_aksi_medrec()
    {
        $id_pasien           = $this->input->post('id_pasien');
        $tgl_check        = $this->input->post('tgl_check');
        $diagnosa      = $this->input->post('diagnosa');
        $id_dokter         = $this->input->post('id_dokter');
        $id_treatment         = $this->input->post('id_treatment');
        $id_drugs         = $this->input->post('id_drugs');        
        $dosis         = $this->input->post('dosis');
        $aturan_pakai         = $this->input->post('aturan_pakai');

        $data = array(
            'id_pasien'      => $id_pasien,
            'tgl_check'         => $tgl_check,
            'diagnosa' => $diagnosa,
            'id_dokter'    => $id_dokter,
            'id_treatment'    => $id_treatment,
            'id_drugs'    => $id_drugs,            
            'dosis'    => $dosis,
            'aturan_pakai'    => $aturan_pakai
        );

        $this->m_medrec->input_data($data, 'tb_medrec');
        redirect('poliklinik/medrec');
    }


    public function tambah_aksi_list_poli()
    {
        $nama_voli           = $this->input->post('nama_voli');
        $ruangan        = $this->input->post('ruangan');
        $type      = $this->input->post('type');

        $data = array(
            'nama_voli'      => $nama_voli,
            'ruangan' => $ruangan,
            'type' => $type,
        );

        $this->m_list_poli->input_data($data, 'tb_poliklinik');
        redirect('poliklinik/list_poli');
    }

    public function tambah_aksi_pasien()
    {
        $nama_pasien           = $this->input->post('nama_pasien');
        $no_telp        = $this->input->post('no_telp');
        $alamat         = $this->input->post('alamat');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $pekerjaan      = $this->input->post('pekerjaan');

        $data = array(
            'nama_pasien'      => $nama_pasien,
            'no_telp'   => $no_telp,
            'alamat'    => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'pekerjaan' => $pekerjaan,
        );

        $this->m_pasien->input_data($data, 'tb_pasien');
        redirect('poliklinik/pasien');
    }

    public function tambah_aksi_obat()
    {
        $nama_drugs           = $this->input->post('nama_drugs');
        $merk        = $this->input->post('merk');
        $type      = $this->input->post('type');

        $data = array(
            'nama_drugs'      => $nama_drugs,
            'merk' => $merk,
            'type' => $type,
        );

        $this->m_obat->input_data($data, 'tb_drugs');
        redirect('poliklinik/obat');
    }

    public function tambah_aksi_treatment()
    {
        $treatment        = $this->input->post('treatment');

        $data = array(
            'treatment'      => $treatment,
        );

        $this->m_treatment->input_data($data, 'tb_treatment');
        redirect('poliklinik/treatment');
    }

    public function hapus_dokter($id_dokter)
    {
        $where = array('id_dokter' => $id_dokter);
        $this->m_dokter_poli->hapus_data($where, 'tb_dokter');
        redirect('poliklinik/dokter_poli');
    }

    public function hapus_jadwal($id_jadwal)
    {
        $where = array('id_jadwal' => $id_jadwal);
        $this->m_jadwal_poli->hapus_data($where, 'tb_jadwal');
        redirect('poliklinik/index');
    }

    public function hapus_list($id_poli)
    {
        $where = array('id_poli' => $id_poli);
        $this->m_list_poli->hapus_data($where, 'tb_poliklinik');
        redirect('poliklinik/list_poli');
    }

    public function hapus_perawat($id_perawat)
    {
        $where = array('id_perawat' => $id_perawat);
        $this->m_perawat_poli->hapus_data($where, 'tb_perawat');
        redirect('poliklinik/perawat_poli');
    }

    public function hapus_pasien($id_pasien)
    {
        $where = array('id_pasien' => $id_pasien);
        $this->m_pasien->hapus_data($where, 'tb_pasien');
        redirect('poliklinik/pasien');
    }

    public function hapus_obat($id_drugs)
    {
        $where = array('id_drugs' => $id_drugs);
        $this->m_obat->hapus_data($where, 'tb_drugs');
        redirect('poliklinik/obat');
    }

    public function hapus_treatment($id_treatment)
    {
        $where = array('id_treatment' => $id_treatment);
        $this->m_treatment->hapus_data($where, 'tb_treatment');
        redirect('poliklinik/treatment');
    }

    public function edit_dokter($id_dokter)
    {
        $where = array('id_dokter' => $id_dokter);
        $data['dokter_poli'] = $this->m_dokter_poli->edit_data($where, 'tb_dokter')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dokter Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_dokter', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_dokter()
    {
        $id_dokter  = $this->input->post('id_dokter');
        $nama_dok       = $this->input->post('nama_dok');
        $no_telp    = $this->input->post('no_telp');
        $spesialis  = $this->input->post('spesialis');
        $status     = $this->input->post('status');

        $data = array(
            'nama_dok'          => $nama_dok,
            'no_telp'       => $no_telp,
            'spesialis'     => $spesialis,
            'status'        => $status
        );

        $where = array(
            'id_dokter'  => $id_dokter
        );

        $this->m_dokter_poli->update_data($where, 'tb_dokter', $data);
        redirect('poliklinik/dokter_poli');
    }

    public function edit_list($id_poli)
    {
        $where = array('id_poli' => $id_poli);
        $data['list_poli'] = $this->m_list_poli->edit_data($where, 'tb_poliklinik')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | List Poliklinik';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['dokter_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_list', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_list()
    {
        $id_poli    = $this->input->post('id_poli');
        $nama_voli  = $this->input->post('nama_voli');
        $ruangan    = $this->input->post('ruangan');
        $type       = $this->input->post('type');

        $data = array(
            'nama_voli'          => $nama_voli,
            'ruangan'            => $ruangan,
            'type'               => $type
        );

        $where = array(
            'id_poli'  => $id_poli
        );

        $this->m_list_poli->update_data($where, 'tb_poliklinik', $data);
        redirect('poliklinik/list_poli');
    }

    public function edit_perawat($id_perawat)
    {
        $where = array('id_perawat' => $id_perawat);
        $data['perawat_poli'] = $this->m_perawat_poli->edit_data($where, 'tb_perawat')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dokter Perawat';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['perawat_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_perawat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_perawat()
    {
        $id_perawat  = $this->input->post('id_perawat');
        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $spesialis  = $this->input->post('spesialis');
        $status     = $this->input->post('status');

        $data = array(
            'nama'          => $nama,
            'no_telp'       => $no_telp,
            'spesialis'     => $spesialis,
            'status'        => $status
        );

        $where = array(
            'id_perawat'  => $id_perawat
        );

        $this->m_perawat_poli->update_data($where, 'tb_perawat', $data);
        redirect('poliklinik/perawat_poli');
    }

    public function edit_pasien($id_pasien)
    {
        $where = array('id_pasien' => $id_pasien);
        $data['pasien'] = $this->m_pasien->edit_data($where, 'tb_pasien')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Pasien';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['pasien'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_pasien', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_pasien()
    {
        $id_pasien  = $this->input->post('id_pasien');
        $nama_pasien       = $this->input->post('nama_pasien');
        $no_telp    = $this->input->post('no_telp');
        $alamat     = $this->input->post('alamat');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $pekerjaan  = $this->input->post('pekerjaan');

        $data = array(
            'nama_pasien'          => $nama_pasien,
            'no_telp'       => $no_telp,
            'alamat'        => $alamat,
            'tgl_lahir'        => $tgl_lahir,
            'pekerjaan'        => $pekerjaan
        );

        $where = array(
            'id_pasien'  => $id_pasien
        );

        $this->m_pasien->update_data($where, 'tb_pasien', $data);
        redirect('poliklinik/pasien');
    }

    public function edit_obat($id_drugs)
    {
        $where = array('id_drugs' => $id_drugs);
        $data['obat'] = $this->m_obat->edit_data($where, 'tb_drugs')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Obat-obatan';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['obat'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_obat', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_obat()
    {
        $id_drugs   = $this->input->post('id_drugs');
        $nama_drugs       = $this->input->post('nama_drugs');
        $merk       = $this->input->post('merk');
        $type       = $this->input->post('type');


        $data = array(
            'nama_drugs'          => $nama_drugs,
            'merk'       => $merk,
            'type'        => $type,
        );

        $where = array(
            'id_drugs'  => $id_drugs
        );

        $this->m_obat->update_data($where, 'tb_drugs', $data);
        redirect('poliklinik/obat');
    }

    public function edit_treatment($id_treatment)
    {
        $where = array('id_treatment' => $id_treatment);
        $data['treatment'] = $this->m_treatment->edit_data($where, 'tb_treatment')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | treatment-treatmentan';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['treatment'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_treatment', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_treatment()
    {
        $id_treatment  = $this->input->post('id_treatment');
        $treatment       = $this->input->post('treatment');

        $data = array(
            'treatment'          => $treatment
        );

        $where = array(
            'id_treatment'  => $id_treatment
        );

        $this->m_treatment->update_data($where, 'tb_treatment', $data);
        redirect('poliklinik/treatment');
    }

    public function edit_jadwal($id_jadwal)
    {
        $where = array('id_jadwal' => $id_jadwal);
        $data['jadwal_poli'] = $this->m_jadwal_poli->edit_data($where, 'tb_jadwal')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Jadwal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        // $data['perawat_poli'] = $this->m_dokter_poli->tampil_data()->result();
        $this->load->view('pages/poliklinik/edit_jadwal', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_jadwal()
    {
        $id_jadwal  = $this->input->post('id_jadwal');
        $id_poli       = $this->input->post('id_poli');
        $id_dokter    = $this->input->post('id_dokter');
        $id_perawat  = $this->input->post('id_perawat');
        $hari     = $this->input->post('hari');
        $jam     = $this->input->post('jam');

        $data = array(
            'id_poli'          => $id_poli,
            'id_dokter'       => $id_dokter,
            'id_perawat'     => $id_perawat,
            'hari'        => $hari,
            'jam'        => $jam
        );

        $where = array(
            'id_jadwal'  => $id_jadwal
        );

        $this->m_jadwal_poli->update_data($where, 'tb_jadwal', $data);
        redirect('poliklinik/perawat_poli');
    }

    public function edit_regis($id_registrasi)
    {
        $where = array('id_registrasi' => $id_registrasi);
        $data['regis_poli'] = $this->m_regis_poli->edit_data($where, 'tb_registrasi')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Registrasi';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/poliklinik/edit_regis', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_regis()
    {
        $id_registrasi  = $this->input->post('id_registrasi');
        $id_pasien       = $this->input->post('id_pasien');
        $id_jadwal    = $this->input->post('id_jadwal');
        $tanggal  = $this->input->post('tanggal');
        $status     = $this->input->post('status');

        $data = array(
            'id_pasien'          => $id_pasien,
            'id_jadwal'       => $id_jadwal,
            'tanggal'     => $tanggal,
            'status'        => $status,
        );

        $where = array(
            'id_registrasi'  => $id_registrasi
        );

        $this->m_regis_poli->update_data($where, 'tb_registrasi', $data);
        redirect('poliklinik/regis_poli');
    }

    public function edit_medrec($id_medrec)
    {
        $where = array('id_medrec' => $id_medrec);
        $data['medrec'] = $this->m_medrec->edit_data($where, 'tb_medrec')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Edit Medical Recaptulate';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/poliklinik/edit_medrec', $data);
        $this->load->view('footers/normal_footer');
    }

    public function update_medrec()
    {
        $id_medrec  = $this->input->post('id_medrec');
        $id_pasien       = $this->input->post('id_pasien');
        $tgl_check    = $this->input->post('tgl_check');
        $diagnosa  = $this->input->post('diagnosa');
        $id_dokter     = $this->input->post('id_dokter');
        $id_treatment     = $this->input->post('id_treatment');
        $id_drugs     = $this->input->post('id_drugs');
        $dosis     = $this->input->post('dosis');
        $aturan_pakai     = $this->input->post('aturan_pakai');

        $data = array(
            'id_pasien'          => $id_pasien,
            'tgl_check'       => $tgl_check,
            'diagnosa'     => $diagnosa,
            'id_dokter'        => $id_dokter,
            'id_treatment'        => $id_treatment,
            'id_drugs'        => $id_drugs,
            'dosis'        => $dosis,
            'aturan_pakai'        => $aturan_pakai,

        );

        $where = array(
            'id_medrec'  => $id_medrec
        );

        $this->m_medrec->update_data($where, 'tb_medrec', $data);
        redirect('poliklinik/medrec');
    }
}
