<?php

namespace Tests\Parser\Cna;

use Tests\TestCase;

class CnaParser3Test extends TestCase
{

    protected $url = 'http://www.cna.com.tw/news/aopl/201605040534-1.aspx';

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
        $this->assertEquals('http://www.cna.com.tw/news/aopl/201605040534-1.aspx', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('徐梅玉', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-04 23:10:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('出生入死  索馬利亞記者不懼威脅', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $content = preg_replace('#\s+#', ' ', $content);
        $this->assertEquals('<p>（中央社記者徐梅玉約翰尼斯堡4日專電）東非國家索馬利亞自1992年以來，已有59名記者因公殉職。可是他們仍堅守岡位，報導真實新聞，無所畏懼。<br/><br/>40歲的杜拉雅（Abdiqadir Dulyar）是胡恩有線電視（Horn Cable TV）的總裁，因為經常接到死亡威脅，所以乾脆以公司為家。<br/><br/>上周1輛滿載該公司記者的車子，在首都摩加迪休（Mogadishu）突然遭到槍手襲擊。雖然慶幸無人傷亡，但致使杜拉雅的恐懼感達到最高點。<br/><br/>昨天是世界新聞自由日（World Press Freedom Day）。南非媒體「新聞24」（News24）引述人權觀察（Human Rights Watch ）報導指出，在這個重要的日子卻沒有任何索馬利亞記者出生入死、遭叛軍謀殺後破案率很低的相關報導。<br/><br/>叛軍「青年黨」（Shabaab）是個與伊斯蘭北非蓋達組織勾結的激進派，1990年代組成，2007年開始正式成為叛軍，實施嚴格律法，顛覆政府，自成一國，造成國家極度動盪不安。<br/><br/>在聯合國與非盟的努力下，自2011年起已經收復多座城市。大部分記者選擇有政府軍保護的地區工作，但安全感低，必需時刻注意背後偷襲。<br/><br/>報導引述杜拉雅說：「威脅與恐懼繼續如影隨形跟著記者。話雖如此，無論如何，我都會堅持擔綱為全球傳遞訊息的使者。」1050504</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://img5.cna.com.tw/www/images/pic_fb.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('', $this->newsEntry->getTags());
    }

}