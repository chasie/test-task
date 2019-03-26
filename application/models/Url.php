<?php
/**
 * Created by PhpStorm.
 * User: whileod
 * Date: 2019-03-25
 * Time: 17:54
 */

class Url_
{
    public $url;
    public $code;
    public $created;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert_url($url, $code)
    {
        $this->url = $url;
        $this->code = $code;
        $this->created = time();

        $this->db->insert('urls', $this);
    }

    public function search_url($url)
    {
        $this->db->select('code');
        $this->db->where('url', $url);

        return $this->db->get('urls');

    }
}