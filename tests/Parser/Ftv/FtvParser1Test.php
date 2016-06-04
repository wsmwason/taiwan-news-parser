<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class FtvParser1Test extends TestCase
{

    protected $url = 'http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016603A05M1';

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
        $this->assertEquals('http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016603A05M1', $this->newsEntry->getUrl());
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
        $this->assertEquals('2016-06-03 14:26:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('印地安人突破鐵牛陣 皇家中止6連勝', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $content = $this->newsEntry->getContent();
        $this->assertEquals('王建民效力的皇家隊，7~9局的後援投手鐵牛陣，是他們相當有名的勝利方程式，但今天（6月3日）皇家佈局投手掉分，終結者也救援失敗，讓印地安人以再見高飛犧牲打逆轟獲勝，也中止皇家本季最長的6連勝。<br /><br />球賽主播：「切球被打出去布泰拉，這是他今年（2016年）的第1支全壘打。」<br /><br />最近機槍上膛的皇家，這場球口徑加大，讓傷兵歸隊的Carlos Carrasco，受到重傷，不過印地安人的打線，就是有辦法一分一分的追，3局Ramirez強力安打，原住民朋友把比數追平了，不過帶著大砲來的皇家，6局又來一發。<br /><br />球賽主播：「喔我的天啊，在左外野的角落，卡伯勒本季第2發全壘打。」<br /><br />皇家兩度取得領先，但是堅強的牛棚，今天凸了槌，關鍵就是9局下半，Francisco Lindor的這一棒。<br /><br />球賽主播：「右外野方向平飛球，這是支安打球，落地還滾到牆邊，馬丁尼茲跑回了追平分，林朵繞過二壘，安全衝上三壘。」<br /><br />打下追平分的三壘安打，變成皇家麻煩大了，過去專門逆轉勝的皇家部隊，這場球角色轉換，體驗到了被逆轉的感覺。<br /><br />球賽主播：「林朵進攻要跑回來了，球回傳印地安人又一次逆轉勝。」<br /><br />昨天雙城今天皇家，印地安人連續兩天用再見一擊取勝，而皇家4：5遭到逆轉，中斷了最近的6連勝。（民視新聞綜合報導）', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://news.ftv.com.tw/client/img/2016/06/03/2016603A05M1.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('', $this->newsEntry->getTags());
    }

}