<h1 align="center">davidgorges/editorjs-twig-renderer</h1>

<p align="center">
    <strong>Render EditorJS output via Twig</strong>
</p>

<!--
TODO: Make sure the following URLs are correct and working for your project.
      Then, remove these comments to display the badges, giving users a quick
      overview of your package.

<p align="center">
    <a href="https://github.com/davidgorges/editorjstwigrenderer"><img src="https://img.shields.io/badge/source-davidgorges/editorjs--twig--renderer-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/davidgorges/editorjs-twig-renderer"><img src="https://img.shields.io/packagist/v/davidgorges/editorjs-twig-renderer.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/davidgorges/editorjs-twig-renderer.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/davidgorges/editorjstwigrenderer/blob/main/LICENSE"><img src="https://img.shields.io/packagist/l/davidgorges/editorjs-twig-renderer.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/davidgorges/editorjstwigrenderer/actions/workflows/continuous-integration.yml"><img src="https://img.shields.io/github/workflow/status/davidgorges/editorjstwigrenderer/build/main?style=flat-square&logo=github" alt="Build Status"></a>
    <a href="https://codecov.io/gh/davidgorges/editorjstwigrenderer"><img src="https://img.shields.io/codecov/c/gh/davidgorges/editorjstwigrenderer?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/davidgorges/editorjstwigrenderer"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Fdavidgorges%2Feditorjstwigrenderer%2Fcoverage" alt="Psalm Type Coverage"></a>
</p>
-->


## Work in Progress

This library is currently in **work in progress** and not ready for use.


## Installation

Install this package as a dependency using [Composer](https://getcomposer.org).

``` bash
composer require davidgorges/editorjs-twig-renderer
```

## Usage



``` php
use EditorJs\Parser;


$json = '{
    "blocks": [
        {
            "type": "header",
            "data": {
                "text": "Hello World",
                "level": 1
            }
        }
    ]
}';

$twigRenderer = new TwigRenderer('/path-to/editorjs.html.twig');
$parser = new Parser($twigRenderer);
$html = $parser->parse($json);

echo $html;
// Output: <h1>Hello World</h1>

```

### Customize
You can provider your own Twig template to render the output.
``` twig
{% block header %}
<h{{ level }}>{{ text }}</h{{ level }}>
{% endblock %}
```

See `tests/data/editorjs.html.twig` for more examples of how to customize the output.


## Contributing

Contributions are welcome! To contribute, please familiarize yourself with
[CONTRIBUTING.md](CONTRIBUTING.md).







## Copyright and License

The davidgorges/editorjs-twig-renderer library is copyright © [David Gorges](https://www.dekkode.com)
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.


