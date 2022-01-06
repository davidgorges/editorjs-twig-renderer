<?php

namespace EditorJS\Parser;

interface RendererInterface
{

    /**
     * @param array<int, array{'type': string, 'data'?: array}> $blocks
     * @return string
     */
    public function render(array $blocks): string;
}
