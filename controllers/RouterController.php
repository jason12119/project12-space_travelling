<?php

class RouterController extends Controller
{
    protected $controller;
    public $ajax;

    public function handle($parameters)
    {
        $page = $parameters['page'];

        if ($page == '') {
            $page = 'home';
        }

        $controllerClass = $this->dashesToCamel($page) . 'Controller';
        //        echo '<br>';
        //        echo $controllerClass;

        if (file_exists('controllers/' . $controllerClass . '.php')) {
            $this->controller = new $controllerClass($_GET['parameter']);
        } elseif (file_exists('views/' . $page . '.phtml')) {
            $this->controller = new PageController($page);
        } else {
            $this->controller = new PageController($page); // do budoucna, pokud neexistuje pohled, jedná se o kategorii, pokud neexistuje kategorie, ukaze se error view
        }

        $this->controller->handle($page);

        $this->data['title'] = $this->controller->header['title'];
        $this->data['keywords'] = $this->controller->header['keywords'];
        $this->data['body'] = $page;
        $this->data['content'] = $this->controller->data['content'];
        //        $this->data['banners'] = $this->controller->data['banners'];
        $this->view = 'layout';
    }

    private function parseURL($url)
    {
        $parsedURL = parse_url($url);
        $parsedURL['path'] = ltrim($parsedURL['path'], '/');
        $parsedURL['path'] = trim($parsedURL['path']);
        $explodedPath['path'] = explode('/', $parsedURL['path']);
        return $explodedPath;
    }

    public function dashesToCamel($text)
    {
        $sentence = str_replace('-', ' ', $text);
        $sentence = ucwords($sentence);
        $sentence = str_replace(' ', '', $sentence);
        return $sentence;
    }
}
