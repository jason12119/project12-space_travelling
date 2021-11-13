<?php

class ContactController extends Controller
{
    public function handle($parameters)
    {
        $this->header['title'] = 'Contact Form';
        $this->view = 'contact';
    }
}