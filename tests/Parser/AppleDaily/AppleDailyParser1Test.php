<?php

namespace Tests\Parser\AppleDaily;

use Tests\TestCase;

class AppleDailyParser1Test extends TestCase
{

    protected $url = 'http://www.appledaily.com.tw/realtimenews/article/sports/20160518/864705/%E4%B8%AD%E6%9A%91%E9%82%84%E5%92%B3%E5%97%BD%E3%80%80%E9%99%B3%E9%87%91%E9%8B%92%E5%BE%85%E5%91%BD%E4%BB%A3%E6%89%93';

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
        $this->assertEquals('http://www.appledaily.com.tw/realtimenews/article/new/20160518/864705/', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('謝岱穎', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-18 18:12:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('中暑還咳嗽　陳金鋒待命代打', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $content = preg_replace('#\s+#', ' ', $content);
        $this->assertEquals('<p id="summary" style="word-wrap: break-word;"><span style="font-size:18px;">陳金鋒上周四和周五都開轟，但周六中暑、全身沒力，Lamigo桃猿教練團只好讓他休息，今天移師澄清湖球場，雖然賽前還是有參與打擊練習，但感覺是有點不舒服，只好先休息，在板凳上待命代打。<div> </div>周日(15日)時，陳金鋒在台南參加高建三的引退儀式，隨後也排進先發打線，但只打了兩個打席就退場，猿隊打擊教練曾豪駒說：「周日賽前，金鋒有感覺好一點，所以就排進先發，但打了兩次之後，他說實在是不舒服，就讓他先休息。」<div> </div>上周末在台南，鋒哥不但中暑，還會咳嗽，症狀不輕，今天力氣算是恢復，但還是不舒服，曾豪駒說：「與其讓金鋒這麼辛苦上場打，不如讓他專注在一個打席，需要時再讓他上來代打，會比較好。如果明天狀況好轉再先發。」(謝岱穎／綜合報導)</span></p> <figure class="lbimg sgimg sglft"><a title="桃猿陳金鋒。趙文彬攝" href="http://twimg.edgesuite.net/images/ReNews/20160518/640_01d7e3cc288e33b12a1dfa1bda9d3bad.jpg"><img src="http://twimg.edgesuite.net/images/ReNews/20160518/420_01d7e3cc288e33b12a1dfa1bda9d3bad.jpg"/><span/></a><div class="textbox"><p id="caption1">桃猿陳金鋒。趙文彬攝</p></div></figure><figure class="lbimg sgimg sglft"><a title="桃猿陳金鋒。趙文彬攝" href="http://twimg.edgesuite.net/images/ReNews/20160518/640_a21b5574e0cde57490be4dd402785919.jpg"><img src="http://twimg.edgesuite.net/images/ReNews/20160518/420_a21b5574e0cde57490be4dd402785919.jpg"/><span/></a><div class="textbox"><p id="caption2">桃猿陳金鋒。趙文彬攝</p></div></figure><figure class="lbimg sgimg sglft"><a title="桃猿陳金鋒。趙文彬攝" href="http://twimg.edgesuite.net/images/ReNews/20160518/640_6a15735eedfa070d83ad9032cc90bea4.jpg"><img src="http://twimg.edgesuite.net/images/ReNews/20160518/420_6a15735eedfa070d83ad9032cc90bea4.jpg"/><span/></a><div class="textbox"><p id="caption3">桃猿陳金鋒。趙文彬攝</p></div></figure>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://twimg.edgesuite.net/images/ReNews/20160518/640_837e34ea35e6fd8eacde765077ad6e5e.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertTrue(true);
    }

}