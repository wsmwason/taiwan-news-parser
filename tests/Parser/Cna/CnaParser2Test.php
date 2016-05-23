<?php

namespace Tests\Parser\Cna;

use Tests\TestCase;

class CnaParser2Test extends TestCase
{

    protected $url = 'http://www.cna.com.tw/news/aspt/201605200386-1.aspx';

    public function testParser()
    {
        $this->assertInstanceOf('wsmwason\TaiwanNewsParser\NewsEntry', $this->newsEntry);
    }

    /**
     * @depends testParser
     */
    public function testCompanyName()
    {
        $this->assertEquals('中央社', $this->newsEntry->getCompanyName());
    }

    /**
     * @depends testParser
     */
    public function testUrl()
    {
        $this->assertEquals('http://www.cna.com.tw/news/aspt/201605200386-1.aspx', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('林宏翰', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-20 19:24:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('林智勝開季連續35場上壘  跨季95場', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $content = preg_replace('#\s+#', ' ', $content);
        $this->assertEquals('<div class="pic_750"> <div class="pic_750_inner"> <img src="http://img5.cna.com.tw/www/WebPhotos/800/20160520/5189419.jpg" border="0"/><span>中信兄弟二壘手林智勝20日在桃園棒球場對Lamigo桃猿的比賽，1局上敲二壘安打，開季連續35場比賽上壘，跨季95場上壘。（中央社檔案照片）</span> </div></div><p>（中央社記者林宏翰桃園20日電）中信兄弟二壘手林智勝今天在桃園棒球場對Lamigo桃猿的比賽，1局上敲二壘安打，開季連續35場比賽上壘，跨季95場上壘。<br/><br/>林智勝自3月19日開幕賽以來，個人出賽35場全都上壘，持續向他個人保持的單季連續60場上壘紀錄邁進。<br/><br/>扣掉今天這場比賽，中信兄弟上半季剩19場，林智勝挑戰單季60場上壘紀錄還差25場，要等到7月下半季開打。<br/><br/>林智勝去年6月20日到10月12日連續60場上壘，改寫張正偉2012年創下的58場聯盟紀錄。<br/><br/>加上開幕賽至今的35場連續上壘，林智勝跨季連95場上壘也是聯盟紀錄。1050520</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://img5.cna.com.tw/www/WebPhotos/800/20160520/5189419.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('', $this->newsEntry->getTags());
    }

}