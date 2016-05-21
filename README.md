TaiwanNewsParser
===

[![Build Status](https://travis-ci.org/wsmwason/taiwan-news-parser.svg)](https://travis-ci.org/wsmwason/taiwan-news-parser)
[![Latest Stable Version](https://poser.pugx.org/wsmwason/taiwan-news-parser/v/stable)](https://packagist.org/packages/wsmwason/taiwan-news-parser)
[![Total Downloads](https://poser.pugx.org/wsmwason/taiwan-news-parser/downloads)](https://packagist.org/packages/wsmwason/taiwan-news-parser)
[![License](https://poser.pugx.org/wsmwason/taiwan-news-parser/license)](https://packagist.org/packages/wsmwason/taiwan-news-parser)

台灣各新聞網站新聞解析器 PHP 版本

### 關於此程式

主要方便程式解析特定新聞網址的結構化資訊。提供下列欄位的解析：

 * 標題
 * 來源網址
 * 記者
 * 內文
 * 發布時間
 * 縮圖
 * 標籤
 * 新聞出產者

### Requirements

 * PHP>=5.4

### 安裝

    composer require wsmwason/taiwan-news-parser

### 使用方式

```php
use wsmwason\TaiwanNewsParser\TaiwanNewsParser;
use wsmwason\TaiwanNewsParser\NewsEntry;

$url = 'http://www.appledaily.com.tw/realtimenews/article/animal/20160518/864733/';
$parser = new TaiwanNewsParser();
$newsEntry = $parser->parseUrl($url);
```

可以取得 `wsmwason\TaiwanNewsParser\NewsEntry`

```php
// 取得來源網址
$newsEntry->getUrl();

// 取得新聞出產者
$newsEntry->getCompanyName();

// 取得新聞標題
$newsEntry->getTitle();

// 取得新聞內文
$newsEntry->getContent();

// 取得記者名稱
$newsEntry->getReporterName();

// 取得新聞發布時間
$newsEntry->getPublishTime();

// 取得新聞標籤
$newsEntry->getTags();

// 取得新聞縮圖
$newsEntry->getThumbnailImage();
```

### 支援的新聞網站列表

 * 蘋果日報
 * TVBS

### 貢獻

歡迎提交 pull request 修正 issue 或新增其他支援的新聞網站。

### 執行測試

每個新聞網站的 Parser 都提供三個不同的新聞作為基礎測試。

    vendor/bin/phpunit

### License

The MIT License (MIT)