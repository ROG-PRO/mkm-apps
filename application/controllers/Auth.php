<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("auth_model");
        $this->load->model("auth_model_new");
        $this->load->library('form_validation', 'session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // tampilkan halaman login
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view("loginpage.php", $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        // var_dump($user);
        // die;

        if ($user) {
            //user ada
            if ($user['is_active'] == 1) {
                //cek password
                if ($user['password'] == $password) {
                    redirect(site_url('admin/brand'));
                } else {
                    $this->session->set_flashdata('message', '<div style="font-size:14px;" class="alert alert-danger" role="alert">Wrong password</div>');
                    redirect(site_url('auth'));
                }
            } else {
                $this->session->set_flashdata('message', '<div style="font-size:14px;" class="alert alert-danger" role="alert">Username is not activated</div>');
                redirect(site_url('auth'));
            }
        } else {
            $this->session->set_flashdata('message', '<div style="font-size:14px;" class="alert alert-danger" role="alert">Username is not register</div>');
            redirect(site_url('auth'));
        }
    }

    public function logout()
    {
        // hancurkan semua sesi
        //$this->session->sess_destroy();
        //$this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div style="font-size:14px;" class="alert alert-success" role="alert">You have been logout</div>');
        redirect(site_url('login'));
    }

    public function registration()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match !',
            'min_length' => 'Password too short !'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('admin/register_page', $data);
        } else {

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => '2',
                'photo' => 'default.jpg',
                'created_at' => time(),
                'is_active' => '1',

            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div style="font-size:14px;" class="alert alert-success" role="alert">Congratulation! your account has been created!</div>');
            redirect(site_url('login'));
        }
    }
}
