<?php

namespace app\tests\unit;

use app\models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
    public function testGetName()
    {
        $user = new User();
        $user->name = 'ASD123';

        $this->assertEquals('ASD123', $user->getName());
    }

    public function testGetPassword()
    {
        $user = new User();
        $user->password = 'Test1234';

        $this->assertEquals('Test1234', $user->email);
    }
}