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
 * Description of transaksi
 *
 * @author Khaer Ansori
 */
class transaksi extends Secure_Controller {
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
        $tot_hal = $this->db->get("tbl_transaksi");
        $config['base_url'] = base_url() . 'app/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.id_barang = tbl_barang.id_barang');
        $this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_transaksi.id_admin');
        $d['list_barang'] = $this->db->order_by("waktu","DESC")->get("tbl_stok_barang");
        
        
        $d['beranda_aktif'] = "active";
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/transaksi/bg_list_transaksi');
        $this->load->view('include/footer');
    }
    
    public function masuk() {
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
        $tot_hal = $this->db->get("tbl_transaksi");
        $config['base_url'] = base_url() . 'app/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $where['status'] = 1;
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.id_barang = tbl_barang.id_barang');
        $this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_transaksi.id_admin');
        $d['list_barang'] = $this->db->order_by("waktu","DESC")->get_where("tbl_stok_barang",$where);
        
        $d['beranda_aktif'] = "active";
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/transaksi/bg_list_transaksi');
        $this->load->view('include/footer');
    }
    
    public function keluar() {
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
        $tot_hal = $this->db->get("tbl_transaksi");
        $config['base_url'] = base_url() . 'app/index/';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $d["paginator"] =$this->pagination->create_links();
        
        $where['status'] = 0;
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $this->db->join('tbl_transaksi', 'tbl_transaksi.id_barang = tbl_barang.id_barang');
        $this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_transaksi.id_admin');
        $d['list_barang'] = $this->db->order_by("waktu","DESC")->get_where("tbl_stok_barang",$where);
        
        $d['beranda_aktif'] = "active";
        
        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/transaksi/bg_list_transaksi');
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
        $d['id_barang'] = "";
        
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $d['barang_list'] = $this->db->get("tbl_stok_barang");

        $d['st'] = "tambah";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/transaksi/bg_input');
        $this->load->view('include/footer');
    }
    
    public function kurang() {
        $d['pengembang'] = $this->config->item('pengembang');
        $d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
        $d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
        $d['instansi'] = $this->config->item('nama_instansi');
        $d['credit'] = $this->config->item('credit_aplikasi');
        $d['alamat'] = $this->config->item('alamat_instansi');
        
        $d['beranda_aktif'] = "active";
        
        $d['id_param'] = "";
        $d['id_barang'] = "";
        
        $this->db->join('tbl_barang', 'tbl_barang.id_barang = tbl_stok_barang.id_barang');
        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang = tbl_barang.id_kategori_barang');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan_barang = tbl_barang.id_satuan_barang');
        $d['barang_list'] = $this->db->get("tbl_stok_barang");

        $d['st'] = "kurang";

        $this->load->view('include/header', $d);
        $this->load->view('dashboard_administrator/bg_header');
        $this->load->view('dashboard_administrator/transaksi/bg_input');
        $this->load->view('include/footer');
    }
    
    public function simpan() {
        $this->form_validation->set_rules('jumlah_barang_masuk', 'Jumlah Barang Masuk', 'trim|required');
        
        if($this->form_validation->run() == TRUE) {
            $st = $this->input->post('st');
            $id['id_barang'] = $this->input->post("id_barang");
            $in['jumlah'] = $this->input->post("jumlah_barang_masuk");
            $in['id_admin'] = $this->session->userdata('sess_id_user');
            $in['id_barang'] = $id['id_barang'];
            $in['waktu'] = date('Y-m-d H:i:s');
            
            if($st=="tambah") {
                $in['status'] = 1;
                $stok_sekarang = $this->db->get_where("tbl_stok_barang",$id)->row()->stok_barang;
                $upd['stok_barang'] = $stok_sekarang + $in['jumlah'];
                $this->db->update("tbl_stok_barang",$upd,$id);
                $this->db->insert("tbl_transaksi",$in);

                $this->session->set_flashdata("success","Data berhasil ditambahkan.");
                header('location:'.base_url().'app/transaksi');
            } else if($st=="kurang") {
                $in['status'] = 0;
                $stok_sekarang = $this->db->get_where("tbl_stok_barang",$id)->row()->stok_barang;
                if($in['jumlah'] > $stok_sekarang) {
                    $this->session->set_flashdata("fail","Jumlah yang anda masukkan lebih besar dari stok yang ada.");
                    header('location:'.base_url().'app/transaksi/kurang');
                    $upd['stok_barang'] = $stok_sekarang;
                } else {
                    $upd['stok_barang'] = $stok_sekarang - $in['jumlah'];
                    $this->db->update("tbl_stok_barang",$upd,$id);
                    $this->db->insert("tbl_transaksi",$in);

                    $this->session->set_flashdata("success","Data berhasil ditambahkan.");
                    header('location:'.base_url().'app/transaksi');
                }
            }
        }
    }
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
