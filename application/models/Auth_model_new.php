<?php

class Auth_model_new extends CI_Model
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
        // $post = $this->input->post();
        // $this->db->query("SET time_zone='+7:00'");

        // // cari user berdasarkan username dan password
        // $this->db->where('username', $post["username"])
        //          ->where('password', $post["password"]);
        // $user = $this->db->get($this->_table)->row();


        // jika user terdaftar
        // if ($user) {

        //     if ($user->is_active == "1") {

        //         // periksa password-nya
        //         #$isPasswordTrue = password_verify($post["password"], $user->password);
        //         $isPasswordTrue = $user->password == $user->password;
        //         // periksa role-nya
        //         $isAdmin = $user->level == "admin";

        //         // jika password benar dan dia admin
        //         if ($isPasswordTrue && $isAdmin) {
        //             // login sukses yay!
        //             /*$data_sesi = [
        //                 'username' => $user['username'],
        //                 'level' => $user['username'],
        //                 'fullname' => $user['fullname'],
        //                 'gambar' => $user['gambar'],
        //                 'id_dept' => $user['id_dept'],

        //             ];*/
        //             $this->session->set_userdata(['user_logged' => $user]);
        //             //$this->session->set_userdata($data_sesi);

        //             $this->_updateLastLogin($user->user_id);
        //             return true;
        //         } else {
        //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not registered ! </div>');
        //             redirect('login');
        //         }
        //     } else {
        //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIK is not actived ! </div>');
        //         redirect('login');
        //     }
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password or user not registered ! </div>');
        //     redirect('login');
        // }
        // // login gagal
        // return false;


        //cara ke-2
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // echo $username;
        // echo $password;
        // var_dump($password, $username);
        // die;

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cekpassword dengan has
                // if (password_verify($password, $user['password'])) {
                //cek password tanpa hash
                if ($user['password'] == $password) {
                    $data = [
                        'username' => $user['username'],
                        // 'password' => $user['password'],
                        'role_id' => $user['role_id']

                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == '2') {
                        redirect('admin/dashboard');
                    } else {
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password ' . $user['fullname'] . ' <i class="far fa-smile-beam"></i> ! </div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username ' . $user['fullname'] . ' is not actived, please contact your administrator ! </div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered ! </div>');
            redirect('login');
        }
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
