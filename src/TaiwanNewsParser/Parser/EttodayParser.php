<?php

namespace wsmwason\TaiwanNewsParser\Parser;

use wsmwason\TaiwanNewsParser\IParser;
use wsmwason\TaiwanNewsParser\NewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

/**
 * ETtoday
 */
class EttodayParser implements IParser {

    use NewsParser;

    public static function getDomain()
    {
        return 'www.ettoday.net';
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
        return 'ETtoday東森新聞雲';
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
        if (count($elements = $this->document->find('h2[itemprop=headline]')) != 0) {
            return $elements[0]->text();
        }
    }

    private function parseContent()
    {
        if (count($elements = $this->document->find('sectione[itemprop=articleBody]')) != 0) {
            $content = $elements[0]->innerHtml();

            $endContentPos = strpos($content, '<!-- 文章內容 結束 -->');
            if ($endContentPos!==false) {
                $content = substr($content, 0, $endContentPos);
            }

            // Remove iframe exclude youtube
            $content = preg_replace_callback('#<iframe[^>]+>#isu', function($match){
                if (strpos($match[0], 'youtube')!==false) {
                    return $match[0];
                }
                return '';
            }, $content);

            // Remove test-keyword
            $content = preg_replace('#<div class="test-keyword">(.*?)</div>#isu', '', $content);
            $content = str_replace('<!-- 文章內容 開始 -->', '', $content);
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
            if (preg_match('#記者(.{2,6}?)／#isu', $content, $match)) {
                return $match[1];
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
