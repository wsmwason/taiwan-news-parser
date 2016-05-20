<?php

namespace wsmwason\TaiwanNewsParser\Parser;

use wsmwason\TaiwanNewsParser\IParser;
use wsmwason\TaiwanNewsParser\NewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

/**
 * TVBS
 */
class TvbsParser implements IParser {

    use NewsParser;

    public static function getDomain()
    {
        return 'news.tvbs.com.tw';
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
        return 'TVBS';
    }

    private function parseUniqueUrl()
    {
        if (preg_match('#<meta property="og:url" content="(.*?)"#', $this->document->html(), $match)) {
            return $match[1];
        }
        return $this->url;
    }

    private function parseTitle()
    {
        if ($this->document->has('.reandr_title h2')) {
            return $this->document->find('.reandr_title h2')[0]->text();
        }
    }

    private function parseContent()
    {
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
        if ($this->document->has('.Update_time')) {
            $html = $this->document->find('.Update_time')[0]->innerHtml();
            if (preg_match_all('#<a href="/opencms/news/reporter/index\.html\?reporter=[^"]+">(.*?)</a>#isu', $html, $matchs)) {
                return join(' ', $matchs[1]);
            }
        }

        if (!empty($content)) {
            $content = strip_tags($content);
            if (preg_match('#>?([^>|\n]{1,5}?)[/／╱]TVBS#isu', $content, $match)) {
                return $match[1];
            }
        }
    }

    protected function parsePublishTime()
    {
        if ($this->document->has('.Update_time')) {
            $html = $this->document->find('.Update_time')[0]->innerHtml();

            if (preg_match_all('#\d{4}/\d{2}/\d{2} \d{2}:\d{2}#', $html, $match)) {
                return date('Y-m-d H:i:s', strtotime(current($match[0])));
            }
        }
    }

    protected function parseTags()
    {
        $tags = [];
        if ($this->document->has('.tag_box')) {
            foreach ($this->document->find('.tag_box h3') as $tag) {
                $tags[] = $tag->text();
            }
        }
        return join(',', $tags);
    }

    protected function parseThumbnailImage()
    {
        if (preg_match('#<meta property="og:image" content="(.*?)"#', $this->document->html(), $match)) {
            return $match[1];
        }
    }

}
