<?php

namespace robotdance;

use robotdance\Sprite;

class SpriteTest extends \PHPUnit_Framework_TestCase
{
    protected $spr;

    public function setUp()
    {
        $this->spr = new Sprite('./sprites/blinking_programmer.spr');
    }

    public function testConstructor()
    {
        $this->assertEquals(24,   $this->spr->meta['w']);
        $this->assertEquals(11,   $this->spr->meta['h']);
        $this->assertEquals(200,  $this->spr->meta['f']);
        $this->assertEquals(2000, $this->spr->meta['t']);
        $this->assertEquals(2,    count($this->spr->frames));
    }

    public function testTotalAnimationTime()
    {
        $start = time();
        $this->spr->animate();
        $end = time();
        $time = ($end - $start);
        $this->assertEquals(2, $time);
    }
}
