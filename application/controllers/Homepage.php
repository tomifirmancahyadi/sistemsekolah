<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Homepage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $this->load->view("homepage");
    }


   
    function pageNotFound()
    {

        $this->load->view("404");
    }

}
ini_set('memory_limit', '-1');