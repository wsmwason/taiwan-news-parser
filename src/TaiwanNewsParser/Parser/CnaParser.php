<?php

namespace wsmwason\TaiwanNewsParser\Parser;

use wsmwason\TaiwanNewsParser\IParser;
use wsmwason\TaiwanNewsParser\NewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

/**
 * CNA中央通訊社
 */
class CnaParser implements IParser {

    use NewsParser;

    public static function getDomain()
    {
        return 'www.cna.com.tw';
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
        return '中央社';
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
        if (count($elements = $this->document->find('h1[itemprop=headline]')) != 0) {
            return $elements[0]->text();
        }
    }

    private function parseContent()
    {
        if (count($elements = $this->document->find('section[itemprop=articleBody]')) != 0) {
            $content = $elements[0]->innerHtml();

            // Remove iframe exclude youtube
            $content = preg_replace_callback('#<iframe[^>]+>#isu', function($match){
                if (strpos($match[0], 'youtube')!==false) {
                    return $match[0];
                }
                return '';
            }, $content);

            $content = str_replace('&#13;', '', $content);

            $content = trim($content);

            return $content;
        }
        if ($this->document->has('.reandrBox')) {
            $content = $this->document->find('.text_Message')[0]->innerHtml();

            // Remove unused div
            $content = preg_replace('#<div id="div-inread-ad">(.*?)</div>#isu', '', $content);
            $content = preg_replace('#<div class="g-ytsubscribe"[^>]+>#isu', '', $content);
            $content = preg_replace('#<script[^>]+>#isu', '', $content);

            // Remove
            $content = str_replace('<p><strong>★更多高畫質新聞【線上看】 ▶ ▶</strong></p>', '', $content);

            $content = trim($content);

            return $content;
        }
    }

    private function parseReportName($content)
    {
        if (!empty($content)) {
            if (preg_match('#記者(.{2,10}?)\d+#isu', $content, $match)) {
                $reportName = $match[1];
                $placeName = [
                    '台北', '新北', '台中', '台南', '高雄', '基隆', '新竹', '嘉義', '桃園', '新竹',
                    '苗栗', '彰化', '南投', '雲林', '嘉義', '屏東', '宜蘭', '花蓮', '台東', '澎湖', '金門', '連江',
                    '東京', '日內瓦',
                ];
                foreach ($placeName as $place) {
                    if (strpos($reportName, $place) !== false) {
                        return str_replace($place, '', $reportName);
                    }
                }
                // 名字是兩個字的抱歉了
                $reportName = mb_substr($match[1], 0, 3, 'UTF-8');
                return $reportName;
            }
        }
    }

    protected function parsePublishTime()
    {
        if (count($elements = $this->document->find('meta[itemprop=datePublished]')) != 0) {
            $datetime = str_replace('T', ' ', $elements[0]->attr('content'));
            return date('Y-m-d H:i:s', strtotime($datetime));
        }
    }

    protected function parseTags()
    {
        if (count($elements = $this->document->find('meta[itemprop=keywords]')) != 0) {
            $keyword = $elements[0]->attr('content');
            $keywords = explode(',', $keyword);
            if (isset($keywords)) {
                unset($keywords[0]);
            }
            return join(',', $keywords);
        }
    }

    protected function parseThumbnailImage()
    {
        if (count($elements = $this->document->find('meta[property=og:image]')) != 0) {
            return $elements[0]->attr('content');
        }
    }

}
