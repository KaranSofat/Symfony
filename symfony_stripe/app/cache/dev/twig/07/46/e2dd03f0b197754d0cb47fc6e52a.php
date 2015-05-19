<?php

/* AcmeTestBundle::layout.html.twig */
class __TwigTemplate_0746e2dd03f0b197754d0cb47fc6e52a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" sizes=\"16x16\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" />
        
    </head>
    <body>
        <div id=\"symfony-wrapper\">
            <div id=\"symfony-header\">
                <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/images/logo.gif"), "html", null, true);
        echo "\" alt=\"Symfony logo\" />
                </a>
                <form id=\"symfony-search\" method=\"GET\" action=\"http://symfony.com/search\">
                    <label for=\"symfony-search-field\"><span>Search on Symfony Website</span></label>
                    <input name=\"q\" id=\"symfony-search-field\" type=\"search\" placeholder=\"Search on Symfony website\" class=\"medium_txt\" />
                    <input type=\"submit\" class=\"symfony-button-grey\" value=\"OK\" />
                </form>
            </div>

            ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "                <div class=\"flash-message\">
                    <em>Notice</em>: ";
            // line 25
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 28
        echo "
            ";
        // line 29
        $this->displayBlock('content_header', $context, $blocks);
        // line 38
        echo "
            <div class=\"symfony-content\">
                ";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "            </div>

            ";
        // line 44
        if (array_key_exists("code", $context)) {
            // line 45
            echo "                <h2>Code behind this page</h2>
                <div class=\"symfony-content\">";
            // line 46
            echo (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"));
            echo "</div>
            ";
        }
        // line 48
        echo "        </div>
    </body>
</html>

";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 29
    public function block_content_header($context, array $blocks = array())
    {
        // line 30
        echo "                <ul id=\"menu\">
                    ";
        // line 31
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 34
        echo "                </ul>

                <div style=\"clear: both\"></div>
            ";
    }

    // line 31
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 32
        echo "                        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo"), "html", null, true);
        echo "\">Demo Home</a></li>
                    ";
    }

    // line 40
    public function block_content($context, array $blocks = array())
    {
        // line 41
        echo "                ";
    }

    public function getTemplateName()
    {
        return "AcmeTestBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 41,  142 => 40,  135 => 32,  132 => 31,  125 => 34,  123 => 31,  120 => 30,  117 => 29,  111 => 5,  103 => 48,  98 => 46,  95 => 45,  93 => 44,  89 => 42,  87 => 40,  83 => 38,  81 => 29,  78 => 28,  69 => 25,  66 => 24,  62 => 23,  50 => 14,  46 => 13,  33 => 6,  29 => 5,  23 => 1,  37 => 7,  31 => 4,  28 => 3,);
    }
}
