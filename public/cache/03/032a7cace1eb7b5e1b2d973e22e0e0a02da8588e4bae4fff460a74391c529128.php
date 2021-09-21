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

/* home.twig */
class __TwigTemplate_d702feb80402543fab8b45a3a49b3c7dcad6e8c8dd5ebd2b4af6d0ba343defe6 extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"main\">
        <div class=\"register\">
            <div class=\"connected_people\">
                <p>Avec ";
        // line 7
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo ", partagez et restez en contact avec votre entourage.</p>
                <img src=\"https://pngimage.net/wp-content/uploads/2018/05/connecting-people-png-8.png\" alt=\"\">
            </div>

            <div class=\"inscritpion\">
                <h1>Inscription</h1>
                <p>C'est gratuit (et ça le restera toujours)</p>
                <form action=\"/register\" method=\"POST\">
                    <input type=\"text\" name=\"name\" placeholder=\"prénom*\" autocomplete=\"\">
                    <input type=\"text\" name=\"surname\" placeholder=\"Nom*\" autocomplete=\"\">
                    <input type=\"email\" name=\"email\" placeholder=\"email*\" autocomplete=\"\">
                    <input type=\"password\" name=\"mdp\" placeholder=\"Mot de passe*\">
                    <input type=\"password\" name=\"confirmMdp\" placeholder=\"Confirmation mot de passe*\">
                    <input type=\"text\" name=\"pseudo\" placeholder=\"pseudo*\" autocomplete=\"\">
                    <input type=\"submit\" name=\"submit\" placeholder=\"Inscription\" id=\"inscription\">
                </form>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 7,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout.twig\" %}

{% block body %}
    <div class=\"main\">
        <div class=\"register\">
            <div class=\"connected_people\">
                <p>Avec {{ name }}, partagez et restez en contact avec votre entourage.</p>
                <img src=\"https://pngimage.net/wp-content/uploads/2018/05/connecting-people-png-8.png\" alt=\"\">
            </div>

            <div class=\"inscritpion\">
                <h1>Inscription</h1>
                <p>C'est gratuit (et ça le restera toujours)</p>
                <form action=\"/register\" method=\"POST\">
                    <input type=\"text\" name=\"name\" placeholder=\"prénom*\" autocomplete=\"\">
                    <input type=\"text\" name=\"surname\" placeholder=\"Nom*\" autocomplete=\"\">
                    <input type=\"email\" name=\"email\" placeholder=\"email*\" autocomplete=\"\">
                    <input type=\"password\" name=\"mdp\" placeholder=\"Mot de passe*\">
                    <input type=\"password\" name=\"confirmMdp\" placeholder=\"Confirmation mot de passe*\">
                    <input type=\"text\" name=\"pseudo\" placeholder=\"pseudo*\" autocomplete=\"\">
                    <input type=\"submit\" name=\"submit\" placeholder=\"Inscription\" id=\"inscription\">
                </form>
            </div>
        </div>
    </div>
{% endblock %}
", "home.twig", "C:\\wamp64\\www\\AFPA\\Fakebook\\certifAfpa-Louis\\src\\View\\home.twig");
    }
}
