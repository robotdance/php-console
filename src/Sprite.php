<?php
/**
 * Utility for console animations
 * @author Marcos Menegazzo
 */
namespace robotdance;

use robotdance\Console;

/**
 * Represents an Text Sprite File
 *
 * General Structure
 * Each sprite file has a JSON descriptor on its first line. Example:
 * { "w":24, "h":11, "f":50; "t":2000 }
 *
 * Attributes:
 * w: frame width
 * h: frame height
 * f: time per frame in milliseconds
 * t: total animation time in milliseconds
 */
class Sprite {

    public $meta;
    public $frames = [];

    /**
     * Accepts a ASCII sprite file for animation
     * Information about the file structure can be found at the class docs
     */
    function __construct($spriteFile)
    {
        $file = file($spriteFile);
        $this->meta = json_decode($file[0], true);
        $totalFrames = round(strlen($file[1]) / $this->meta['w']);
        for($i = 1; $i < count($file); $i++) {
            for($j = 0; $j < $totalFrames; $j++) {
                if(!array_key_exists($j, $this->frames)) {
                    $this->frames[$j] = '';
                }
                $this->frames[$j] .= substr($file[$i],
                                            $this->meta['w'] * $j,
                                            $this->meta['w']) . "\n";
            }
        }
    }

    /**
     * Sleeps in milliseconds
     * @param $milliseconds Time in milliseconds
     */
    private function sleepMilli($milliseconds) {
        $time = $milliseconds * 1000;
        usleep($time);
    }

    /**
     * Displays animation on screen
     */
    public function animate()
    {
        for($time = 0; $time <= $this->meta['t']; $time += $this->meta['f']) {
            foreach($this->frames as $frame) {
                fwrite(STDOUT, $frame);
                $this->sleepMilli($this->meta['f']);
                Console::moveCursorRel(-$this->meta['w'], -$this->meta['h']);
                $time += $this->meta['f']; // necessary, dont mess
            }
        }
        Console::moveCursorRel($this->meta['w'], $this->meta['h']);
        fwrite(STDOUT, "\n");
    }
}
?>
