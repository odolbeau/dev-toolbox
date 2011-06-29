<?php

namespace Olitaz\ToolboxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ToolsControllerTest extends WebTestCase
{

    public function testRegex()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/regex');

        $this->assertTrue($crawler->filter('h1:contains("Regex tester")')->count() > 0);
    }

}