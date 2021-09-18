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

/* messenger.twig */
class __TwigTemplate_0b40931a0c11de11ed46d931650499561e372c66348db8414350dca56e1a1181 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "messenger.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    ";
        echo twig_include($this->env, $context, "commun/menuBurger.twig");
        echo "
    <div class=\"rightSide\">
        <section class=\"chat\">
            <div class=\"messages\">
                <div class=\"message\">
                    <span class=\"date\"></span>
                    <span class=\"pseudo\"></span>
                    <span class=\"content\"></span>
                </div>
            </div>
            <div class=\"user_input\">
                <form action=\"/messenger?task=write\" method=\"POST\" id=\"chat\">
                    <input type=\"text\" name=\"pseudo\" id=\"pseudo\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 16), "html", null, true);
        echo "\" >
                    <input type=\"text\" name=\"content\" id=\"content\" placeholder=\"Votre message\">
                    <button type=\"submit\" name=\"go\" value=\"write\" class=\"go\">Send</button>
                </form>
            </div>
        </section>
    </div>
";
    }

    public function getTemplateName()
    {
        return "messenger.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 16,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.twig' %}

{% block body %}
    {{ include('commun/menuBurger.twig') }}
    <div class=\"rightSide\">
        <section class=\"chat\">
            <div class=\"messages\">
                <div class=\"message\">
                    <span class=\"date\"></span>
                    <span class=\"pseudo\"></span>
                    <span class=\"content\"></span>
                </div>
            </div>
            <div class=\"user_input\">
                <form action=\"/messenger?task=write\" method=\"POST\" id=\"chat\">
                    <input type=\"text\" name=\"pseudo\" id=\"pseudo\" value=\"{{ user.pseudo }}\" >
                    <input type=\"text\" name=\"content\" id=\"content\" placeholder=\"Votre message\">
                    <button type=\"submit\" name=\"go\" value=\"write\" class=\"go\">Send</button>
                </form>
            </div>
        </section>
    </div>
{% endblock %}
", "messenger.twig", "/var/www/niels/certifAfpa/src/View/messenger.twig");
    }
}
