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
 * Description of app_auth_model
 *
 * @author Khaer Ansori
 */
class app_auth_model extends CI_Model {
    public function auth_user($data) {
        $auth['user'] = mysql_real_escape_string($data['username']);
        $auth['pass'] = md5(mysql_real_escape_string($data['password']).$this->config->item("key_login"));
        $query = $this->db->get_where("tbl_admin", $auth);
        $num = $query->num_rows();
        if($num > 0) {
            foreach ($query->result() as $q) {
                $sess_data['logged_in'] = 'LaporNdanSayaTelahMasuk';
                $sess_data['sess_id_user'] = $q->id_admin;
                $sess_data['sess_user'] = $q->user;
                $sess_data['sess_nama'] = $q->nama;
                $sess_data['sess_level'] = $q->level;
                
                $this->session->set_userdata($sess_data);
            }
            redirect("app");
        } else {
            $this->session->set_flashdata("result_login","Data yang anda masukkan salah.");
            redirect("auth");
        }
    }
}

/* End of file app_auth_model.php */
/* Location: ./application/modules/app/models/app_auth_model.php */
