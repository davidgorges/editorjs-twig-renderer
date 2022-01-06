<?php

namespace EditorJS\Parser;

use EditorJS\Parser\Exception\ParseException;

class Parser
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }


    /**
     * @throws ParseException
     */
    public function parse(string $json): string
    {
        $data = json_decode($json, true);

        if (!is_array($data) || !isset($data['blocks'])) {
            throw new ParseException('Invalid JSON');
        }

        assert(is_array($data['blocks']));
        $blocks = [];
        foreach ($data['blocks'] as $block) {
           assert(is_string($data['blocks']['type']));
           assert(is_array($data['blocks']['data']));
           $blocks[] = $block;

        }

        return $this->renderer->render($blocks);
    }
}
