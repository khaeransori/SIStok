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
 * Description of kategori_barang
 *
 * @author Khaer Ansori
 */
class kategori_barang extends Secure_Controller {
    public function index() {
        //put your code here
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $page = $this->uri->segment(4);
        $limit = $this->config->item('limit_data');
        $offset = (!$page) ? 0 : $page;
        
        $d['tot'] = $offset;
        $tot_hal = $this->db->get("tbl_kategori_barang");
        $config['base_url'] = base_url() . 'app/kategori_barang/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $d['list_kategori'] = $this->db->get("tbl_kategori_barang",$limit,$offset);
                        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/kategori_barang/bg_list');
        $this->load->view('include/footer');
    }
    
    public function detail($id_kategori_barang) {
        $id['id_kategori_barang'] = $id_kategori_barang;
        $q = $this->db->get_where("tbl_kategori_barang",$id);
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        foreach($q->result() as $dt)
        {
            $d['kode_kategori_barang'] = $dt->kode_kategori_barang; 
            $d['nama_kategori_barang'] = $dt->nama_kategori_barang; 
        }

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/kategori_barang/bg_detail');
        $this->load->view('include/footer');
    }
    
    public function hapus($id_kategori_barang) {
        $id['id_kategori_barang'] = $id_kategori_barang;
        $this->db->delete("tbl_kategori_barang",$id);
        header('location:'.base_url().'app/kategori_barang');
    }
    
    public function edit($id_kategori_barang) {
        $id['id_kategori_barang'] = $id_kategori_barang;
        $q = $this->db->get_where("tbl_kategori_barang",$id);
        
        foreach($q->result() as $dt)
        {
            $d['id_param'] = $dt->id_kategori_barang;
            $d['kode_kategori_barang'] = $dt->kode_kategori_barang;
            $d['nama_kategori_barang'] = $dt->nama_kategori_barang;
        }
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $d['st'] = "edit";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/kategori_barang/bg_input');
        $this->load->view('include/footer');
    }
    
    public function tambah() {
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $d['id_param'] = "";
        $d['kode_kategori_barang'] = ""; 
        $d['nama_kategori_barang'] = ""; 
        $d['default_kode_kategori_barang'] = "";

        $d['st'] = "tambah";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/kategori_barang/bg_input');
        $this->load->view('include/footer');
    }
    
    public function simpan() {
        $this->form_validation->set_rules('kode_kategori_barang', 'Kode Kategori Barang', 'trim|required');
        $this->form_validation->set_rules('nama_kategori_barang', 'Nama Kategori Barang', 'trim|required');
        $id['id_kategori_barang'] = $this->input->post("id_param");
        
        if($this->form_validation->run() == TRUE) {
            $st = $this->input->post('st');
            if($st=="edit") {
                $upd['kode_kategori_barang'] = $this->input->post("kode_kategori_barang");
                $upd['nama_kategori_barang'] = $this->input->post("nama_kategori_barang");
                $this->db->update("tbl_kategori_barang",$upd,$id);
                $this->session->set_flashdata("success","Data kategori telah diperbaharui.");
                header('location:'.base_url().'app/kategori_barang/edit/'.$id['id_kategori_barang']);
            } else if($st=="tambah") {
                $login['kode_kategori_barang'] = $this->input->post("kode_kategori_barang");
                $cek = $this->db->get_where('tbl_kategori_barang', $login);
                if($cek->num_rows()>0) {
                    $this->session->set_flashdata("fail","Kode telah ada, silahkan gunakan yang lainnya.");
                    header('location:'.base_url().'app/kategori_barang/tambah');
                } else {
                    $in['kode_kategori_barang'] = $this->input->post("kode_kategori_barang");
                    $in['nama_kategori_barang'] = $this->input->post("nama_kategori_barang");
                    $this->db->insert("tbl_kategori_barang",$in);
                    
                    $this->session->set_flashdata("success","Data berhasil ditambahkan.");
                    header('location:'.base_url().'app/kategori_barang');
                }
            }
        }
    }
}

/* End of file kategori_barang.php */
/* Location: ./application/controllers/kategori_barang.php */
