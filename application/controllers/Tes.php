<?php
defined('BASEPATH') or exit ('no direct script acces allowed');

class Tes extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        //$this->load->helper('url')
    }

    public function index(){
        $data['judul'] = "";
        $this->load->view('header1',$data);
        $this->load->view('home',$data);
    }
    public function features()
    {
        $data['judul'] = "";
        $this->load->view('header1', $data);
        $this->load->view('features', $data);
    }
}