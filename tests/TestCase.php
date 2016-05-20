<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use wsmwason\TaiwanNewsParser\TaiwanNewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

abstract class TestCase extends PHPUnit_Framework_TestCase
{

    protected $url;

    /**
     * NewsEntry
     *
     * @var \wsmwason\TaiwanNewsParser\NewsEntry
     */
    protected $newsEntry;

    public function setUp()
    {
        $this->newsEntry = $this->getEntry();
    }

    /**
     * Get news entry from url only one time
     *
     * @staticvar \wsmwason\TaiwanNewsParser\NewsEntry $newsEntry
     * @return \wsmwason\TaiwanNewsParser\NewsEntry
     */
    public function getEntry()
    {
        static $newsEntry;
        if ($newsEntry) {
            return $newsEntry;
        }
        $parser = new TaiwanNewsParser();
        $newsEntry = $parser->parseUrl($this->url);
        return $newsEntry;
    }

}
