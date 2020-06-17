<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | Dashboard';
        $data['page'] = 'jadwal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/admin/index');
        $this->load->view('footers/normal_footer');
    }
}
