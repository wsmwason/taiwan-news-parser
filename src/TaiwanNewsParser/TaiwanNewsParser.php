<?php

namespace wsmwason\TaiwanNewsParser;

class TaiwanNewsParser {

    private $parser = [];

    public function __construct()
    {
        // 找出支援的 Parser
        $parserPath = dirname(__FILE__) . '/Parser';
        foreach (scandir($parserPath) as $name) {
            if ($name=='.' || $name=='..') {
                continue;
            }
            $className = 'wsmwason\\TaiwanNewsParser\\Parser\\' . str_replace('.php', '', $name);
            $domain = $className::getDomain();
            $this->parser[$domain] = $className;
        }
    }

    /**
     * 解析網址
     *
     * @param string $url
     * @return \wsmwason\TaiwanNewsParser\NewsEntry
     */
    public function parseUrl($url)
    {
        $parserInstance = $this->getParserInstance($url);
        if (!$parserInstance) {
            throw new \Exception('This url is not support');
        }
        $parserInstance->setUrl($url);
        return $parserInstance->parse();
    }

    /**
     * 取得 Parser Instance
     *
     * @param string $url
     * @return \wsmwason\TaiwanNewsParser\IParser
     */
    private function getParserInstance($url)
    {
        $urlInfo = parse_url($url);
        foreach ($this->parser as $domain => $className) {
            if (strpos($urlInfo['host'], $domain)!==false) {
                return new $className;
            }
        }
    }

}
