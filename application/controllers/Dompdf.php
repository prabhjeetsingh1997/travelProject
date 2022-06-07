<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dompdf extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('user_model');
        // $this->load->model('admin_model');
        // $this->load->model('hotel_model');
        $this->load->model('partner_model');
        //$this->isPartnerLoggedIn();   
        //$this->load->library('pdftest');
        
    }
    
    public function index(){
    $data_user = array();
    $data_user['users'] = $this->db->get('tbl_user')->result();
    $this->load->view('user_list',$data_user);
    $html = $this->output->get_output();
    $this->load->library('DompdfController');
    $this->dompdf->loadHtml($html);
    $this->dompdf->setPaper('A4', 'landscape');
    $this->dompdf->render();
    $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }
}