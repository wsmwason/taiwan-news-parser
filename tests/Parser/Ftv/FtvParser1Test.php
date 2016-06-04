<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class EttodayParser1Test extends TestCase
{

    protected $url = 'http://www.ettoday.net/news/20160321/666835.htm';

    public function testParser()
    {
        $this->assertInstanceOf('wsmwason\TaiwanNewsParser\NewsEntry', $this->newsEntry);
    }

    /**
     * @depends testParser
     */
    public function testCompanyName()
    {
        $this->assertEquals('ETtoday東森新聞雲', $this->newsEntry->getCompanyName());
    }

    /**
     * @depends testParser
     */
    public function testUrl()
    {
        $this->assertEquals('http://www.ettoday.net/news/20160321/666835.htm', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('林彥斌', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-03-21 19:42:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('中日少棒五強爭霸賽　竹市小健兒力爭', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<p><img src="http://static.ettoday.net/images/1680/d1680752.jpg" width="600" height="400" alt=""/></p><p><strong><span> ▲「新竹市中日少棒錦標賽」開打，新竹市長林智堅為選手打氣。</span></strong></p><p>新竹振道記者林彥斌／新竹報導</p><p>中華職棒27年賽季甫開幕，連續舉辦25年的「新竹市中日少棒錦標賽」也在21日正式開打，市長林智堅與西門、東門、東園及香山少棒隊的選手們約定，一定要讓冠軍、榮耀留在新竹，絕不輕言放棄！</p><p>林智堅一早換穿運動鞋，前往新竹簡易棒球場出席「2016年新竹市第25屆中日少棒錦標賽」開幕典禮，除向遠道而來的日本大阪黑豹隊表示歡迎，更勉勵選手透過交流締結友誼。</p><p>林智堅致詞時，還隨機點名東門國小一壘手李明奕及香山國小左外野手蔡士言，他好奇詢問，兩人有無信心把冠軍留在新竹？李明奕、蔡士言皆高呼「有信心」，終讓五強爭霸賽增添不少煙硝味。其中，東門國小李明奕更曾奪得2014年全國奧林匹亞數學競賽第一名，在課業與球隊活動之間力求嚴謹、自律，讓林智堅相當欽佩。</p><p>此外，為讓選手享有更優質的比賽及練習場所，新竹市政府積極籌畫興建虎林棒球場，今（105）年1月13日已舉行開工動土典禮，讓少棒、青少棒、青棒等三級棒球選手擁有自己的主場，終結「流浪練球」的窘境，也提供大面積公園綠地，讓附近居民共同運動使用。</p><p><iframe width="560" height="315" src="https://www.youtube.com/embed/ivTcnmifaRI" frameborder="0" allowfullscreen=""/></p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://static.ettoday.net/images/1680/d1680752.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('中日少棒五強爭霸賽', $this->newsEntry->getTags());
    }

}