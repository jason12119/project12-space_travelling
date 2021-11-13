<?php
class HomeController extends Controller
{
    protected $primaryModel;
    public function __construct()
    {
        $this->primaryModel = new Page('home');
    }

    public function handle($parameters)
    {
        $this->header['title'] = 'Blank MVC Project';
        $this->header['bannerClass'] = 'hp';
        $this->data['h1'] = 'NADPIS H1';
        $this->view = 'homepage';
        $this->data['banners'] = $this->getBanners(4);

        // echo "This is Home Controller speaking. First, you need to define the view HOMEPAGE.phtml and included files HEADER and FOOTER";
    }

    private function getBanners($limit)
    {
        $data = new data();
        if ($limit == 0) {
            $sql =
                'SELECT nazev, nazev_de, nazev_en, nazev_sk, perex, perex_sk, perex_en, perex_de, url, foto, foto_en, foto_de, foto_sk FROM ' .
                $data->prefix .
                "banner WHERE aktivni='1' ORDER BY poradi ASC";
        } else {
            $sql =
                'SELECT nazev, nazev_de, nazev_en, nazev_sk, perex, perex_sk, perex_en, perex_de, url, foto, foto_en, foto_de, foto_sk FROM ' .
                $data->prefix .
                "banner WHERE aktivni='1' ORDER BY poradi ASC LIMIT " .
                $limit;
        }

        $result = $data->db()->query($sql);
        $result = mysqli_fetch_all($result);
        return $result;
    }
}
