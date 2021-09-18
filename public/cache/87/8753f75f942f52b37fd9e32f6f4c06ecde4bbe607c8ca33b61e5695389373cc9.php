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

/* part/header.twig */
class __TwigTemplate_89b8710a4ac9ce862de9385af07efe20210c86d628a9ef0cdb75bda0623d80b3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<header>
    <div class=\"";
        // line 2
        if ((0 !== twig_compare(null, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 2)))) {
            echo "navigation";
        } else {
            echo "connection";
        }
        echo "\">
        <div class=\"logo_fk\">
            <img src=\"https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png\" height=\"50\" alt=\"\">
            <span>Fakebook</span>
        </div>

        ";
        // line 8
        if (array_key_exists("user", $context)) {
            // line 9
            echo "
            <div class=\"bar_search\">
                <form action=\"/search-bar\" method=\"GET\">
                    <input type=\"search\" name=\"searchBar\" placeholder=\"Chercher un ami\" >
                    <input type=\"submit\" placeholder=\"Chercher\" class=\"search\" value=\"search\">
                </form>

                ";
            // line 16
            if (array_key_exists("searchBar", $context)) {
                // line 17
                echo "                    <div class=\"searchResults\">
                        <ul>
                            ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["results"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                    // line 20
                    echo "                            <li> ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "surname", [], "any", false, false, false, 20), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 20), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 20), "html", null, true);
                    echo "
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 22
                echo "                        </ul>
                    </div>
                ";
            }
            // line 25
            echo "
            </div>
            <div class=\"pseudoUser\">
                ";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "pseudo", [], "any", false, false, false, 28), "html", null, true);
            echo "
                <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "photo", [], "any", false, false, false, 29), "html", null, true);
            echo "\" alt=\"\">
            </div>
            <a href=\"/logout\"><button class=\"logout\">Déconnexion</button></a>

        ";
        } else {
            // line 34
            echo "
            <div class=\"login\">
                <form action=\"/login\" method=\"POST\">
                    <input type=\"email\" name=\"email\" placeholder=\"email*\">
                    <input type=\"password\" name=\"mdp\" placeholder=\"password*\">
                    <input type=\"submit\" name=\"connexion\" placeholder=\"Connexion\" id=\"connexion\">
                </form>

                <div class=\"forget_password\">
                    <a href=\"/forgotPassword\">Information de compte oublié ?</a>
                </div>
            </div>

        ";
        }
        // line 48
        echo "    </div>
</header>
";
    }

    public function getTemplateName()
    {
        return "part/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 48,  109 => 34,  101 => 29,  97 => 28,  92 => 25,  87 => 22,  74 => 20,  70 => 19,  66 => 17,  64 => 16,  55 => 9,  53 => 8,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header>
    <div class=\"{% if null != user.pseudo %}navigation{% else %}connection{% endif %}\">
        <div class=\"logo_fk\">
            <img src=\"https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png\" height=\"50\" alt=\"\">
            <span>Fakebook</span>
        </div>

        {% if user is defined %}

            <div class=\"bar_search\">
                <form action=\"/search-bar\" method=\"GET\">
                    <input type=\"search\" name=\"searchBar\" placeholder=\"Chercher un ami\" >
                    <input type=\"submit\" placeholder=\"Chercher\" class=\"search\" value=\"search\">
                </form>

                {% if searchBar is defined %}
                    <div class=\"searchResults\">
                        <ul>
                            {% for result in results %}
                            <li> {{ user.surname }} {{ user.name }} {{ user.pseudo }}
                                {% endfor %}
                        </ul>
                    </div>
                {% endif %}

            </div>
            <div class=\"pseudoUser\">
                {{ user.pseudo }}
                <img src=\"{{ user.photo }}\" alt=\"\">
            </div>
            <a href=\"/logout\"><button class=\"logout\">Déconnexion</button></a>

        {% else %}

            <div class=\"login\">
                <form action=\"/login\" method=\"POST\">
                    <input type=\"email\" name=\"email\" placeholder=\"email*\">
                    <input type=\"password\" name=\"mdp\" placeholder=\"password*\">
                    <input type=\"submit\" name=\"connexion\" placeholder=\"Connexion\" id=\"connexion\">
                </form>

                <div class=\"forget_password\">
                    <a href=\"/forgotPassword\">Information de compte oublié ?</a>
                </div>
            </div>

        {% endif %}
    </div>
</header>
", "part/header.twig", "/var/www/niels/certifAfpa/src/View/part/header.twig");
    }
}
