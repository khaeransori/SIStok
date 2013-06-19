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
 * Description of app
 *
 * @author Khaer Ansori
 */
class App extends Secure_Controller {
    public function index() {
        //put your code here
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $page = $this->uri->segment(3);
        $limit = $this->config->item('limit_data');
        $offset = (!$page) ? 0 : $page;
        
        $d['tot'] = $offset;
        $tot_hal = $this->db->get("tbl_stok_barang");
        $config['base_url'] = base_url() . 'app/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $d['list_barang'] = $this->db->get("tbl_stok_barang");
        
        $d['beranda_aktif'] = "active";
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_global/bg_list_stok');
        $this->load->view('include/footer');
    }
    
    public function change_password() {
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/user/bg_change_password');
        $this->load->view('include/footer');
    }
    
    public function save_pass() {
        $this->form_validation->set_rules('pass_lama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'trim|required');
        $this->form_validation->set_rules('ulangi_pass_baru', 'Ulangi Password Baru', 'trim|required');

        $id['user'] = $this->input->post("username");
        $pass_lama = $this->input->post("pass_lama");
        $pass_baru = $this->input->post("pass_baru");
        $ulangi_pass_baru = $this->input->post("ulangi_pass_baru");

        $set['tab_a'] = "active";
        $set['tab_b'] = "";
        $this->session->set_userdata($set);

        if ($this->form_validation->run() == FALSE) {
            $d['pengembang'] = $this->config->item('pengembang');
            $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
            $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
            $d['instansi'] = $this->config->item('nama_instansi');
            $d['credit'] = $this->config->item('credit_aplikasi');
            $d['alamat'] = $this->config->item('alamat_instansi');
            
            $d['beranda_aktif'] = "active";

            $this->load->view('include/header', $d);
            $this->load->view('dashboard_administrator/bg_header');
            $this->load->view('dashboard_administrator/user/bg_change_password');
            $this->load->view('include/footer');
        } else {
            $login['user'] = $id['user'];
            $login['pass'] = md5($pass_lama.$this->config->item("key_login"));
            $cek = $this->db->get_where('tbl_admin', $login);
            if($cek->num_rows()>0) {
                if($pass_baru==$ulangi_pass_baru) {
                    $upd['pass'] = md5($pass_baru.$this->config->item("key_login"));
                    $this->db->update("tbl_admin",$upd,$id);
                    $this->session->set_flashdata('pass_success', 'Berhasil mengubah password...');
                    header('location:'.base_url().'app/change_password');
                } else {
                    $this->session->set_flashdata('pass_fail', 'Password Baru tidak sama...');
                    header('location:'.base_url().'app/change_password');
                }
            } else {
                $this->session->set_flashdata('pass_fail', 'Password Lama salah...');
                header('location:'.base_url().'app/change_password');
            }
        }
    }
    
    public function save_name() {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Pengguna', 'trim|required');
			
        $id['user'] = $this->input->post("username");
        $nama = $this->input->post("nama_lengkap");

        $set['tab_a'] = "";
        $set['tab_b'] = "active";
        $this->session->set_userdata($set);

        if ($this->form_validation->run() == FALSE) {
            $d['pengembang'] = $this->config->item('pengembang');
            $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
            $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
            $d['instansi'] = $this->config->item('nama_instansi');
            $d['credit'] = $this->config->item('credit_aplikasi');
            $d['alamat'] = $this->config->item('alamat_instansi');
            
            $d['beranda_aktif'] = "active";

            $this->load->view('include/header', $d);
            $this->load->view('dashboard_administrator/bg_header');
            $this->load->view('dashboard_administrator/user/bg_change_password');
            $this->load->view('include/footer');
        } else {
            $upd['nama'] = $nama;
            $this->db->update("tbl_admin",$upd,$id);
            $this->session->set_flashdata('pass_success', 'Berhasil mengubah nama pengguna...');
            $set_new['sess_nama'] = $upd['nama'];
            $this->session->set_userdata($set_new);
            header('location:'.base_url().'app/change_password');
        }
    }
}

/* End of file app.php */
/* Location: ./application/modules/app/controllers/app.php */
