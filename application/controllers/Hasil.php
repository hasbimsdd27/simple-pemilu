<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Hasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $waktu = strtotime('2019-04-17 16:00:59'); //waktu dibuka
        $skr = time();
        if ($waktu >= $skr) {
            redirect('limit');
        }
    }
    public function index()
    {

        $data['suara'] = $this->db->get('tb_pilihan')->num_rows();
        $data['p1'] = $this->db->get_where('tb_pilihan', ['pilihan' => '01'])->num_rows();
        $data['p2'] = $this->db->get_where('tb_pilihan', ['pilihan' => '02'])->num_rows();
        $data['per1'] = ($data['p1'] / $data['suara']) * 100;
        $data['per2'] = ($data['p2'] / $data['suara']) * 100;
        $data['judul'] = "Hasil";
        $this->load->view('templates/header', $data);
        $this->load->view('hasil/index', $data);
        $this->load->view('templates/footer');
    }
}
