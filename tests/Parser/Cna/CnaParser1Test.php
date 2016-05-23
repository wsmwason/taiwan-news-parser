<?php

namespace Tests\Parser\Cna;

use Tests\TestCase;

class CnaParser1Test extends TestCase
{

    protected $url = 'http://www.cna.com.tw/news/firstnews/201605210037-1.aspx';

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
        $this->assertEquals('http://www.cna.com.tw/news/firstnews/201605210037-1.aspx', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-21 09:04:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('茲卡病毒首現蹤非洲 法領土傳死亡首例', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $content = preg_replace('#\s+#', ' ', $content);
        $this->assertEquals('<div class="pic_400_r"> <span class="icon"> <a class="venobox" data-gall="myGallery" href="http://img5.cna.com.tw/www/WebPhotos/800/20160521/1259001.jpg"> <img src="/images/Add_searching_512.png" alt=""/></a></span><img src="http://img5.cna.com.tw/www/WebPhotos/800/20160521/1259001.jpg" border="0"/><span>世界衛生組織官員20日說，與拉丁美洲神經系統疾病和天生缺陷病例激增有關的茲卡病毒株，首度在非洲被發現。世衛發言人凡德福說：「這項發現令人憂心，因這進一步證實爆發於南美洲的茲卡病毒已擴大，並攻入非洲。」（圖片來源：美國疾控中心，版權屬公共領域）</span></div><p>（中央社日內瓦20日綜合外電報導）世界衛生組織（WHO）官員今天說，與拉丁美洲神經系統疾病和天生缺陷病例激增有關的茲卡病毒株，首度在非洲被發現。<br/><br/>同時，法新社報導，加勒比海馬丁尼閣島（Martinique）的公民因感染茲卡不治死亡，是法國領土首傳死亡病例。<br/><br/>世衛宣布，在西非國家維德角（Cape Verde）傳播的茲卡病毒株，與美洲劇增的病例相同。<br/><br/>世衛非洲地區主管莫耶提（Matshidiso Moeti）在日內瓦告訴記者：「這是神經系統疾病及小頭畸形症爆發元兇的茲卡病毒株，首度於非洲被發現。」<br/><br/>維德角傳出多起病例後，如今所謂的「亞洲型」病毒株於這座島國被驗出。巴西高達150萬感染茲卡病毒，是茲卡重災區。<br/><br/>世衛發言人凡德福（Marsha Vanderford ）向記者說：「在維德角亂竄的病毒基因物質與巴西相同。」<br/><br/>凡德福說：「這項發現令人憂心，因這進一步證實爆發於南美洲的茲卡病毒已擴大，並攻入非洲。」<br/><br/>她說：「相關資訊將有助非洲國家重新評估茲卡病毒風險水平，並且修正和提高戒備的水平。」1050521</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://img5.cna.com.tw/www/WebPhotos/800/20160521/1259001.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('茲卡病毒,ZIKA,WHO,世界衛生組織', $this->newsEntry->getTags());
    }

}