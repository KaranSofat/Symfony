<?php

/* ::login.html.twig */
class __TwigTemplate_f45027ace45f1c860e0b49ebe5369e0c508788f9376fab9e5ce6c613eb4f7b9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
<meta charset=\"utf-8\">
<title>Review An Airline - Admin Panel</title>
";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 50
        echo "\t\t\t\t\t\t ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 91
        echo "</head>
<body>
<script>
          \t\$(document).ready(function()
          \t{
          \t\twindow.history.forward();
          \t});
          </script>
\t\t
";
        // line 100
        $this->displayBlock('body', $context, $blocks);
        // line 103
        echo "


</body>
</html>
";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "
            <!--<link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/screen.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />--> 
     
            <!-- Google Font and style definitions -->
\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"http://fonts.googleapis.com/css?family=PT+Sans:regular,bold\">
\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/css/style.css"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/css/style1.css"), "html", null, true);
        echo "\">
\t\t\t\t
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/css/parsley/parsley.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t
\t\t\t\t\t\t<!-- include the skins (change to dark if you like) -->
\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/css/light/theme.css"), "html", null, true);
        echo "\" id=\"themestyle\">
\t\t\t\t\t\t<!-- <link rel=\"stylesheet\" href=\"css/dark/theme.css\" id=\"themestyle\"> -->
\t
\t\t\t\t\t\t<!--[if lt IE 9]>
\t\t\t\t\t\t<script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js') }}\"></script>
\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"css/ie.css\">
\t\t\t\t\t\t<![endif]-->
\t
\t\t\t\t\t\t<!-- Apple iOS and Android stuff -->
\t\t\t\t\t\t<meta name=\"apple-mobile-web-app-capable\" content=\"no\">
\t\t\t\t\t\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
\t\t\t\t\t\t<link rel=\"apple-touch-icon-precomposed\" href=\"apple-touch-icon-precomposed.png\">
\t\t\t\t\t\t\t<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
\t\t\t\t\t\t<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
\t\t\t\t\t\t<link rel=\"apple-touch-icon-precomposed\" href=\"img/icon.png\">
\t\t\t\t\t\t<link rel=\"apple-touch-startup-image\" href=\"img/startup.png\">
\t\t\t\t\t\t<meta name=\"viewport\" content=\"width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1\">
\t\t\t
\t\t\t\t\t\t<!-- Apple iOS and Android stuff - don't remove! -->
\t\t\t\t\t\t<meta name=\"viewport\" content=\"width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1\">
\t
\t\t\t\t\t\t<!-- Use Google CDN for jQuery and jQuery UI -->
\t\t\t\t\t\t\t\t\t\t<!--\t<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>
\t\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js\"></script>-->
\t
\t\t\t\t\t\t<!-- Loading JS Files this way is not recommended! Merge them but keep their order -->
\t
\t\t\t\t\t\t<!-- some basic functions -->
\t\t\t\t\t\t     
        ";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/functions.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/functions.js"), "html", null, true);
        echo "\"></script>


      
\t\t\t\t\t\t<script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/plugins.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/editor.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/calendar.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/flot.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/elfinder.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/datatables.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Alert.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Autocomplete.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Breadcrumb.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Calendar.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Chart.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Color.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Date.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Editor.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_File.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Dialog.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Fileexplorer.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Form.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Gallery.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Multiselect.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Number.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Password.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Slider.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Store.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Time.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Valid.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/wl_Widget.js"), "html", null, true);
        echo "\"></script>
\t          <script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/js/parsley/parsley-standalone.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<!-- configuration to overwrite settings -->
\t\t\t\t\t\t<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/config.js"), "html", null, true);
        echo "\"></script>
\t\t
\t\t\t\t\t\t<!-- the script which handles all the access to plugins etc... -->
\t\t\t\t\t\t<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/script.js"), "html", null, true);
        echo "\"></script>
           <!-- <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/login.js"), "html", null, true);
        echo "\"></script>-->
    ";
    }

    // line 100
    public function block_body($context, array $blocks = array())
    {
        // line 101
        echo "
";
    }

    public function getTemplateName()
    {
        return "::login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  270 => 101,  267 => 100,  261 => 89,  257 => 88,  251 => 85,  246 => 83,  242 => 82,  238 => 81,  234 => 80,  230 => 79,  226 => 78,  222 => 77,  218 => 76,  214 => 75,  210 => 74,  206 => 73,  202 => 72,  198 => 71,  194 => 70,  190 => 69,  186 => 68,  182 => 67,  178 => 66,  174 => 65,  170 => 64,  166 => 63,  162 => 62,  158 => 61,  154 => 60,  150 => 59,  146 => 58,  142 => 57,  138 => 56,  131 => 52,  126 => 51,  123 => 50,  89 => 20,  83 => 17,  79 => 16,  74 => 14,  70 => 13,  63 => 9,  58 => 6,  55 => 5,  46 => 103,  44 => 100,  33 => 91,  30 => 50,  28 => 5,  22 => 1,);
    }
}
