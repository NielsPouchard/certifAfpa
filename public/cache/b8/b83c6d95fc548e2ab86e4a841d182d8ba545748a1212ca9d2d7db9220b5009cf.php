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
class __TwigTemplate_26c9063ce520cb98dcfb7344104a471a097772468625d8aca9e46f13ff26bad8 extends Template
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
", "part/footer.twig", "/var/www/niels/certifAfpa/src/View/part/footer.twig");
    }
}
