<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class FtvParser3Test extends TestCase
{

    protected $url = 'http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016602F09M1';

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
        $this->assertEquals('http://news.ftv.com.tw/NewsContent.aspx?ntype=class&sno=2016602F09M1', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('宋宜芳、游博智', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2016-06-02 17:47:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('畢業季搶人才  大賣場徵才考叫賣', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        $content = $this->newsEntry->getContent();
        $this->assertEquals('畢業季到來，各家企業也都紛紛爭搶人才，就有賣場開出儲備幹部起薪35000的薪水，不過來應徵的人，除了考叫賣技巧之外，還要考狀況題，甚至還要動手拼七巧板拼圖，考驗團隊合作的能力。<br /><br />求職者張文遠：「好吃在哪裡？香、酥、脆！」<br /><br />想到賣場工作，得先學會，怎麼叫賣！第一位求職者嗓門大又亮，不過下一位，可就真的有點太緊張啦！<br /><br />求職者鄭健強：「你來買就會減少很多的價格，你平常來買的話，就買不到這個價格。」<br /><br />要推銷東西，產品特性、價格缺一不可，結果這名求職者一直跳針，這個叫賣大考驗，就是要考口語流暢度，更得把商品資訊完整的傳達給客人。<br /><br />求職者：「來喔來買麵包啦，現在沙其瑪特價中。」<br /><br />畢業季賣場大舉徵才，這回要找500個儲備幹部，起薪35000元，薪水不低，因此除了考基本功，還要出狀況題，看看臨場反應。<br /><br />面試官vs.求職者：「教育成這麼爛的員工，不好意思不好意思是嗎，是這樣子的嗎。」<br /><br />服務業嘛！客人永遠是對的！要進入這行得看站在顧客的立場思考，而這樣還不夠，就連七巧板也搬出來，要看看這組6名求職者，團隊合作的能力。<br /><br />求職者林世哲：「向上的心還有熱忱。」<br /><br />求職者賈淳安：「我覺得我的優勢，我還蠻喜歡跟人做互動，需要非常大的耐心，來傾聽我們的顧客需要什麼。」<br /><br />賣場公關經理何默真：「管理的人他必須要面對，從上面來的壓力，必須要面對，從下面來的這些員工的教育，這個部分的職位，在賣場裡面最重要的也最艱辛的。」<br /><br />賣場要找優秀人才，題目五花八門，也讓新鮮人要挑戰高薪，得有更多熱情和智慧，才能拼出好薪情。（民視新聞宋宜芳、游博智新北市報導）', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://news.ftv.com.tw/client/img/2016/06/02/2016602F09M1.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('', $this->newsEntry->getTags());
    }

}