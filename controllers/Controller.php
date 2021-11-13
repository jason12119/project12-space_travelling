<?php
abstract class Controller
{
    protected $data = [];
    protected $view = '';
    protected $header = [
        'title' => '',
        'keywords' => '',
        'perex' => '',
        'body' => '',
    ];

    abstract function handle($parameters);

    public function showView()
    {
        if ($this->view) {
            extract($this->data);
            require 'views/' . $this->view . '.phtml';
        }
    }

    public function redirect($url)
    {
        header("Location: /$url");
        header('Connection: close');
        exit();
    }
}
