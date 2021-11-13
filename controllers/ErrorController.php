<?php
class ErrorController extends Controller{
    public function handle($parameters)
    {
        header("HTTP/1.0 404 Not Found");
        $this->header['title'] = 'Chyba 404';
        $this->view = 'error';
    }
}