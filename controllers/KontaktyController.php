<?php
error_reporting(E_ALL);
class KontaktyController extends Controller
{
    public function __construct()
    {
        $this->pageURL = 'kontakty';
    }

    public function handle($parameters)
    {
        $this->view = 'kontakty';
        $this->header['title'] = 'Podřipská škola - Kontakty';
        $this->data['content']['foto'] = 'kontakty-banner.png';
        $this->data['content']['h1'] = 'Kontakty';
        $this->data['content']['path'] = $this->createPath(0);
        $this->data['content']['footerColourClass'] = 'bg-gray';
        $this->data['options'] = $this->getAllOptions();
            $this->data['content']['perex'] = 'Napište nam, zavolejte nebo s u nás zastavte na dobrou kávu. Pomůžeme Vám s výběrem správného oboru nebo Vám
předáme více podrobných informací o jednotlivých oborech.
Těšíme se na Vás.';
    }

    public function createPath($pod)
    {
        $path = array();
        array_push($path, '<a href="home">Úvod</a>');
        if ($pod != 0) {
            echo $pod;
            $sql = 'SELECT nazev, pod, url FROM ' . $this->db->prefix . 'menu WHERE id = ' . $pod;
            $result = $this->db->db()->query($sql);
            $result = mysqli_fetch_object($result);
            array_push($path, '<a href="' . $result->url .'">' . $result->nazev . '</a>');
            if ($result->pod != 0) {
                echo '<br>';
                echo $result->pod;
                $sql = 'SELECT nazev, pod, url FROM ' . $this->db->prefix . 'menu WHERE id = ' . $result->pod;
                $result = $this->db->db()->query($sql);
                $result = mysqli_fetch_object($result);
                array_push($path, '<a href="' . $result->url .'">' . $result->nazev . '</a>');
            }
        }
        array_push($path, $this->capitalize($this->pageURL));
        return $path;
    }

    private function capitalize($text)
    {
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);
        return $text;
    }

    private function getAllOptions(){
        $data = new data();
        $sql = "SELECT value FROM " . $data->prefix . "options";
        $result = $data->db()->query($sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }

}