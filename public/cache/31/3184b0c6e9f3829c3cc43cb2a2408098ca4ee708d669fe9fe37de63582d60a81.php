<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout.twig */
class __TwigTemplate_7883fa193bc13e1980e3342b6c47e18b5bfd182f660172b2984bdc7ddc909db5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <link rel=\"stylesheet\" href=\"/build/app.css\"/>
    <meta charset=\"UTF-8\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    <title>Accueil</title>
</head>
<body>
";
        // line 11
        echo twig_include($this->env, $context, "part/header.twig");
        echo "

";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "
";
        // line 16
        echo twig_include($this->env, $context, "part/footer.twig");
        echo "
";
    }

    // line 13
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 13,  60 => 16,  57 => 15,  55 => 13,  50 => 11,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <link rel=\"stylesheet\" href=\"/build/app.css\"/>
    <meta charset=\"UTF-8\"/>
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
    <title>Accueil</title>
</head>
<body>
{{ include('part/header.twig') }}

{% block body %}
{% endblock %}

{{ include('part/footer.twig') }}
", "layout.twig", "C:\\wamp64\\www\\AFPA\\Fakebook\\certifAfpa-Louis\\src\\View\\layout.twig");
    }
}
