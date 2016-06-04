<?php

namespace wsmwason\TaiwanNewsParser\Parser;

use wsmwason\TaiwanNewsParser\IParser;
use wsmwason\TaiwanNewsParser\NewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

/**
 * 民視新聞
 */
class FtvParser implements IParser {

    use NewsParser;

    public static function getDomain()
    {
        return 'news.ftv.com.tw';
    }

    public function parse()
    {
        $entry = new NewsEntry();
        $entry->setUrl($this->parseUniqueUrl());
        $entry->setCompanyName($this->parseCompanyName());
        $entry->setTitle($this->parseTitle());
        $entry->setContent($this->parseContent());
        $entry->setReporterName($this->parseReportName($entry->getContent()));
        $entry->setPublishTime($this->parsePublishTime());
        $entry->setTags($this->parseTags());
        $entry->setThumbnailImage($this->parseThumbnailImage());
        return $entry;
    }

    private function parseCompanyName()
    {
        return '民視新聞';
    }

    private function parseUniqueUrl()
    {
        if (count($elements = $this->document->find('meta[property=og:url]')) != 0) {
            return $elements[0]->attr('content');
        }
        return $this->url;
    }

    private function parseTitle()
    {
        if (count($elements = $this->document->find('meta[property=og:title]')) != 0) {
            return $elements[0]->attr('content');
        }
    }

    private function parseContent()
    {
        if (count($elements = $this->document->find('#newscontent')) != 0) {
            $content = $elements[0]->innerHtml();

            $content = str_replace('&#13;', '', $content);

            $content = trim($content);
            return $content;
        }
    }

    private function parseReportName($content)
    {
        if (!empty($content)) {
            if (preg_match('#民視新聞(.{2,12}?)(綜合)?報導#isu', $content, $match)) {
                $reportName = $match[1];
                $placeName = [
                    '台北', '新北', '台中', '台南', '高雄', '基隆', '新竹', '嘉義', '桃園', '新竹',
                    '苗栗', '彰化', '南投', '雲林', '嘉義', '屏東', '宜蘭', '花蓮', '台東', '澎湖', '金門', '連江',
                ];
                if ($reportName=='綜合') {
                    return;
                }
                foreach ($placeName as $place) {
                    if (strpos($reportName, $place . '市') !== false) {
                        return str_replace($place . '市', '', $reportName);
                    }
                    if (strpos($reportName, $place) !== false) {
                        return str_replace($place, '', $reportName);
                    }
                }
                return $reportName;
            }
        }
    }

    protected function parsePublishTime()
    {
        if (count($elements = $this->document->find('#ctl00_ContentPlaceHolder1_Label2')) != 0) {
            return date('Y-m-d H:i:s', strtotime($elements[0]->text()));
        }
    }

    protected function parseTags()
    {
        if (count($elements = $this->document->find('meta[itemprop=keywords]')) != 0) {
            return $elements[0]->attr('content');
        }
    }

    protected function parseThumbnailImage()
    {
        if (count($elements = $this->document->find('meta[property=og:image]')) != 0) {
            return $elements[0]->attr('content');
        }
    }

}
