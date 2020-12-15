<?php

class DockerTest extends \PHPUnit\Framework\TestCase
{
    public function testString()
    {
        $name = 'Andrew';

        $this->assertIsString($name);
    }
}