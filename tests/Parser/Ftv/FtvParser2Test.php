<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class FtvParser2Test extends TestCase
{

    protected $url = 'http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016603C12M1';

    public function testParser()
    {
        $this->assertInstanceOf('wsmwason\TaiwanNewsParser\NewsEntry', $this->newsEntry);
    }

    /**
     * @depends testParser
     */
    public function testCompanyName()
    {
        $this->assertEquals('民視新聞', $this->newsEntry->getCompanyName());
    }

    /**
     * @depends testParser
     */
    public function testUrl()
    {
        $this->assertEquals('http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016603C12M1', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('賴姵君', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-06-03 18:24:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('黑熊現蹤玉山 驚傳追人撞門搶食物', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $content = $this->newsEntry->getContent();
        $this->assertEquals('爬玉山，小心有熊出沒！玉管處，日前委託工人整修東部園區吊橋，兩名工人，5天內二度在「抱崖吊橋」，目擊台灣黑熊出沒，而且為了覓食，黑熊還猛追，試圖撞開山屋大門。<br /><br />工人檢修抱崖吊橋，5月11日深夜休息，突然聽到動物吼叫聲，外出察看，忽有龐然大物，拔山倒樹而來，蓋一「台灣黑熊」也。<br /><br />聲音來源：目擊工人：「直接上來要撥我的臉，最起碼有200斤以上，我馬上關門，用鋼條鐵管封起來，雙腳都發抖軟掉了。」<br /><br />高約2公尺的黑熊，從山林竄出，相隔4天又再度遇見，兩名工人拔腿跑回山屋，黑熊猛衝追趕，還曾撞門搶奪食物。<br /><br />聲音來源：目擊工人：「10公斤的豬肉還有一些罐頭，乾糧泡麵麵條，全部被吃光。」<br /><br />黑熊撞門，在門上留下掌印，工人下山通報，還留下警告字句，提醒山友注意。玉管處呼籲，爬山結伴而行，攜帶防熊噴霧劑，如果遇到黑熊，必須冷靜面對，安靜迅速離開現場，避免過度驚嚇或正面衝突。（民視新聞賴姵君南投報導）', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://news.ftv.com.tw/client/img/2016/06/03/2016603C12M1.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('', $this->newsEntry->getTags());
    }

}