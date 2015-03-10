<?php

/* RAAAdminBundle:Dashboard:ratingDetail.html.twig */
class __TwigTemplate_51b6b230ada6eebf086ba844b52b3f0abd5334c9fbc20a364f1fd16030147209 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!-- 
 * Markup for jQuery Reveal Plugin 1.0
 * www.ZURB.com/playground
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 -->
\t<head>
\t";
        // line 10
        $this->displayBlock('javascripts', $context, $blocks);
        // line 75
        echo "\t ";
        $this->displayBlock('body', $context, $blocks);
        // line 95
        echo "</html>
";
    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        // line 11
        echo "\t\t
\t\t
\t\t<!-- Attach our CSS -->

\t  \t
\t\t<!-- Attach necessary scripts -->
\t\t<!-- <script type=\"text/javascript\" src=\"jquery-1.4.4.min.js\"></script> -->
\t\t\t\t\t\t\t<!--<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.4.4.min.js\"></script>-->
\t\t         <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/js/jquery.reveal.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/js/jssor.utils.js"), "html", null, true);
        echo "\"></script>
\t\t<style type=\"text/css\">
\t\t
\t\t
\t\t\t.reveal-modal-bg { 
\t\tposition: fixed; 
\t\theight: 100%;
\t\twidth: 100%;
\t\tbackground: #000;
\t\tbackground: rgba(0,0,0,.8);
\t\tz-index: 100;
\t\tdisplay: none;
\t\ttop: 0;
\t\tleft: 0; 
\t\t}
\t
\t.reveal-modal {
\t\tvisibility: hidden;
\t\ttop: 100px; 
\t\tleft: 50%;
\t\tmargin-left: -300px;
\t\twidth: 520px;
\t\tbackground: #eee url(modal-gloss.png) no-repeat -200px -80px;
\t\tposition: absolute;
\t\tz-index: 101;
\t\tpadding: 30px 40px 34px;
\t\t-moz-border-radius: 5px;
\t\t-webkit-border-radius: 5px;
\t\tborder-radius: 5px;
\t\t-moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
\t\t-webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
\t\t-box-shadow: 0 0 10px rgba(0,0,0,.4);
\t\t}
\t\t
\t.reveal-modal.small \t\t{ width: 200px; margin-left: -140px;}
\t.reveal-modal.medium \t\t{ width: 400px; margin-left: -240px;}
\t.reveal-modal.large \t\t{ width: 600px; margin-left: -340px;}
\t.reveal-modal.xlarge \t\t{ width: 800px; margin-left: -440px;}
\t
\t.reveal-modal .close-reveal-modal {
\t\tfont-size: 22px;
\t\tline-height: .5;
\t\tposition: absolute;
\t\ttop: 8px;
\t\tright: 11px;
\t\tcolor: #aaa;
\t\ttext-shadow: 0 -1px 1px rbga(0,0,0,.6);
\t\tfont-weight: bold;
\t\tcursor: pointer;
\t\t} 
\t\t
\t\t</style>
\t\t
\t</head>
\t ";
    }

    // line 75
    public function block_body($context, array $blocks = array())
    {
        // line 76
        echo "\t<body>

\t\t<a href=\"#\" class=\"big-link\" data-reveal-id=\"myModal\">
\t\t
\t\t</a>\t
\t\t
\t

\t\t<div id=\"myModal\" class=\"reveal-modal\">
\t\t\t
\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t<a class=\"close-reveal-modal\">&#215;</a>
\t\t\t
\t\t\t<div id=\"cross\"></div>
\t\t</div>
\t\t\t
\t</body>
\t";
    }

    public function getTemplateName()
    {
        return "RAAAdminBundle:Dashboard:ratingDetail.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  121 => 76,  118 => 75,  59 => 20,  55 => 19,  45 => 11,  42 => 10,  37 => 95,  34 => 75,  32 => 10,  21 => 1,);
    }
}
