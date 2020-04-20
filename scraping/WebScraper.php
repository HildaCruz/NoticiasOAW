<?php
require_once('simple_html_dom.php');

class WebScraper
{
    private $scraper;

    public function __construct($url)
    {
        $this->scraper = file_get_html($url);
    }

    public function getLinks()
    {
        foreach ($this->scraper->find('article a') as $item) {
            $links[] = $item->href;
        }
        return $links;
    }

    public function getKeywords()
    {
        $keywords = null;
        foreach ($this->scraper->find('meta[name=keywords]') as $item) {
            $keywords = $item->content;
        }
        return $keywords;
    }

    public function getTitle(){
        $keywords = null;
        foreach ($this->scraper->find('title') as $item) {
            $title = $item->innertext;
        }
        return $title;
    }

    public function getAuthor(){
        $keywords = null;
        foreach ($this->scraper->find('meta[name=author]') as $item){
            $author = $item->content;
        }
        return $author;
    }

}