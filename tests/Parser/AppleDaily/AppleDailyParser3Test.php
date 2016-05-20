<?php

namespace Tests\Parser\AppleDaily;

use Tests\TestCase;

class AppleDailyParser3Test extends TestCase
{

    protected $url = 'http://www.appledaily.com.tw/realtimenews/article/animal/20160518/864733/%E8%B2%93%E5%A5%B4%E5%BF%85%E5%82%99%E3%80%80%E8%A8%8E%E5%A5%BD%E8%B2%93%E4%B8%BB%E4%BA%BA%E5%B0%B1%E9%9D%A0%E9%80%99%E5%80%8B';

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
        $this->assertEquals('http://www.appledaily.com.tw/realtimenews/article/new/20160518/864733/', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('隋昊志', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-05-18 18:05:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('貓奴必備　討好貓主人就靠這個', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $content = preg_replace('#\s+#', ' ', $content);
        $this->assertEquals('<p id="summary" style="word-wrap: break-word;">很多貓奴們都想方設法要討家中貓主人的歡心，最好的辦法，或許就是讓自己同化跟他們一樣，如此一來，或許就能讓主人龍心大悅，多理睬貓奴一下。</p><div> </div>近日有國外廠商推出一個新商品Licki Brush，仿照貓舌外型，只要用嘴巴含住，就能把自己當成貓一般，用Licki Brush替貓主子梳毛清潔。臉書粉絲專頁「meowbox」分享Licki Brush的宣傳短片，影片中可以看到，在經過Licki Brush梳理後，喵星人看似相當滿意這種服務，甚至還會主動將頭湊上去討梳。<div> </div>影片PO出後，短短時間便超過百萬人次點閱，有不少網友似乎對Licki Brush很感興趣，紛紛表示想要入手一把服侍家中的貓主人。但也有網友吐槽說「這樣有比較好嗎」、「會不會太累了點」、「把自己搞得跟貓一樣也太詭異了吧」。（隋昊志／綜合報導）<br/> <div></div><br/> <figure class="lbimg sgimg sglft"><a title="翻攝自boredpanda網站" href="http://twimg.edgesuite.net/images/ReNews/20160518/640_ad6f81b614ef85264ffb57104d38e18f.gif"><img src="http://twimg.edgesuite.net/images/ReNews/20160518/420_ad6f81b614ef85264ffb57104d38e18f.gif"/><span/></a><div class="textbox"><p id="caption1">翻攝自boredpanda網站</p></div></figure>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://twimg.edgesuite.net/images/ReNews/20160518/640_9fc06b09b08ecfb8034dd186a6907743.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertTrue(true);
    }

}