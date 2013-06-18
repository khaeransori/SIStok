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
 * Description of manage_user
 *
 * @author Khaer Ansori
 */
class manage_user extends Secure_Controller {
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
        $tot_hal = $this->db->get("tbl_admin");
        $config['base_url'] = base_url() . 'app/manage_user/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $d['list_admin'] = $this->db->get("tbl_admin",$limit,$offset);
                        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/user/bg_list_user');
        $this->load->view('include/footer');
    }
    
    public function detail($id_admin) {
        $id['id_admin'] = $id_admin;
        $q = $this->db->get_where("tbl_admin",$id);
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        foreach($q->result() as $dt)
        {
            $d['username'] = $dt->user; 
            $d['nama_lengkap'] = $dt->nama; 
            $d['level'] = $dt->level; 
        }

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/user/bg_detail');
        $this->load->view('include/footer');
    }
    
    public function hapus($id_admin) {
        if($this->session->userdata('sess_id_user') != $id_admin)
        {
            $id['id_admin'] = $id_admin;
            $this->db->delete("tbl_admin",$id);
            header('location:'.base_url().'app/manage_user');
        }
        else
        {
            $this->session->set_flashdata("fail","Anda tidak dapat menghapus akun anda sendiri.");
            header('location:'.base_url().'app/manage_user');
        }
    }
    
    public function edit($id_admin) {
        $id['id_admin'] = $id_admin;
        $q = $this->db->get_where("tbl_admin",$id);
        
        foreach($q->result() as $dt)
        {
            $d['id_param'] = $dt->id_admin;
            $d['username'] = $dt->user; 
            $d['password'] = $dt->pass; 
            $d['nama_lengkap'] = $dt->nama;
            $d['level'] = $dt->level; 
        }
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['st'] = "edit";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/user/bg_input');
        $this->load->view('include/footer');
    }
    
    public function tambah() {
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['id_param'] = "";
        $d['username'] = ""; 
        $d['password'] = ""; 
        $d['nama_lengkap'] = "";
        $d['level'] = 1; 

        $d['st'] = "tambah";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/user/bg_input');
        $this->load->view('include/footer');
    }
    
    public function simpan() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
        $id['id_admin'] = $this->input->post("id_param");
        
        if($this->form_validation->run() == TRUE) {
            $st = $this->input->post('st');
            if($st=="edit") {
                $upd['user'] = $this->input->post("username");
                $upd['nama'] = $this->input->post("nama_lengkap");
                $upd['level'] = $this->input->post("level");
                if($this->input->post("password")!="") {
                    $upd['pass'] = md5($this->input->post("password").$this->config->item("key_login"));
                }
                $this->db->update("tbl_admin",$upd,$id);
                $this->session->set_flashdata("success","Data user telah diperbaharui.");
                if($this->session->userdata('sess_id_user') == $id['id_admin']) {
                    $set_new['sess_nama'] = $upd['nama'];
                    $this->session->set_userdata($set_new);
                }
                header('location:'.base_url().'app/manage_user/edit/'.$id['id_admin']);
            } else if($st=="tambah") {
                $login['user'] = $this->input->post("username");
                $cek = $this->db->get_where('tbl_admin', $login);
                if($cek->num_rows()>0) {
                    $this->session->set_flashdata("fail","Username telah ada, silahkan gunakan yang lainnya.");
                    header('location:'.base_url().'app/manage_user/tambah');
                } else {
                    $in['user'] = $this->input->post("username");
                    $in['nama'] = $this->input->post("nama_lengkap");
                    $in['level'] = $this->input->post("stts");
                    $in['pass'] = md5($this->input->post("password").$this->config->item("key_login"));
                    $this->db->insert("tbl_admin",$in);
                    
                    $this->session->set_flashdata("success","Data berhasil ditambahkan.");
                    header('location:'.base_url().'app/manage_user');
                }
            }
        }
    }
}

/* End of file manage_user.php */
/* Location: ./application/controllers/manage_user.php */
