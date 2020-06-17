<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'MANPRO-RS | My Profile';
        $data['page'] = 'jadwal';
        $this->load->view('headers/normal_header', $data);
        $this->load->view('sidebar/sidebar', $data);
        $this->load->view('pages/user/index');
        $this->load->view('footers/normal_footer');
    }
}
