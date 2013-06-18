<?php if (!defined('BASEPATH')) die();
/* 
 * Copyright (C) 2013 Khaer Ansori
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of auth
 *
 * @author Khaer Ansori
 */
class Auth extends Main_Controller {
    public function index() {
        //put your code here
        if($this->session->userdata("logged_in")!="") {
            redirect("app");
        }
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == FALSE) {
            $this->load->view('app/include/header', $d);
            $this->load->view('user_login/bg_home');
            $this->load->view('app/include/footer');
        } else {
            $data['username'] = $this->input->post("username");
            $data['password'] = $this->input->post("password");
            
            $this->app_auth_model->auth_user($data);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect("app");
    }
}

/* End of file auth.php */
/* Location: ./application/modules/auth/controllers/auth.php */
