<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class EttodayParser2Test extends TestCase
{

    protected $url = 'http://www.ettoday.net/news/20160315/663430.htm';

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
        $this->assertEquals('http://www.ettoday.net/news/20160315/663430.htm', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('許雅綿', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-03-15 17:04:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('GDP保2困難！　國泰金估：央行3月會降息半碼', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<p><img src="http://static.ettoday.net/images/1668/d1668244.jpg" width="600" height="339" alt=""/></p><p><strong>▲國泰金與台大產學團隊發表台灣2016年經濟展望，左二為中央大學經濟學系教授徐之強。（圖／記者許雅綿攝）</strong></p><p>記者許雅綿／台北報導</p><p>2015年12月Fed重啟升息後，金融市場波動持續加大，中央大學經濟學系教授徐之強說，在人行3月初降準、歐洲央行（ECB）擴大寬鬆，以及美國聯準會（Fed）可望暫緩升息等全球持續寬鬆政策拉動下，央行3月降息半碼機率大，甚至可能擴大降息幅度，但不認為台灣有實施「負利率」的可能性。</p><p>國泰金控與台大產學團隊15日發表台灣2016年經濟展望，下調2016年經濟成長率（GDP）至1.6%（原預測值2.1%），徐之強坦言，去年連1%都不到，今年「要保2很困難」；而央行的利率因為經濟成長率表現不佳，所以希望透過降息來刺激民間投資、消費力度，帶動台灣的經濟成長率，但「台灣目前沒有實施負利率的空間」。</p><p>徐之強說，在通縮環境下，才有實施負利率政策的可能，台灣1、2月物價上漲率超過1%以上，還沒有到通縮的情況，因此，認為目前仍沒有實施負利率的空間。</p><p>展望未來金融市場，徐之強指出，美國、中國大陸金融情勢轉趨穩定，台灣央行3月降息半碼的機會最大，甚至可能擴大降一碼，負利率政策在2016年出現的機率極低；且根據國泰金調查指出，民眾股市樂觀指數上揚，預期上半年整體金融情勢指數將持續穩定。</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://static.ettoday.net/images/1668/d1668244.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('央行,降息,國泰金,GDP,經濟成長率', $this->newsEntry->getTags());
    }

}