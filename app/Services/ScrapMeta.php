<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use shweshi\OpenGraph\OpenGraph;

class ScrapMeta
{
    protected $url;
    protected $lang;

    /**
     * @param $url
     * @param $lang
     */
    public function __construct($url, $lang)
    {
        $this->url = $url;
        $this->lang = $lang;
    }

    /**
     * @return array
     */
    public function getMetaTagsFromUrl()
    {
        $graph = new OpenGraph();
        $data = $graph->fetch($this->url, true, $this->lang);

        if (count($data) < 1) {
            $data = [
                "title" => $this->getTitleFromUrl(),
                "description" => $this->getDescription()
            ];
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getTitleFromUrl()
    {
        $graph = new OpenGraph();
        $data = $graph->fetch($this->url, true, $this->lang);

        return $data;
    }

    /**
     * @return mixed|null
     */
    public function getMetaDescriptionFromUrl()
    {
        $page = file_get_contents($this->url);
        $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;

        return $title;
    }

    function getDescription()
    {
        $tags = get_meta_tags($this->url);

        return @($tags['description'] ? $tags['description'] : "NULL");
    }
}

