<?php

namespace wsmwason\TaiwanNewsParser\Parser;

use wsmwason\TaiwanNewsParser\IParser;
use wsmwason\TaiwanNewsParser\NewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

/**
 * 蘋果日報
 */
class AppleDailyParser implements IParser {

    use NewsParser;

    public static function getDomain()
    {
        return 'www.appledaily.com.tw';
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
        return '蘋果日報';
    }

    private function parseUniqueUrl()
    {
        if (preg_match('#"url": "(.*?)"#', $this->document->html(), $match)) {
            return $match[1];
        }
        return $this->url;
    }

    private function parseTitle()
    {
        if ($this->document->has('#h1')) {
            $title = $this->document->find('#h1')[0]->text();
            return $title;
        }
    }

    private function parseContent()
    {
        if ($this->document->has('.articulum')) {
            $content = $this->document->find('.articulum')[0]->innerHtml();

            // Remove iframe
            $content = preg_replace('#<iframe[^>]+>#isu', '', $content);
            
            // Remove unused div
            $content = preg_replace('#<div id="teadstv">(.*?)</div>#isu', '', $content);
            $content = preg_replace('#<div id="goldenhorse">(.*?)</div>#isu', '', $content);
            $content = preg_replace('#<div id="textlink">(.*?)</div>#isu', '', $content);
            $content = preg_replace('#<a _moz_dirty=""[^>]+>(.*?)</a>#isu', '', $content);
            $content = str_replace('<div style=" clear:both"/>', '', $content);
            $content = str_replace('&#13;', '', $content);

            $content = trim($content);

            return $content;
        }
    }

    private function parseReportName($content)
    {
        if (!empty($content)) {
            if (preg_match('#[\(（](.{2,5}?)[/／╱]#isu', $content, $match)) {
                return $match[1];
            }
        }
    }

    protected function parsePublishTime()
    {
        if (preg_match('#"dateCreated": "(\d{4}-\d{2}-\d{2}T\d{2}:\d{2}\+08:00)"#', $this->document->html(), $match)) {
            return date('Y-m-d H:i:s', strtotime($match[1]));
        }
    }

    protected function parseTags()
    {
        return '';
    }

    protected function parseThumbnailImage()
    {
        if (count($elements = $this->document->find('meta[property=og:image]')) != 0) {
            return $elements[0]->attr('content');
        }
    }

}
