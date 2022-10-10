<?php

class App {
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL()
    {
        if (isset($_GET['url']) ) {
            $url = rtrim($_GET[$'url'], '/');
            return $url;
        }
    }
}