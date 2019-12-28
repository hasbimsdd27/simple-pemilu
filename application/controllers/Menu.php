<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $waktu = strtotime('2019-04-17 07:00:00'); //waktu dibuka
        $skr = time();
        if ($waktu >= $skr) {
            redirect('limit');
        }
        $waktu2 = strtotime('2019-04-17 13:00:00'); //waktu ditutup
        if ($waktu2 <=  $skr) {
            redirect('limit');
        }
    }

    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Main Menu";
            $this->load->view('templates/header', $data);
            $this->load->view('menu/index');
            $this->load->view('templates/footer');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $device = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $hasil = $this->db->get_where('tb_pemilih', ['email' => $email, 'device' => $device])->num_rows();
            if ($hasil !== 0) {
                $this->session->set_flashdata('err', "terdaftar");
                redirect('menu');
            } else {
                $token = htmlspecialchars(base64_encode(random_bytes(32)));
                $data = [
                    'email' => $email,
                    'token' => $token,
                    'status' => 'belum',
                    'device' => gethostbyaddr($_SERVER['REMOTE_ADDR'])
                ];
                $this->db->insert('tb_pemilih', $data);
                $this->session->set_flashdata('pesan', "$token");
                redirect('menu');
            }
        }
    }
}
