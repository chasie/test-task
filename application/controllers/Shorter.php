<?php

class Shorter extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->makeCode($this->input->post('url'));


        $this->load->view('index');
    }

    function generateCode()
    {
        return base_convert(rand(0, 1000), 10, 36);
    }

    public function makeCode($url) {
        $this->load->model(Url, '', TRUE);
        $url = trim($url);

        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            return '';
        }

        $exsists = $this->Url->exist($url);

        if($exsists->num_rows) {
            return $exsists->fetch_object()->code;
        } else {
            $code = $this->generateCode();
            $this->Url->insert_url($url, $code);
            return $code;
        }
    }

    public function getUrl($code)
    {
        $code = $this->Url->exist;
    }
}

