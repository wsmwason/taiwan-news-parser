<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class TvbsParser2Test extends TestCase
{

    protected $url = 'http://news.tvbs.com.tw/life/news-654808/';

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
        $this->assertEquals('http://news.tvbs.com.tw/life/news-654808/', $this->newsEntry->getUrl());
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
        $this->assertEquals('2016-05-19 23:18:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('音樂神童凡格羅夫　5月台北炫技', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<p><span style="font-size: 10px;">國際小提琴大師麥可辛凡格羅夫5月底將來台演出，包含巴哈、貝多芬和易沙意等重量級曲目一次呈現。</span></p><p>俄系小提琴權威麥可辛凡格羅夫，精準完美的演奏技巧卻又不因為炫技，而失去音樂的平衡性，總讓樂迷享受難忘的弓弦樂聲。</p><p>5歲開始學習小提琴，老師是蘇聯時期名師查寧諾娃神童拜藝大師，凡格羅夫從此一鳴驚人展開獨奏家生涯，30歲前就錄完音樂史上所有重要的小提琴協奏曲，被譽為百年難得一見的音樂奇才。</p><p>5月底凡格羅夫將來台演出，曲目包含巴哈、貝多芬和易沙意等重量級作品，兼具高度技巧和濃烈感情的實力展現，要讓台灣樂迷留下難忘的提琴饗宴。</p><p><img style="width: 662px;" title="音樂神童凡格羅夫　5月台北炫技 音樂神童 凡格羅夫 炫技" src="/export/sites/tvbs/news/life/images/2016/05/19/TVBS-N_10M_20160516_20-30-01.mp4_20160519_232340.929.jpg" alt=""/></p><p>圖／TVBS</p>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://www.tvbs.com.tw/export/sites/tvbs/news/life/images/2016/05/19/TVBS-N_10M_20160516_20-30-01.mp4_20160519_232403.955.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('麥可辛凡格羅夫,小提琴,巴哈,貝多芬', $this->newsEntry->getTags());
    }

}