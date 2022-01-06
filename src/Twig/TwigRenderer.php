<?php

namespace EditorJS\Parser\Twig;

use EditorJS\Parser\RendererInterface;
use Twig\Environment;

class TwigRenderer implements RendererInterface
{
    private Environment $environment;
    private string $templateFile;

    /**
     * @param Environment $environment
     * @param string $templateFile
     */
    public function __construct(Environment $environment, string $templateFile)
    {
        $this->environment = $environment;
        $this->templateFile = $templateFile;
    }

    /**
     * @throws \Throwable
     */
    public function render(array $blocks): string
    {
        $template = $this->environment->load($this->templateFile);
        $result = '';
        foreach ($blocks as $block) {
            if (!$template->hasBlock($block['type'])) {
                @trigger_error(sprintf('Block type "%s" is not defined in template "%s".', $block['type'], $this->templateFile), E_USER_WARNING);
                continue;
            }
            $result .= trim($template->renderBlock($block['type'], $block['data']??[]));
        }

        return $result;
    }
}
