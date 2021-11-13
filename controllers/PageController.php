<?php
error_reporting(E_ALL);
// echo 'This is Page Controller speaking';
class PageController extends Controller
{
    protected $db;
    protected $pageURL = 'error';

    public function __construct($pageURL)
    {
        // $this->db = new data();
        // if ($pageURL == '') {
        //     $this->view = $pageURL;
        // } else {
        //     $this->view = 'random-page';
        // }
        // $this->pageURL = $pageURL;
        $this->view = $pageURL;
    }

    public function handle($parameters)
    {
        // $db = new data();
        // $content = $this->getPageContent($this->pageURL);
        // $this->header['title'] = 'MVC Project - ' . $content['nazev'];

        //         $content['path'] = $this->createPath($content['pod']);
        //         if ($content['id_fotogalerie'] != null) {
        // //            var_dump($content['id_fotogalerie']);
        //             $content['fotogalerie'] = $this->getGalleryItems($content['id_fotogalerie']);
        //         }
        // $this->data['content'] = $content; // IMPORTANT!!!!!

        // Pokud stranka neexistuje, vypis error
        // if ($this->data['content']['nazev'] == null) {
        //     $this->view = 'error';
        //     $this->data['content']['h1'] = 'Stránka nenalezena';
        //     $this->data['content']['perex'] =
        //         'Vámi hledaná stránka nebyla nalezena, nebo neexistuje.';
        // }
    }

    private function getPageContent($url)
    {
        $result = $this->db->getContent($url);
        return $result;
    }

    private function capitalize($text)
    {
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);
        return $text;
    }

    private function createPath($pod)
    {
        $path = [];
        array_push($path, '<a href="home">Úvod</a>');
        if ($pod != 0) {
            $sql =
                'SELECT nazev, pod, url FROM ' .
                $this->db->prefix .
                'menu WHERE id = ' .
                $pod;
            $result = $this->db->db()->query($sql);
            $result = mysqli_fetch_object($result);
            array_push(
                $path,
                '<a href="' . $result->url . '">' . $result->nazev . '</a>'
            );
            if ($result->pod != 0) {
                $sql =
                    'SELECT nazev, pod, url FROM ' .
                    $this->db->prefix .
                    'menu WHERE id = ' .
                    $result->pod;
                $result = $this->db->db()->query($sql);
                $result = mysqli_fetch_object($result);
                array_push(
                    $path,
                    '<a href="' . $result->url . '">' . $result->nazev . '</a>'
                );
            }
        }
        array_push($path, $this->capitalize($this->pageURL));
        return $path;
    }

    private function getGalleryItems($id_fotogalerie)
    {
        $sql =
            'SELECT foto FROM ' .
            $this->db->prefix .
            'fotogalerie_media where id_gallery = ' .
            $id_fotogalerie .
            ' ORDER BY poradi ASC';
        $result = $this->db->db()->query($sql);
        $result = mysqli_fetch_all($result);
        return $result;
        //        return $galleryItems;
    }
}
