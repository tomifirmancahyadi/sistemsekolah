<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penelitian_model extends CI_Model {

    var $table = 'tbl_penelitian';
    var $table2 = 'tbl_periode';
    var $table3 = 'tbl_anggota';
    var $table4 = 'tbl_tema';
    var $table5 = 'tbl_fokusriset';
    var $table6 = 'tbl_tkt';
    var $table7 = 'tbl_subtema';
    var $table8 = 'tbl_users';
    var $table9 = 'tbl_luaran';
    var $table10 = 'tbl_kategori';
    var $column = array('judul','kategori_proposal','userId','dana','unggah','status');
    var $column2 = array('judul');
    var $columnanggota= array('name');

    var $order = array('id' => 'desc');
    var $id = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    function get_fokus(){
        $query = $this->db->get('tbl_fokusriset');
        return $query;
    }

    function get_tema(){
        $query = $this->db->get('tbl_tema');
        return $query;
    }

    function get_tkt(){
        $query = $this->db->get('tbl_tkt');
        return $query;
    }

    function get_subtema(){
        $query = $this->db->get('tbl_subtema');
        return $query;
    }

    function get_anggota(){

        $role_id = 2;
        $result = $this->db->get_where('tbl_users', array('roleId' => $role_id));
        return $result;
    }
    public function get_all(){
        return $this->db->get('product')->result();
    }
    public function get_product_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->like('name',$keyword);
        return $this->db->get()->result();
    }

    function get_luaran(){
        $query = $this->db->get('tbl_luaran');
        return $query;
    }

    function get_periode(){
        $query = $this->db->get('tbl_periode');
        return $query;
    }

    function get_kategori(){
        $query = $this->db->get('tbl_kategori');
        return $query;
    }

    private function _get_datatables_query()
    {
        if($this->input->post('country'))
        {
          //  $this->db->where('tbl_skema.nama_skema', $this->input->post('country'));
        }
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        //$this->db->join('tbl_skema','tbl_penelitian.id_skema = tbl_skema.id','left');
        $this->db->join('tbl_users','tbl_penelitian.userId = tbl_users.userId','left');
        $this->db->where('tbl_penelitian.status','0');
        $this->db->or_where('tbl_penelitian.status','1');
        $this->db->or_where('tbl_penelitian.status','2');
        $i = 0;

        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    private function _get_datatables_query2()
    {

        //add custom filter here
        if($this->input->post('filter_skema'))
        {
            $this->db->where('tbl_skema.nama_skema', $this->input->post('country'));
        }
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_users','tbl_penelitian.userId = tbl_users.userId','left');
        $this->db->where('tbl_penelitian.status','0');
        $this->db->or_where('tbl_penelitian.status','1');
        $this->db->or_where('tbl_penelitian.status','2');

        $i = 0;

        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

//back up _get_datatables_query()
//    private function _get_datatables_query()
//    {
//
//        //add custom filter here
//        if($this->input->post('filter_skema'))
//        {
//            $this->db->where('tbl_penelitian.id_skema', $this->input->post('filter_skema'));
//        }
//            $this->db->select('tbl_penelitian.id,tbl_users.name,tbl_users.nidn,tbl_skema.nama_skema,tbl_penelitian.judul,tbl_penelitian.dana,tbl_penelitian.unggah,tbl_penelitian.status');
//            $this->db->from('tbl_penelitian');
//            $this->db->join('tbl_skema','tbl_penelitian.id_skema = tbl_skema.id','left');
//            $this->db->join('tbl_users','tbl_penelitian.userId = tbl_users.userId','left');
//            $this->db->where('tbl_penelitian.status','0');
//            $this->db->or_where('tbl_penelitian.status','1');
//
//        $i = 0;
//
//        foreach ($this->column as $item)
//        {
//            if($_POST['search']['value'])
//                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
//            $column[$i] = $item;
//            $i++;
//        }
//
//        if(isset($_POST['order']))
//        {
//            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
//        }
//        else if(isset($this->order))
//        {
//            $order = $this->order;
//            $this->db->order_by(key($order), $order[key($order)]);
//        }
//    }

    function get_datatables_anggota2()
    {


        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('roleId','2');
        $i = 0;

        foreach ($this->columnanggota as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $columnanggota[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($columnanggota[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        //$this->_get_datatables_query()->where('userId',$userId);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_adminn()
    {
        $this->db->select('*');
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column2 as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        //$this->_get_datatables_query()->where('userId',$userId);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function get_datatables($userId)
    {
        $this->id = $userId;
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
         $this->db->where('tbl_penelitian.userId',$userId);

        $i = 0;

        foreach ($this->column2 as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        //$this->_get_datatables_query()->where('userId',$userId);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function get_datatables_anggota($userId)
    {

        $this->id = $userId;
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->join('tbl_anggota','tbl_penelitian.id = tbl_anggota.id_penelitian','left');
        $this->db->join('tbl_users','tbl_penelitian.userId = tbl_users.userId','left');
        $this->db->where('tbl_anggota.id_anggota',$userId);

        $i = 0;

        foreach ($this->column2 as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
        //$this->_get_datatables_query()->where('userId',$userId);
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function get_datatables_admin()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
//backup function anggota($userid)
//    function anggota($userId)
//    {
//
//        $proposal = $this->_get_datatables_query();
//        $this->db->select('tbl_penelitian.id,tbl_users.name,tbl_users.nidn,tbl_skema.nama_skema,tbl_penelitian.judul,tbl_penelitian.dana,tbl_penelitian.unggah,tbl_penelitian.status');
//        $this->db->from('tbl_anggota');
//        $this->db->join('tbl_users','tbl_penelitian.userId = tbl_users.userId','left');
//        $this->db->where('tbl_anggota.id_penelitian',$proposal->id);
//        $this->db->where('tbl_anggota.id_ketua',$userId);
//        $query = $this->db->get();
//        return $query->result();
//    }

    function kategoriproposal($kategori_proposal)
    {
        $this->get_datatables($kategori_proposal);
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->join('tbl_penelitian','tbl_penelitian.kategori_proposal = tbl_kategori.id','left');
        $this->db->where('tbl_penelitian.kategori_proposal= tbl_kategori.id');
        $query = $this->db->get();
        return $query->result();
    }

    function tktsekarang($tktsekarang)
    {

        $proposal = $this->get_datatables($tktsekarang);
        $this->db->select('*');
        $this->db->from('tbl_tkt');
        $this->db->join('tbl_penelitian','tbl_penelitian.tktsekarang = tbl_tkt.id','left');
        $this->db->where('tbl_penelitian.tktsekarang = tbl_tkt.id');
        $query = $this->db->get();
        return $query->result();
    }

    function tktterakhir($tktterakhir)
    {

        $proposal = $this->get_datatables($tktterakhir);
        $this->db->select('*');
        $this->db->from('tbl_tkt');
        $this->db->join('tbl_penelitian','tbl_penelitian.tktterakhir = tbl_tkt.id','left');
        $this->db->where('tbl_penelitian.tktterakhir = tbl_tkt.id');
        $query = $this->db->get();
        return $query->result();
    }

    function sintaproposal($id_sinta)
    {

        $proposal = $this->get_datatables($id_sinta);
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->join('tbl_penelitian','tbl_penelitian.id_sinta = tbl_users.id_sinta','left');
        $this->db->where('tbl_penelitian.id_sinta = tbl_users.id_sinta');
        $query = $this->db->get();
        return $query->result();
    }

    function skemaproposal($id_skema)
    {

        $proposal = $this->get_datatables($id_skema);
        $this->db->select('*');
        $this->db->from('tbl_skema');
        $this->db->join('tbl_penelitian','tbl_penelitian.id_skema = tbl_skema.id','left');
        $this->db->where('tbl_penelitian.id_skema = tbl_skema.id');
        $query = $this->db->get();
        return $query->result();
    }

    function fokusriset($fokusriset)
    {

        $proposal = $this->get_datatables($fokusriset);
        $this->db->select('*');
        $this->db->from('tbl_fokusriset');
        $this->db->join('tbl_penelitian','tbl_penelitian.fokusriset = tbl_fokusriset.id','left');
        $this->db->where('tbl_penelitian.fokusriset = tbl_fokusriset.id');
        $query = $this->db->get();
        return $query->result();
    }
    function skema($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_skema');
        $this->db->where('id ',$id);
        $query = $this->db->get();
        return $query->result();
    }

    function tema($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_tema');
        $this->db->where('id ',$id);
        $query = $this->db->get();
        return $query->result();
    }

    function subtema($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_subtema');
        $this->db->where('id ',$id);
        $query = $this->db->get();
        return $query->result();
    }

    function ketua($userId)
    {

        $proposal = $this->get_datatables($userId);
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_users','tbl_anggota.id_ketua = tbl_users.userId','left');
        $this->db->where('tbl_anggota.id_penelitian',$proposal->id);
        $this->db->where('tbl_anggota.id_ketua',$userId);
        $query = $this->db->get();
        return $query->result();
    }

    function anggota($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_users','tbl_anggota.id_anggota = tbl_users.userId','left');
        $this->db->where('tbl_anggota.id_penelitian',$id);
        $query = $this->db->get();
        return $query->result();
    }
    function dataanggota($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->where('id_anggota',$id);
        $query = $this->db->get();
        return $query->result();
    }




    function luaranwajib($luaran_wajib)
    {

        $proposal = $this->get_datatables($luaran_wajib);
        $this->db->select('*');
        $this->db->from('tbl_luaran');
        $this->db->join('tbl_penelitian','tbl_penelitian.luaran_wajib = tbl_luaran.id','left');
        $this->db->where('tbl_penelitian.luaran_wajib = tbl_luaran.id');
        $query = $this->db->get();
        return $query->result();
    }

    function luarantambahan($luaran_tambahan)
    {

        $proposal = $this->get_datatables($luaran_tambahan);
        $this->db->select('*');
        $this->db->from('tbl_luaran');
        $this->db->join('tbl_penelitian','tbl_penelitian.luaran_tambahan = tbl_luaran.id','left');
        $this->db->where('tbl_penelitian.luaran_tambahan = tbl_luaran.id');
        $query = $this->db->get();
        return $query->result();
    }

    function periode($id_periode)
    {

        $proposal = $this->get_datatables($id_periode);
        $this->db->select('*');
        $this->db->from('tbl_periode');
        $this->db->join('tbl_penelitian','tbl_penelitian.id_periode = tbl_periode.id','left');
        $this->db->where('tbl_penelitian.id_periode = tbl_periode.id');
        $query = $this->db->get();
        return $query->result();
    }

    function downloadFile($id)
    {
        $query= $this->db->get_where('penelitian',array('id' => $id));

        $row = $query->result();

        $filePath = $row[0]->unggah;

        readfile($filePath);


        exit;

    }


    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function count_filtered_anggota2()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('roleId','2');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_anggota2()
    {
        $this->db->from($this->table8);
        return $this->db->count_all_results();
    }


    function count_filtered_dosen($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('tbl_penelitian.userId',$userId);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_dosen($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_penelitian');
        $this->db->where('tbl_penelitian.userId',$userId);

        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }


    public function get_by_userId($userId)
    {
        $this->db->from($this->table);
        $this->db->where('userId',$userId);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
       // $this->db->insert_batch($this->table3, $dataanggota);


        return $this->db->insert_id();
    }
    public function save_anggota($dataanggota)
    {
        //$this->db->insert($this->table, $data);
         $this->db->insert_batch($this->table3, $dataanggota);
        return $this->db->insert_id();
    }

    function save_upload($judul,$id_skema,$dana,$unggah){
        $data = array(
            'judul' 	=> $judul,
            'id_skema' => $id_skema,
            'dana' => $dana,
            'unggah' => $unggah,
        );
        $result= $this->db->insert($data);
        return $result;
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    public function deleteanggota_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_anggota');
    }
    public function terima_by_id($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_penelitian', $data);

        return $this->db->affected_rows();
    }
    public function tolak_by_id($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_penelitian', $data);

        return $this->db->affected_rows();
    }

    public function terimabergabung_by_id($id,$data)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota', $data);

        return $this->db->affected_rows();
    }
    public function tolakbergabung_by_id($id,$data)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota', $data);

        return $this->db->affected_rows();
    }


    public function get_by_id_view($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }
    public function get_list_skema()
    {
        $this->db->select('tbl_penelitian.id_skema,tbl_skema.nama_skema');
        $this->db->from($this->table);
        $this->db->join('tbl_skema','tbl_penelitian.id_skema = tbl_skema.id','left');
        $this->db->where('id_program','1');
        $this->db->order_by('id_skema','asc');
        $query = $this->db->get();
        $result = $query->result();

        $countries = array();
        foreach ($result as $row)
        {

            $countries[] = $row->nama_skema;
        }
        return $countries;
    }


}
