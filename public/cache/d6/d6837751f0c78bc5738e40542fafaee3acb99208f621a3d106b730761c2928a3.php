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

/* update_profile_user.twig */
class __TwigTemplate_f18142b169b794a489768d4b4f1d4a2e0ec06a81d1af8225ef05f8ef9fbf7a6b extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "update_profile_user.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"main\">
        <!-- ----- LEFT PART START (Menu Burger)-----  -->
        ";
        // line 6
        echo twig_include($this->env, $context, "commun/menuBurger.twig");
        echo "

        <!-- \tUploadInfoUser -->
        <div class=\"middleSide\">
            <section class=\"profileUpdate\">
                <p>Modifier mon profile</p>
                <form action=\"/updateProfileUser\" method=\"POST\" class=\"sectionUpdate\">
                    <input type=\"text\" name=\"name\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "nom", [], "any", false, false, false, 13), "html", null, true);
        echo "\">
                    <input type=\"text\" name=\"surname\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "surname", [], "any", false, false, false, 14), "html", null, true);
        echo "\">
                    <input type=\"text\" name=\"pseudo\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 15), "html", null, true);
        echo "\">
                    <input type=\"email\" name=\"email\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 16), "html", null, true);
        echo "\">
                    <input type=\"submit\" name=\"update\" value=\"Modifier\">
                </form>

                <!-- \tUploadPrdofilePictureUser -->
                <p>Modifier ma photo de profile</p>
                <form action=\"/upload\" method=\"POST\" enctype=\"multipart/form-data\">
                    <input type=\"file\" name=\"photo\" id=\"photo\">
                    <input type=\"submit\" name=\"upload\" value=\"Upload\">
                </form>
            </section>
        </div>
        <!-- ----- MIDDLE PART END -----  -->
    </div>
";
    }

    public function getTemplateName()
    {
        return "update_profile_user.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 16,  72 => 15,  68 => 14,  64 => 13,  54 => 6,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.twig' %}

{% block body %}
    <div class=\"main\">
        <!-- ----- LEFT PART START (Menu Burger)-----  -->
        {{ include('commun/menuBurger.twig') }}

        <!-- \tUploadInfoUser -->
        <div class=\"middleSide\">
            <section class=\"profileUpdate\">
                <p>Modifier mon profile</p>
                <form action=\"/updateProfileUser\" method=\"POST\" class=\"sectionUpdate\">
                    <input type=\"text\" name=\"name\" value=\"{{ user.nom }}\">
                    <input type=\"text\" name=\"surname\" value=\"{{ user.surname }}\">
                    <input type=\"text\" name=\"pseudo\" value=\"{{ user.pseudo }}\">
                    <input type=\"email\" name=\"email\" value=\"{{ user.email }}\">
                    <input type=\"submit\" name=\"update\" value=\"Modifier\">
                </form>

                <!-- \tUploadPrdofilePictureUser -->
                <p>Modifier ma photo de profile</p>
                <form action=\"/upload\" method=\"POST\" enctype=\"multipart/form-data\">
                    <input type=\"file\" name=\"photo\" id=\"photo\">
                    <input type=\"submit\" name=\"upload\" value=\"Upload\">
                </form>
            </section>
        </div>
        <!-- ----- MIDDLE PART END -----  -->
    </div>
{% endblock %}
", "update_profile_user.twig", "/var/www/niels/certifAfpa/src/View/update_profile_user.twig");
    }
}
