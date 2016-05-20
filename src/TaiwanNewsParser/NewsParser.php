<?php

namespace wsmwason\TaiwanNewsParser;

use DiDom\Document;

trait NewsParser
{

    /**
     * Url
     *
     * @var string
     */
    protected $url;

    /**
     * Document
     *
     * @var \DiDom\Document
     */
    protected $document;

    public function setUrl($url = '')
    {
        $this->url = $url;
        $this->document = new Document($url, true);
    }

}