<?php

namespace wsmwason\TaiwanNewsParser;

/**
 * Parser Interface
 */
interface IParser {

    /**
     * Get parser support domain
     */
    public static function getDomain();

    /**
     * Set parser url
     *
     * @param string $url
     */
    public function setUrl($url = '');

    /**
     * Parse news contents
     */
    public function parse();

}
