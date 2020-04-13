<?php

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        $this->user = new User();
        $this->user->setLastname('Pierre');
        $this->user->setFirstname('Aymeric');
        $this->user->setEmail('paymeric@demo.com');
        $this->user->setPhoneNumber('0102030405');
    }

    public function tearDown()
    {
        unset($this->user);
    }

    public function testIsUserNameValidOK()
    {
        $this->assertTrue($this->user->isUserNameValid());
    }

    public function testIsEmptyUserNameValidKO()
    {
        $this->user->setFirstName('');
        $this->assertFalse($this->user->isUserNameValid());
    }

    public function testIsTooLongUserNameValidKO()
    {
        $this->user->setLastName('lfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilflfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfnaprjtuilfn');
        $this->assertFalse($this->user->isUserNameValid());
    }

    public function testIsUserMailValidOK()
    {
        $this->assertTrue($this->user->isUserEmailValid());
    }

    public function testIsNotUserEmailFormatValidKO()
    {
        $this->user->setEmail('email');
        $this->assertFalse($this->user->isUserEmailValid());
    }

    public function testInvalidIsContactPhoneNumberValidOK()
    {
        $this->assertTrue($this->user->isUserPhoneNumberValid());
    }

    public function testInvalidIsContactPhoneNumberValidKO()
    {
        $this->user->setPhoneNumber('telephone');
        $this->assertFalse($this->user->isUserPhoneNumberValid());
    }

}