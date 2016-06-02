<?php
/**
 * Utility for console output
 * @author Marcos Menegazzo
 */

namespace robotdance;

use robotdance\Arguments;

/**
 * Utility for console output
 * @see https://wiki.archlinux.org/index.php/Bash/Prompt_customization
 *
 * Black 0;30
 * Blue 0;34
 * Green 0;32
 * Cyan 0;36
 * Red 0;31
 * Purple 0;35
 * Brown 0;33
 * Light Gray 0;37
 * Dark Gray 1;30
 * Light Blue 1;34
 * Light Green 1;32
 * Light Cyan 1;36
 * Light Red 1;31
 * Light Purple 1;35
 * Yellow 1;33
 * White 1;37
 */
class Console
{
    //TODO refactor
    const OFF          = 0;
    const BOLD         = 1;
    const ITALIC       = 3;
    const BLACK        = 30;
    const BLUE         = 34;
    const GREEN        = 32;
    const CYAN         = 36;
    const RED          = 31;
    const PURPLE       = 35;
    const BROWN        = 33;
    const YELLOW       = 33;
    const GRAY         = 37;
    const DARK_GRAY    = 30;
    const LIGHT_BLUE   = 34;
    const LIGHT_GREEN  = 32;
    const LIGHT_CYAN   = 36;
    const LIGHT_RED    = 31;
    const LIGHT_PURPLE = 35;

    protected static $ansi = [
        "off"        => "\e[0m",
        "bold"       => "\e[1m",
        "italic"     => "\e[3m",
        "underline"  => "\e[4m",
        "blink"      => "\e[5m",
        "inverse"    => "\e[7m",
        "hidden"     => "\e[8m",
        "black"      => "\e[30m",
        "red"        => "\e[31m",
        "green"      => "\e[32m",
        "yellow"     => "\e[33m",
        "blue"       => "\e[34m",
        "magenta"    => "\e[35m",
        "cyan"       => "\e[36m",
        "white"      => "\e[37m",
        "black_bg"   => "\e[40m",
        "red_bg"     => "\e[41m",
        "green_bg"   => "\e[42m",
        "yellow_bg"  => "\e[43m",
        "blue_bg"    => "\e[44m",
        "magenta_bg" => "\e[45m",
        "cyan_bg"    => "\e[46m",
        "white_bg"   => "\e[47m"
    ];

    /**
     * Apply styles to output
     * @param $str String to be styled
     * @param $styles String or Array<String> with styles to apply
     * Examples:
     *
     * Console::apply('Bob is going home', 'italic');
     * Console::apply('Bob is going home', ['italic', 'red']);
     *
     * @return String styled
     */
    public static function apply($str, $styles)
    {
        Arguments::validate($str, ['string']);
        Arguments::validate($styles, ['string', 'array']);

        if(!is_array($styles)) { $styles = [$styles]; }
        foreach($styles as $style) {
            $str = self::_apply($str, $style);
        }
        return $str;
    }

    /**
     * @see apply
     */
    private static function _apply($str, $style)
    {
        return self::$ansi[$style] . $str . self::$ansi['off'];
    }

    /**
     * Turns output green
     * @param $str String
     * @return String Color string
     */
    public static function green($str)
    {
        return self::apply($str, 'green');
    }

    /**
     * Turns output blue
     * @param $str String
     * @return String Color string
     */
    public static function blue($str)
    {
        return self::apply($str, 'blue');
    }

    /**
     * Turns output yellow
     * @param $str String
     * @return String Color string
     */
    public static function yellow($str)
    {
        return self::apply($str, 'yellow');
    }

    /**
     * Turns output red
     * @param $str String
     * @return String Color string
     */
    public static function red($str)
    {
        return self::apply($str, 'red');
    }

    /**
     * Turns output bold
     * @param $str String
     * @return String Bold string
     */
    public static function bold($str)
    {
        return self::apply($str, 'bold');
    }

    /**
     * Turns output italic
     * @param $str String
     * @return $tring italic string
     */
    public static function italic($str)
    {
        return self::apply($str, 'italic');
    }

    /**
     * Inserts N spaces to the left of a string
     * @param $str String
     * @param $spaces Number of spaces to insert
     * @param $level Indentation level (1, 2, 3, ...)
     * @return String with N spaces inserted
     */
    public static function indent($str, $spaces = 4, $level = 1){
        return str_repeat(" ", $spaces * $level)
            . str_replace("\n", "\n" . str_repeat(" ", $spaces * $level), $str);
    }
}
