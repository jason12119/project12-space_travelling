<?php

class Page
{
    protected $db;
    public function __construct($url)
    {
        $this->pageURL = $url;
        $this->db = new data();
    }

    private function getBanners($limit)
    {
        $data = new data();
        if ($limit == 0)
            $sql = "SELECT nazev, nazev_de, nazev_en, nazev_sk, perex, perex_sk, perex_en, perex_de, url, foto, foto_en, foto_de, foto_sk FROM " . $data->prefix . "banner WHERE aktivni='1' ORDER BY poradi ASC";
        else
            $sql = "SELECT nazev, nazev_de, nazev_en, nazev_sk, perex, perex_sk, perex_en, perex_de, url, foto, foto_en, foto_de, foto_sk FROM " . $data->prefix . "banner WHERE aktivni='1' ORDER BY poradi ASC LIMIT " . $limit;

        $result = $data->db()->query($sql);
        $result = mysqli_fetch_all($result);
        return $result;
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
        $path = array();
        array_push($path, '<a href="home">Úvod</a>');
        if ($pod != 0) {

            $sql = 'SELECT nazev, pod, url FROM ' . $this->db->prefix . 'menu WHERE id = ' . $pod;
            $result = $this->db->db()->query($sql);
            $result = mysqli_fetch_object($result);
            array_push($path, '<a href="' . $result->url . '">' . $result->nazev . '</a>');
            if ($result->pod != 0) {
                $sql = 'SELECT nazev, pod, url FROM ' . $this->db->prefix . 'menu WHERE id = ' . $result->pod;
                $result = $this->db->db()->query($sql);
                $result = mysqli_fetch_object($result);
                array_push($path, '<a href="' . $result->url . '">' . $result->nazev . '</a>');
            }
        }
        array_push($path, $this->capitalize($this->pageURL));
        return $path;
    }

    private function getGalleryItems($id_fotogalerie)
    {
        $sql = "SELECT foto FROM " . $this->db->prefix . "fotogalerie_media where id_gallery = " . $id_fotogalerie . " ORDER BY poradi ASC";
        $result = $this->db->db()->query($sql);
        $result = mysqli_fetch_all($result);
        return $result;
//        return $galleryItems;
    }
}