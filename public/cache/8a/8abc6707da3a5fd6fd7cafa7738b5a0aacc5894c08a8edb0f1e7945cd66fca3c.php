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

/* part/footer.twig */
class __TwigTemplate_8024eb3f73ecbcd67a0381a8e3b97c9bb10a5b4d311cd114330cb5ebb4735988 extends Template
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
        echo "<!--<script src=\"/js/menuBurger.js\"></script>-->
<script type=\"application/javascript\" src=\"/build/app.js\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "part/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!--<script src=\"/js/menuBurger.js\"></script>-->
<script type=\"application/javascript\" src=\"/build/app.js\"></script>
</body>
</html>
", "part/footer.twig", "C:\\wamp64\\www\\AFPA\\Fakebook\\certifAfpa-Louis\\src\\View\\part\\footer.twig");
    }
}
