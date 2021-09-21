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

/* commun/menuBurger.twig */
class __TwigTemplate_a83e7a54614eecf1efacd64c03a58a846b102ccf6bbaf4e07a995ab2f822736a extends Template
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
        echo "<div class=\"leftSideMenu\">
    <section class=\"menuBurger\">
        <button id=\"btdBurger\"><i class=\"fas fa-bars\" id=\"burger\" ></i></button>
    </section>

    <div class=\"sidebar\">
        <div class=\"logo_details\">
            <a href=\"/user\">
                <i class=\"fab fa-facebook\"></i>
                <span class=\"logo_name\">Menu principal</span>
            </a>
        </div>
        <ul class=\"nav_links\">
            <li>
                <a href=\"/update-profile-user\">
                    <i class=\"fas fa-user-edit\"></i>
                    <span class=\"link_name\">Modifier Profile</span>
                </a>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"fab fa-ioxhost\"></i>
                    <span class=\"link_name\">Posts</span>
                    <i class=\"fas fa-chevron-down arrow\"></i>
                </a>
                <ul class=\"sub_menu\">
                    <li>
                        <a href=\"\"><i class=\"fas fa-align-center\"></i>Post</a>
                        <a href=\"\"><i class=\"fas fa-camera-retro\"></i>Picture</a>
                        <a href=\"\"><i class=\"fas fa-video\"></i>Movie</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"fas fa-user-friends\"></i>
                    <span class=\"link_name\">Firends</span>
                    <i class=\"fas fa-chevron-down arrow\"></i>
                </a>
                <ul class=\"sub_menu\">
                    <li>
                        <a href=\"\"><i class=\"fas fa-align-center\"></i>Liste d'amis</a>
                        <a href=\"\"><i class=\"fas fa-camera-retro\"></i>Demande d'amis</a>
                        <a href=\"\"><i class=\"fas fa-video\"></i>Autres utilisateurs</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"./messenger\">
                    <i class=\"far fa-comments\"></i>
                    <span class=\"link_name\">Messenger</span>
                </a>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"far fa-bell\"></i>
                    <span class=\"link_name\">Notification</span>
                </a>
            </li>
        </ul>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "commun/menuBurger.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"leftSideMenu\">
    <section class=\"menuBurger\">
        <button id=\"btdBurger\"><i class=\"fas fa-bars\" id=\"burger\" ></i></button>
    </section>

    <div class=\"sidebar\">
        <div class=\"logo_details\">
            <a href=\"/user\">
                <i class=\"fab fa-facebook\"></i>
                <span class=\"logo_name\">Menu principal</span>
            </a>
        </div>
        <ul class=\"nav_links\">
            <li>
                <a href=\"/update-profile-user\">
                    <i class=\"fas fa-user-edit\"></i>
                    <span class=\"link_name\">Modifier Profile</span>
                </a>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"fab fa-ioxhost\"></i>
                    <span class=\"link_name\">Posts</span>
                    <i class=\"fas fa-chevron-down arrow\"></i>
                </a>
                <ul class=\"sub_menu\">
                    <li>
                        <a href=\"\"><i class=\"fas fa-align-center\"></i>Post</a>
                        <a href=\"\"><i class=\"fas fa-camera-retro\"></i>Picture</a>
                        <a href=\"\"><i class=\"fas fa-video\"></i>Movie</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"fas fa-user-friends\"></i>
                    <span class=\"link_name\">Firends</span>
                    <i class=\"fas fa-chevron-down arrow\"></i>
                </a>
                <ul class=\"sub_menu\">
                    <li>
                        <a href=\"\"><i class=\"fas fa-align-center\"></i>Liste d'amis</a>
                        <a href=\"\"><i class=\"fas fa-camera-retro\"></i>Demande d'amis</a>
                        <a href=\"\"><i class=\"fas fa-video\"></i>Autres utilisateurs</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"./messenger\">
                    <i class=\"far fa-comments\"></i>
                    <span class=\"link_name\">Messenger</span>
                </a>
            </li>
            <li>
                <a href=\"\">
                    <i class=\"far fa-bell\"></i>
                    <span class=\"link_name\">Notification</span>
                </a>
            </li>
        </ul>
    </div>
</div>
", "commun/menuBurger.twig", "/var/www/niels/certifAfpa/src/View/commun/menuBurger.twig");
    }
}
