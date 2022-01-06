<?php

namespace EditorJs\Tests;

use DOMDocument;
use EditorJS\Parser\Twig\TwigRenderer;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

class TwigRendererTest extends TestCase
{

    /**
     * @var false|string
     */
    protected $seed;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        $this->seed = file_get_contents(__DIR__ . '/data/seed.json');

        parent::__construct($name, $data, $dataName);
    }

    public function testSimpleBlockRendering(): void
    {
        $env = new Environment(new \Twig\Loader\FilesystemLoader(__DIR__ . '/data'));
        $renderer = new TwigRenderer($env, 'template.html.twig');

        $result = $renderer->render([['type' => 'delimiter']]);
        $this->assertEquals('<hr>', $result);
    }

    public function testUnknownBlockReturnsEmptyString(): void
    {
        $env = new Environment(new \Twig\Loader\FilesystemLoader(__DIR__ . '/data'));
        $renderer = new TwigRenderer($env, 'template.html.twig');

        $result = $renderer->render([['type' => 'not-existing']]);
        $this->assertEmpty($result);
    }

    public function testFullRendering(): void
    {
        $env = new Environment(new \Twig\Loader\FilesystemLoader(__DIR__ . '/data'));
        $renderer = new TwigRenderer($env, 'template.html.twig');

        $seed = json_decode($this->seed?$this->seed:'', true);
        $this->assertNotEmpty($seed);
        $this->assertIsArray($seed);
        $this->assertArrayHasKey('blocks', $seed);
        $result = $renderer->render($seed['blocks']);

        $expectedDom = new DomDocument();
        $expectedDom->loadHTMLFile(__DIR__ . '/data/seed.html');
        $expectedDom->preserveWhiteSpace = false;

        $actualDom = new DomDocument();
        $actualDom->loadHTML($result);
        $actualDom->preserveWhiteSpace = false;

        $this->assertInstanceOf(\DOMElement::class, $expectedDom->documentElement);
        $this->assertInstanceOf(\DOMElement::class, $actualDom->documentElement);
        $this->assertEqualXMLStructure($expectedDom->documentElement, $actualDom->documentElement, true);
    }
}
