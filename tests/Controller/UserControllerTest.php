<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{

    public function testShowOK()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'User index');
    }

    public function testCreateOK()
    {
        $client = static::createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/new');

        $this->assertResponseIsSuccessful();

        $client->submitForm('Save', [
            'user[lastName]' => 'Marc',
            'user[firstName]' => 'André',
            'user[email]' => 'mandre@demo.com',
            'user[phoneNumber]' => '0108090503'
        ]);

        $this->assertSelectorTextContains('h1', 'User index');
    }

}