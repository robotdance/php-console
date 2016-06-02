<?php

namespace robotdance;

use robotdance\Console;

class ConsoleTest extends \PHPUnit_Framework_TestCase
{
    public function testApply()
    {
        Console::apply('text', 'red');
        $this->assertAnsiEnclosing(Console::apply('text', 'red'), Console::RED);
    }

    public function testRed()
    {
        $this->assertAnsiEnclosing(Console::red('text'), Console::RED);
    }

    public function testGreen()
    {
        $this->assertAnsiEnclosing(Console::green('text'), Console::GREEN);
    }

    public function testBlue()
    {
        $this->assertAnsiEnclosing(Console::blue('text'), Console::BLUE);
    }

    public function testYellow()
    {
        $this->assertAnsiEnclosing(Console::yellow('text'), Console::YELLOW);
    }

    public function testItalic()
    {
        $this->assertAnsiEnclosing(Console::italic('text'), Console::ITALIC);
    }

    public function testBold()
    {
        $this->assertAnsiEnclosing(Console::bold('text'), Console::BOLD);
    }

    public function testBoldAndBlue()
    {
        $this->assertAnsiEnclosing(Console::apply('text', ['blue', 'bold']), [Console::BOLD, Console::BLUE]);
    }

    public function testIndent()
    {
        $this->assertEquals(strlen(Console::indent("")), 4);
    }

    public function assertAnsiEnclosing($string, $codes)
    {
        echo $string . "\n";
        if(!is_array($codes)) {
            $codes = [$codes];
        }
        foreach($codes as $code) {
            $this->assertTrue(strpos($string, "$code") > 0, "Codigo da cor nao corresponde ao esperado");
        }
        $this->assertTrue(strpos($string, '0m') >= 0, "Não encontrado codigo para encerrar a formatacao.");
    }

}
