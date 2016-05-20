<?php

namespace Tests\Parser\Tvbs;

use Tests\TestCase;

class TvbsParser3Test extends TestCase
{

    protected $url = 'http://news.tvbs.com.tw/fun/news-603557/';

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
        $this->assertEquals('http://news.tvbs.com.tw/fun/news-603557/', $this->newsEntry->getUrl());
    }

    /**
     * @depends testParser
     */
    public function testReporterName()
    {
        $this->assertEquals('邱偉雄 呂蓓君', $this->newsEntry->getReporterName());
    }

    /**
     * @depends testParser
     */
    public function testPublishTime()
    {
        $this->assertEquals('2015-06-16 20:57:00', $this->newsEntry->getPublishTime());
    }

    /**
     * @depends testParser
     */
    public function testTitle()
    {
        $this->assertEquals('E3電玩展搶先看　虛擬實境、遊戲新作吸睛', $this->newsEntry->getTitle());
    }

    /**
     * @depends testParser
     */
    public function testContent()
    {
        // Remove new line before test
        $content = str_replace(array("\r", "\n"), '', $this->newsEntry->getContent());
        $this->assertEquals('<div> </div><div>電玩界年度最大盛事E3電玩展，將在台灣時間17日舉辦，搶在開展前夕，各家大廠依慣例陸續舉辦展前記者會，微軟推出虛擬眼鏡讓玩家更能深入遊戲之中，現場實際操作畫面讓人很驚艷，雖然Sony早在去年就有虛擬眼鏡亮相，但記者會上沒有太多著墨，而且兩家大廠也都還沒公布上市時間。</div><div> </div><div> </div><div>記者呂蓓君：「微軟和sony都分別在E3展前，開了各自的展前記者會，來宣布重磅的遊戲以及各項遊戲的訊息，但你一定想問任天堂跑到哪去了，來仔細看記者身上的吊牌，吊牌上面都是任天堂經典的遊戲人物，雖然任天堂這次沒有租下記者會場地開實體的記者會，是用線上直播的方式，但也用這種方式宣告他們的存在感，我們可以看到現場到處都有綠色的燈光，看起來就很像是演唱會，這裡其實是Xbox的展前記者會，E3電玩展即將在明天美國時間6/16日舉辦電玩展，不過微軟搶在電玩展之前，搶先召開展前記者會就是要來看，有多少款的重磅遊戲，要來介紹給全球的玩家，不過大家有沒有發現，記者身上有帶了小小方塊，這個小小方塊是所有媒體進來會場，都會拿到的小禮物，這要做什麼用，就是待會Xbox的記者會開始的時候，微軟會用這個小方塊跟大家一起做互動。」</div><div> </div><div>每個人緊盯著台上的發表會，就怕錯過精彩時刻，遊戲一款接著一款，其中最引人注意的就是這個。xbox主持人：「虛擬實境技術，Hololens來自微軟。」</div><div> </div><div>想要看清楚還得費一番工夫，因為要讓玩家更能享受玩game的樂趣，推出虛擬實境的眼鏡，讓遊戲世界馬上呈現在眼前，你以爲這樣就結束了嗎？還有更炫的。示範者：「創造世界。」</div><div> </div><div>一瞬間就可以建立一座城堡，現場馬上響起一片的驚呼聲，再往裡面點一下就可以看到城堡裡面的細節，用手往旁邊一揮，剛剛不存在的城鎮也馬上出現，地底下還有神秘關卡等著你去探險，但全球粉絲最期待的還是。玩家：「Halo 5絕對是Halo，可能是虛擬眼鏡吧，它讓我置身在未來，就像是現實生活中的鋼鐵人。」</div><div> </div><div>這款以第一人稱設計的射擊遊戲，畫面精緻豐富，槍戰場面逼真，加上新增多人連線對戰，馬上攻佔了玩家的心，不只如此，微軟在遊戲機三雄中，率先開放新一代遊戲機Xbox one裡的遊戲，可以和Xbox 360互相使用 讓Xbox one瞬間新增上百款遊戲。</div><div> </div><div>記者呂蓓君：「展前記者會不能錯過的另外一場，就是Sony的記者會，而我們在會場可以看到，Sony放滿了曲面的藍色螢幕，而且還有很多大型螢幕也在現場，看起來也像是演唱會等級，而且這場規模似乎比微軟還大一些，不過遊戲市場競爭相當激烈，我們可以看到遊戲機PS4，在上半年銷售量就相當亮眼，同時今年Sony的重點，也是放在虛擬的部份，虛擬他們去年就有推出虛擬眼鏡了，今年他們還會有什麼樣的應用，值得讓人期待。」</div><div> </div><div>Sony一開始就新遊戲連發，像是食人大鷲和少年的冒險遊戲，將在2016年推出，台灣遊戲迷最期待的，恐怕就是這款final fantasy 7的重製版。代表著將經典2D rpg遊戲轉成3D的新一代里程碑，還有這款經典遊戲莎木，連作者都親臨現場 要重新募資製作新版，也讓玩家嗨翻天。</div><div> </div><div>記者呂蓓君：「剛剛看完Sony的展前記者會，有沒有覺得很不過癮呢？因為有很多的重磅遊戲，都是讓你偷看5秒10秒，都沒有公布正式的發布時間跟上市時間，甚至是虛擬眼鏡裡面的應用也在裡面，也提到很少，究竟有什麼新的遊戲，可以應用在Sony的虛擬眼鏡，恐怕得在E3電玩展的時候一探究竟。」</div><div> </div><div><img style="width: 662px;" title="E3電玩展搶先看　虛擬實境、遊戲新作吸睛 E3電玩展2" src="/export/sites/tvbs/news/fun/images/2015/06/16/13-CH55_Clean_10M_20150616_22-40-05.mp4_20150616_232217.jpg" alt=""/></div><div> </div><div><img style="width: 662px;" title="E3電玩展搶先看　虛擬實境、遊戲新作吸睛 E3電玩展1" src="/export/sites/tvbs/news/fun/images/2015/06/16/13-CH55_Clean_10M_20150616_22-40-05.mp4_20150616_232224.jpg" alt=""/></div><div> </div><div><img style="width: 662px;" title="E3電玩展搶先看　虛擬實境、遊戲新作吸睛 E3電玩展" src="/export/sites/tvbs/news/fun/images/2015/06/16/13-CH55_Clean_10M_20150616_22-40-05.mp4_20150616_232302.jpg" alt=""/></div>', $content);
    }

    /**
     * @depends testParser
     */
    public function testThumbnailImage()
    {
        $this->assertEquals('http://www.tvbs.com.tw/export/sites/tvbs/news/fun/images/2015/06/16/13-CH55_Clean_10M_20150616_22-40-05.mp4_20150616_232215.jpg', $this->newsEntry->getThumbnailImage());
    }

    /**
     * @depends testParser
     */
    public function testTags()
    {
        $this->assertEquals('電玩,E3電玩展,虛擬實境', $this->newsEntry->getTags());
    }

}