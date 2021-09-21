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

/* user.twig */
class __TwigTemplate_56b04969a0398ae3231ad526bffe25d6f0901ec9d75db33f2066a796bacc7cdc extends Template
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
        $this->parent = $this->loadTemplate("layout.twig", "user.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div class=\"main\">
        ";
        // line 5
        echo twig_include($this->env, $context, "commun/menuBurger.twig");
        echo "
        ";
        // line 6
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 6), "get", [0 => "user"], "method", false, false, false, 6);
        // line 7
        echo "        <div class=\"middleSide\">
            <!-- \tPost -->
            <section>
                <div class=\"postHeader\">
                    <div class=\"postMain\">
                        <form action=\"\" method=\"POST\">
                            <img src=\"<?= \$_SESSION['user']->photo ?>\" alt=\"\" style=\"width: 10%;\">
                            <input type=\"submit\" name=\"submitPost\" class=\"send\" value=\"Send\">
                            <input type=\"text\" name=\"postContent\" class=\"post\" placeholder=\"What's on your mind, ";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 15), "html", null, true);
        echo " ?\">
                        </form>
                    </div>
                    <p>File d'actualités</p>
                    <!-- \tContentPost -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"posted\">
                                <div class=\"post\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentPictures -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedPictures\">
                                <div class=\"postpicture\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentMovies -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedMovies\">
                                <div class=\"postMovie\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentComments -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedComments\">
                                <div class=\"postComment\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "user.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 15,  59 => 7,  57 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.twig' %}

{% block body %}
    <div class=\"main\">
        {{ include('commun/menuBurger.twig') }}
        {% set user = app.session.get('user') %}
        <div class=\"middleSide\">
            <!-- \tPost -->
            <section>
                <div class=\"postHeader\">
                    <div class=\"postMain\">
                        <form action=\"\" method=\"POST\">
                            <img src=\"<?= \$_SESSION['user']->photo ?>\" alt=\"\" style=\"width: 10%;\">
                            <input type=\"submit\" name=\"submitPost\" class=\"send\" value=\"Send\">
                            <input type=\"text\" name=\"postContent\" class=\"post\" placeholder=\"What's on your mind, {{ user.pseudo }} ?\">
                        </form>
                    </div>
                    <p>File d'actualités</p>
                    <!-- \tContentPost -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"posted\">
                                <div class=\"post\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentPictures -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedPictures\">
                                <div class=\"postpicture\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentMovies -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedMovies\">
                                <div class=\"postMovie\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- \tContentComments -->
                    <section>
                        <div class=\"actuality\">
                            <div class=\"postedComments\">
                                <div class=\"postComment\">
                                    <span class=\"date\"></span>
                                    <span class=\"pseudo\"></span>
                                    <span class=\"content\"></span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
{% endblock %}
", "user.twig", "/var/www/niels/certifAfpa/src/View/user.twig");
    }
}
