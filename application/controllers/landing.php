<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function index()
    {
        $this->load->view('landing');
    }

    public function privacy()
    {
        $this->load->view('privacy');
    }

    public function terms()
    {
        $this->load->view('terms');
    }
}
