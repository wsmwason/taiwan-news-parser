<?php

namespace wsmwason\TaiwanNewsParser;

class NewsEntry{

    private $url;
    private $companyName;
    private $title;
    private $content;
    private $reporterName;
    private $tags;
    private $publishTime;
    private $thumbnailImage;

    /**
     * 取得新聞來源網址
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 取得新聞公司名稱
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * 取得新聞標題
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 取得新聞內文
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 取得新聞記者名稱
     * @return string
     */
    public function getReporterName()
    {
        return $this->reporterName;
    }

    /**
     * 取得新聞標籤
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * 取得新聞發布時間
     * @return string
     */
    public function getPublishTime()
    {
        return $this->publishTime;
    }

    /**
     * 取得新聞縮圖
     * @return string
     */
    public function getThumbnailImage()
    {
        return $this->thumbnailImage;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setReporterName($reporterName)
    {
        $this->reporterName = $reporterName;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function setPublishTime($publishTime)
    {
        $this->publishTime = $publishTime;
    }

    public function setThumbnailImage($thumbnailImage)
    {
        $this->thumbnailImage = $thumbnailImage;
    }

}
