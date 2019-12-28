<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Limit extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Error";
        $this->load->view('templates/header', $data);
        $this->load->view('err');
        $this->load->view('templates/footer');
    }
}
