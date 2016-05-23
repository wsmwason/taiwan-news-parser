<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class TvbsParser1Test extends TestCase
{

    protected $url = 'http://news.tvbs.com.tw/politics/news-652955/';

    public function testParser()
    {
        $this->assertInstanceOf('wsmwason\TaiwanNewsParser\NewsEntry', $this->newsEntry);
    }

    /**
     * @depends testParser
     */
    public function testCompanyName()
    {
        $this->assertEquals('TVBS', $this->newsEntry->getCompanyName());
    }

    /**
     * @depends testParser
     */
    public function testUrl()
    {
        $this->assertEquals('http://news.tvbs.com.tw/politics/news-652955/', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('圖', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-08 19:11:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('快訊／2天密集開會！　新政府確定出席WHA', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<p><span style="font-size: 10px;">最新消息，經過2天的密集開會討論，準行政院發言人童振源表示，確定會派代表出席5月23日在日內瓦舉行的世界衛生大會；童振源表示這件事情絕對不能以任何政治框架加以限縮，至於WHO信函中提到以2758號決議文為基礎的「一中原則」，童振源認為這和台灣參與WHA並無關聯。</span></p><p><span style="font-size: 10px;">圖／TVBS</span></p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://www.tvbs.com.tw/export/sites/tvbs/news/politics/images/2016/05/08/TVBS-N_CLEAN_10M_20160508_17-40-02.mp4_20160508_180232.870.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('世界衛生大會,WHA,WHO,行政院,出席', $this->newsEntry->getTags());
    }

}