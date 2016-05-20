<?php

namespace Tests\Parser\AppleDaily;

use Tests\TestCase;

class AppleDailyParser2Test extends TestCase
{

    protected $url = 'http://www.appledaily.com.tw/realtimenews/article/finance/20160518/864694/%E5%90%88%E5%BA%AB%E9%87%91%EF%BC%9A%E8%8A%B1%E6%95%AC%E7%BE%A4%E8%AB%8B%E8%BE%AD%E5%AD%90%E9%8A%80%E8%A1%8C%E8%91%A3%E4%BA%8B';

    public function testParser()
    {
        $this->assertInstanceOf('wsmwason\TaiwanNewsParser\NewsEntry', $this->newsEntry);
    }

    /**
     * @depends testParser
     */
    public function testCompanyName()
    {
        $this->assertEquals('蘋果日報', $this->newsEntry->getCompanyName());
    }

    /**
     * @depends testParser
     */
    public function testUrl()
    {
        $this->assertEquals('http://www.appledaily.com.tw/realtimenews/article/new/20160518/864694/', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('陳瑩欣', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-18 17:42:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('合庫金：花敬群請辭子銀行董事', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $this->assertEquals('<p id="summary" style="word-wrap: break-word;">520即將來臨，新任內政部政務次長花敬群確定不兼任合庫銀董事一職。合庫金（5880）今日公告，接獲子公司合庫銀董事花敬群告知，因個人生涯規劃辭去董事一職。</p><div> </div>行庫主管透露，依照內規，花敬群即使接任內政部政務次長，仍可兼任合庫銀董事，若有職涯異動，也可等到6月股東會後再請辭，不過花敬群以個人生涯規劃為由趕在520前告知請辭董事，只能予以尊重。（陳瑩欣／台北報導）<div> </div>', $this->newsEntry->getContent());
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://twimg.edgesuite.net/images/ReNews/20160518/640_28faf197f52ae16032f41f85391a152f.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertTrue(true);
    }

}