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

    public function testXmlIndent()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/xml-indent');

        $this->assertTrue($crawler->filter('h1:contains("XML Indent")')->count() > 0);
    }

}
