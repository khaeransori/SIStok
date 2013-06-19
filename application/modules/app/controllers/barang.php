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
 * Description of barang
 *
 * @author Khaer Ansori
 */
class barang extends Secure_Controller {
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
        $tot_hal = $this->db->get("tbl_barang");
        $config['base_url'] = base_url() . 'app/barang/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $d['list_barang'] = $this->db->get("tbl_barang",$limit,$offset);
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/barang/bg_list');
        $this->load->view('include/footer');
    }
    
    public function detail($id_barang) {
        $id['id_barang'] = $id_barang;
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $q = $this->db->get_where("tbl_barang",$id);
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        foreach($q->result() as $dt)
        {
            $d['id_barang'] = $dt->id_barang; 
            $d['nama_barang'] = $dt->nama_barang;
            $d['kode_kategori_barang'] = $dt->kode_kategori_barang;
            $d['nama_kategori_barang'] = $dt->nama_kategori_barang;
            $d['satuan_barang'] = $dt->nama_satuan_barang;
        }

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/barang/bg_detail');
        $this->load->view('include/footer');
    }
    
    public function hapus($id_barang) {
        $id['id_barang'] = $id_barang;
        $this->db->delete("tbl_barang",$id);
        $this->db->delete("tbl_stok_barang",$id);
        header('location:'.base_url().'app/barang');
    }
    
    public function edit($id_barang) {
        $id['id_barang'] = $id_barang;
        $q = $this->db->get_where("tbl_barang",$id);
        
        foreach($q->result() as $dt)
        {
            $d['id_param'] = $dt->id_barang;
            $d['nama_barang'] = $dt->nama_barang;
            $d['id_kategori_barang'] = $dt->id_kategori_barang;
            $d['id_satuan_barang'] = $dt->id_satuan_barang;
        }
        
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $d['kategori_list'] = $this->db->get("tbl_kategori_barang");
        $d['satuan_list'] = $this->db->get("tbl_satuan_barang");
        
        $d['st'] = "edit";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/barang/bg_input');
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
        $d['nama_barang'] = "";
        $d['id_kategori_barang'] = "";
        $d['id_satuan_barang'] = "";
        
        $d['kategori_list'] = $this->db->get("tbl_kategori_barang");
        $d['satuan_list'] = $this->db->get("tbl_satuan_barang");

        $d['st'] = "tambah";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/barang/bg_input');
        $this->load->view('include/footer');
    }
    
    public function simpan() {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required');
        $id['id_barang'] = $this->input->post("id_param");
        
        if($this->form_validation->run() == TRUE) {
            $st = $this->input->post('st');
            if($st=="edit") {
                $upd['nama_barang'] = $this->input->post("nama_barang");
                $upd['id_kategori_barang'] = $this->input->post("id_kategori_barang");
                $upd['id_satuan_barang'] = $this->input->post("id_satuan_barang");
                $this->db->update("tbl_barang",$upd,$id);
                $this->session->set_flashdata("success","Data kategori telah diperbaharui.");
                header('location:'.base_url().'app/barang/edit/'.$id['id_barang']);
            } else if($st=="tambah") {
                $in['nama_barang'] = $this->input->post("nama_barang");
                $in['id_kategori_barang'] = $this->input->post("id_kategori_barang");
                $in['id_satuan_barang'] = $this->input->post("id_satuan_barang");
                $this->db->insert("tbl_barang",$in);
                $instok['id_barang'] = $this->db->insert_id();
                $this->db->insert("tbl_stok_barang",$instok);
                $this->session->set_flashdata("success","Data berhasil ditambahkan.");
                header('location:'.base_url().'app/barang');
            }
        }
    }
}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */
