<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'Sistem Sekolah: Man 1 Pekanbaru';

        $this->loadViews("dashboard", $this->global, NULL, NULL);
    }

    public function loadDashboard()
    {
        $this->global['pageTitle'] = 'Sistem Sekolah: Dashboard';

        //$data['form_skema'] = form_dropdown('',$opt,'','id="id_skema" class="form-control"');
        $this->loadViews("dashboard",$this->global, NULL);
    }
   
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Sistem Sekolah : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }

}
ini_set('memory_limit', '-1');