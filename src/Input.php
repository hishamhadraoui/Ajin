<?php

namespace Ajin;

/**
 * This file is part of the Ajin Components.
 *
 * @author Hisham Hadraoui <hichamhadraoui.hh@gmail.com>
 */
class Input
{
    /**
     * Checking if there's any kind of POST method going on.
     *
     * @return bool
     */
    public static function isPosting()
    {
        return (!empty($_POST)) ? true : false;
    }

    /**
     * Checking if there's any kind of GET method going on.
     *
     * @return bool
     */
    public static function isGetting()
    {
        return (!empty($_GET)) ? true : false;
    }

    /**
     * Getting a clean[safe] value of the key from the POST superglobal.
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get($key)
    {
        if (self::isGetting() !== true or empty(self::clean($_GET[$key]))) {
            return '';
        }

        return self::clean($_GET[$key]);
    }

    /**
     * Getting a clean[safe] value of the key from the POST superglobal.
     *
     * @param string $key
     *
     * @return [type]
     */
    public static function post($key)
    {
        if (self::isPosting() !== true or empty(self::clean($_POST[$key]))) {
            return '';
        }

        return self::clean($_POST[$key]);
    }

    /**
     * Cleaning the input.
     *
     * @param mixed $input
     *
     * @return string
     */
    private static function clean($input)
    {
        return htmlspecialchars(trim($input));
    }
}
