<?php

class Auth_model extends CI_Model
{
    private $_table = "user";
    #$logged_user = $this->session->userdata('user_logged');
    #echo $logged_user->username


    /*public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }*/

    public function doLogin()
    {
        $post = $this->input->post();
        $this->db->query("SET time_zone='+7:00'");

        // cari user berdasarkan username dan password
        $this->db->where('username', $post["username"]);
        // ->where('password', $post["password"]);

        $user = $this->db->get($this->_table)->row();

        $password = $post['password'];

        // jika user terdaftar
        if ($user) {

            if ($user->is_active == "1") {


                //     // periksa password-nya
                //     #$isPasswordTrue = password_verify($post["password"], $user->password);
                //     $isPasswordTrue = $user->password == $post['password'];
                //     // periksa role-nya
                //     $isAdmin = $user->level == "admin";

                //     // jika password benar dan dia admin
                if ($user->password == $password) {
                    // echo 'password benar !';
                    // die;
                    //         // login sukses yay!
                    $data = [
                        'username' => $user->username,
                        'role_id' => $user->role_id,
                        'fullname' => $user->fullname,
                        'gambar' => $user->gambar,
                        'id_dept' => $user->id_dept,

                    ];
                    $this->session->set_userdata(['user_logged' => $user]);
                    // $this->session->set_userdata($data);
                    if ($user->role_id == '1') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('admin/dashboard');
                        // return true;
                    } else if ($user->role_id == '2') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('marketing/inquiry');
                    } else if ($user->role_id == '3') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('engineering/estimationcost');
                    } else if ($user->role_id == '4') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('planner/issuedppb');
                    } else if ($user->role_id == '5') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('purchasing/receive');
                    } else if ($user->role_id == '6') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('Engineering/Estimationcost');
                    } else if ($user->role_id == '7') {
                        $this->_updateLastLogin($user->user_id);
                        redirect('production/workorder');
                    } else {
                        // echo 'password slh';
                        // die;
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password ! </div>');
                        redirect('login');
                    }
                } else {
                    // echo 'password slh';
                    // die;
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password ! </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not actived ! </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not registered ! </div>');
            redirect('login');
        }
        // login gagal
        // return false;
    }



    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }
}
