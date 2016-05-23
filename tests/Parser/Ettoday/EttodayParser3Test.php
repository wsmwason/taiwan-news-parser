<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class EttodayParser3Test extends TestCase
{

    protected $url = 'http://www.ettoday.net/news/20160315/663047.htm';

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
        $this->assertEquals('http://www.ettoday.net/news/20160315/663047.htm', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('洪聖壹', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-03-15 04:02:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('GDC 16／AMD 發表首款內建處理器的VR裝置Sulon Q', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<p><iframe width="560" height="315" src="https://www.youtube.com/embed/zPT4-nRP7Bk" frameborder="0" allowfullscreen=""/></p><p>記者洪聖壹／美國舊金山報導</p><p>AMD 稍早與合作夥伴 Sulon 宣布推出內建處理器的 VR 頭戴式裝置 Sulon Q，擁有雙鏡頭，可以感應使用者身體動作，最重要的是它採用 Windows 10 平台，搭載 AMD FX-8800P 四核心處理器跟 Radeon R7 顯卡，支援 2K 解析度顯示，相較高階 VR 裝置來說，硬體規格不高，但是已經讓 mobile VR 有的重大的突破。</p><p><img src="http://static.ettoday.net/images/1667/d1667516.jpg" alt=""/></p><p>Sulon Q 搭載 AMD FX-8800P 四核心處理器跟 Radeon R7 顯卡，還內建 256GB SSD硬碟，8GB 記憶體，並且擁有一個 2560×1440 OLED 螢幕，螢幕前方內建了兩顆鏡頭，結合了實時機器視覺技術與混合現實空間的處理，換句話說，就是支援 VR 與 AR，並且提供手勢識別功能，這兩顆鏡頭可以偵測使用者的動作，不用像是現有的虛擬實境裝置一樣，要在頭戴式裝置上設計追蹤感測器，也不用線，更不用使用控制器或者戴上手套，就可以用自己的雙手，探索虛擬實境。</p><p><img src="http://static.ettoday.net/images/1667/d1667513.jpg" alt=""/></p><p><img src="http://static.ettoday.net/images/1667/d1667514.jpg" alt=""/></p><p><img src="http://static.ettoday.net/images/1667/d1667515.jpg" alt=""/></p><p>目前 Sulon Q 還只是開發原型，並沒有相關的上市情報，不過像這樣子把電腦戴在頭上玩遊戲，以現有技術來說，還有很多問題需要克服，好比說續航力、電磁波對人腦的影響、售價等等，這些 AMD 與 Sulon Q 尚未做進一步解釋，如果這些都解決了，那麼同時要思考是，玩家們的身心，已經準備好要迎接「真。虛擬實境」時代的來臨了嗎？</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://static.ettoday.net/images/1667/d1667516.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('AMD,Sulon Q,VR,虛擬實境', $this->newsEntry->getTags());
    }

}