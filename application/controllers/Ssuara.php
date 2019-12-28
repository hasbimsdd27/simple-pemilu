<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Ssuara extends CI_Controller
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
        $waktu2 = strtotime('2019-04-17 00:20:00'); //waktu ditutup
        if ($waktu2 <=  $skr) {
            redirect('limit');
        }
    }
    public function index()
    {
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('token', 'Token', 'required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Surat Suara";
            $this->load->view('templates/header', $data);
            $this->load->view('ssuara/login');
            $this->load->view('templates/footer');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $token = htmlspecialchars($this->input->post('token', true));
            $akun = $this->db->get_where('tb_pemilih', ['email' => $email, 'token' => $token])->row_array();
            if ($akun !== 0) {
                $this->session->set_userdata('email', $akun['email']);
                $this->session->set_userdata('token', $akun['token']);
                $this->session->set_userdata('device', $akun['device']);
                var_dump($this->session->userdata('email'));
                var_dump($this->session->userdata('token'));
                var_dump($this->session->userdata('device'));
                redirect('ssuara/surat');
            } else {
                $this->session->set_flashdata('err1', "terdaftar");
                redirect('menu');
            }
        }
    }
    public function surat()
    {
        $this->form_validation->set_rules('pilihan', 'pilihan', 'required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Surat Suara";
            $this->load->view('templates/header', $data);
            $this->load->view('ssuara/index');
            $this->load->view('templates/footer');
        } else {
            $email = $this->session->userdata('email');
            $token = $this->session->userdata('token');
            $device = $this->session->userdata('device');
            $data = [
                'email' => $email,
                'token' => $token,
                'device' => $device,
                'status' => 'sudah'
            ];
            $this->db->where('email', $email);
            $this->db->update('tb_pemilih', $data);
            $kode = base64_encode(random_bytes(32));
            $pilihan = [
                'email' => $email,
                'token' => $token,
                'device' => $device,
                'pilihan' => $this->input->post('pilihan'),
                'jam' => date('H:i'),
                'kode' => $kode
            ];
            $this->db->insert('tb_pilihan', $pilihan);
            $this->session->set_flashdata('sks1', "menggunakan");
            redirect('menu');
            session_destroy();
        }
    }
}
