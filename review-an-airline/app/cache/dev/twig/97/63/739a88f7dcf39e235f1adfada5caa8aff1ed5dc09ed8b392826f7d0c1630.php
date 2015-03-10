<?php

/* ::base.html.twig */
class __TwigTemplate_9763739a88f7dcf39e235f1adfada5caa8aff1ed5dc09ed8b392826f7d0c1630 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
<title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 50
        echo "\t\t\t\t\t\t ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 92
        echo "</head>
<body>
<div id=\"pageoptions\">
\t\t\t<ul>
\t\t\t\t<li><a href=\"";
        // line 96
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_logout");
        echo "\">Logout</a></li>
\t\t\t\t<!--<li><a href=\"\" id=\"wl_config\">My Profile</a></li>
\t\t\t\t<li><a href=\"\" class=\"login-window\"\">Change Password</a></li>-->
\t\t\t</ul>
\t\t\t</div>
<header style=\"height:91px;\">
\t\t<div id=\"logo\" style=\"margin-left: 8px; height:30px;margin-top:10px;\">
\t\t\t<a href=\"test.html\">Logo Here</a>
\t\t</div>
\t</header>\t

<nav>
<script>
          \t\$(document).ready(function()
          \t{
          \t\twindow.history.forward();
          \t});
          \t\$('.back').click(function(){
            parent.history.back();
            return false;
        });
          </script>
          
\t<script>
\$(document).ready(function(){

updateCities('AK');
\t\t
\t\t\$(\"#state\").change(function(){\t
               var id=\$(this).val();
             updateCities(id);  

        });\t
});

function updateCities(id)
{
 
                //alert(id);              \t
               \t
               \t\$.ajax({
               \turl : '";
        // line 137
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_getCities", array("stateCode" => "+id+"));
        echo "',
                type:'POST',
                data:'stateCode='+id,
                dataType:'html',   
                success:function(data){
                    //var category_product = \$(data).find('.city').html();
                    \$('#city').html(data);

                }
            });


}
\t\t
</script>\t
\t\t\t <script>
         \t\t\$(document).ready(function()
         \t\t{
         \t\t\t\t\$(\".active\").removeClass(\"active\");
         \t\t\t\tvar url = window.location.href;
         \t\t\t\tif( url.indexOf('/dashboard') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Dashboard\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('/airlines') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Realtors\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('/category') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Categories\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('/plan') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Plans\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\t\t\tif( url.indexOf('/claim') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#request\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\t\t\tif( url.indexOf('/propertyListing') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#property\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\t\t\t\t\t\t\tif( url.indexOf('/cms') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#cms\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\tif( url.indexOf('/advertiesment') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#adv\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\t\tif( url.indexOf('/reviewer') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#rev\").addClass(\"active\");
 \t\t\t\t\t\t\t\t\tif( url.indexOf('/manageReviews') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#manRev\").addClass(\"active\");
 \t\t\t\t\t\t\t\t/*if( url.indexOf('dashboard') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Dashboard\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('dashboard') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Dashboard\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('dashboard') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Dashboard\").addClass(\"active\");
 \t\t\t\t\t\t\t\tif( url.indexOf('dashboard') > -1 )
 \t\t\t\t\t\t\t\t\t\$(\"#Dashboard\").addClass(\"active\");*/
 \t\t\t\t\t\t});
 </script>
\t\t\t<ul id=\"nav\">
\t\t\t\t<li class=\"i_house\"><a id=\"Dashboard\" href=\"";
        // line 188
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_dashboard");
        echo "\"><span>Dashboard</span></a></li>
        <li class=\"i_book\"><a  id=\"Realtors\" href=\"";
        // line 189
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_airline");
        echo "\"><span>Airlines</span></a></li>
        <li class=\"i_user_comment\"><a id=\"rev\" href=\"";
        // line 190
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_reviewer");
        echo "\"><span>Reviewers</span></a></li>               
        <li class=\"i_dropbox\"><a id=\"manRev\" href=\"";
        // line 191
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_manageReviews");
        echo "\"><span>Reviews</span></a></li>
       <!-- <li class=\"i_graph\"><a id=\"Plans\" href=\"";
        // line 192
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_plan");
        echo "\"><span>Plans</span></a></li>-->
        <!--<li class=\"i_graph2\"><a id=\"Reviews\" href=\"";
        // line 193
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_plan");
        echo "\"><span>Reviews</span></a></li>
      \t<li class=\"i_graph1\"><a id=\"Reports\" href=\"";
        // line 194
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_plan");
        echo "\"><span>Reports</span></a></li>
       \t<li class=\"i_graph3\"><a id=\"Advertiesments\" href=\"";
        // line 195
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_plan");
        echo "\"><span>Advertiesments</span></a></li>
        <li class=\"i_graph4\"><a id=\"CMS\" href=\"";
        // line 196
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_plan");
        echo "\"><span>CMS</span></a></li>
        <li class=\"i_image\"><a id=\"request\" href=\"";
        // line 197
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_request");
        echo "\"><span>Requests</span></a></li> -->
    <!-- <li class=\"i_image\"><a id=\"request\" href=\"";
        // line 198
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_claim");
        echo "\"><span>Claims</span></a></li>-->
       <!-- <li class=\"i_frames\"><a id=\"property\" href=\"";
        // line 199
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_property");
        echo "\"><span>Airline Flights</span></a></li>-->
        <li class=\"i_image_2\"><a id=\"adv\" href=\"";
        // line 200
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_advertiesment");
        echo "\"><span>Advertiesments</span></a></li>   
              <li class=\"i_wordpress\"><a id=\"cms\" href=\"";
        // line 201
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_manageCms");
        echo "\"><span>CMS</span></a></li>                 
       </ul> 
       
</nav>
\t\t
";
        // line 206
        $this->displayBlock('body', $context, $blocks);
        // line 209
        echo "


</body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo " Review An Airline | Admin";
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
       <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/frontend/css/parsley.css"), "html", null, true);
        echo "\">
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/functions.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/functions.js"), "html", null, true);
        echo "\"></script>


      \t\t\t\t\t\t<script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/frontend/js/parsley/parsley-standalone.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/plugins.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/editor.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/calendar.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/flot.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/elfinder.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/datatables.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Alert.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Autocomplete.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Breadcrumb.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Calendar.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Chart.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Color.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Date.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Editor.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_File.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Dialog.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Fileexplorer.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Form.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Gallery.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Multiselect.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Number.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Password.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Slider.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Store.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Time.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Valid.js"), "html", null, true);
        echo "\"></script>
\t\t\t\t\t\t<script src=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Widget.js"), "html", null, true);
        echo "\"></script>
\t          <!--<script src=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/loginlogin/js/parsley/parsley-standalone.min.js"), "html", null, true);
        echo "\"></script>-->
\t\t\t\t\t\t<!-- configuration to overwrite settings -->
\t\t\t\t\t\t<script src=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/config.js"), "html", null, true);
        echo "\"></script>
\t\t
\t\t\t\t\t\t<!-- the script which handles all the access to plugins etc... -->
\t\t\t\t\t\t<script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/script.js"), "html", null, true);
        echo "\"></script>
           <!-- <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/admin/js/login.js"), "html", null, true);
        echo "\"></script>-->
         
    ";
    }

    // line 206
    public function block_body($context, array $blocks = array())
    {
        // line 207
        echo "
";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  437 => 207,  434 => 206,  427 => 89,  423 => 88,  417 => 85,  412 => 83,  408 => 82,  404 => 81,  400 => 80,  396 => 79,  392 => 78,  388 => 77,  384 => 76,  380 => 75,  376 => 74,  372 => 73,  368 => 72,  364 => 71,  360 => 70,  356 => 69,  352 => 68,  348 => 67,  344 => 66,  340 => 65,  336 => 64,  332 => 63,  328 => 62,  324 => 61,  320 => 60,  316 => 59,  312 => 58,  308 => 57,  304 => 56,  300 => 55,  294 => 52,  289 => 51,  286 => 50,  252 => 20,  246 => 17,  242 => 16,  237 => 14,  233 => 13,  226 => 9,  221 => 6,  218 => 5,  212 => 4,  203 => 209,  201 => 206,  193 => 201,  189 => 200,  185 => 199,  181 => 198,  177 => 197,  173 => 196,  169 => 195,  165 => 194,  161 => 193,  157 => 192,  153 => 191,  149 => 190,  145 => 189,  141 => 188,  87 => 137,  43 => 96,  37 => 92,  34 => 50,  32 => 5,  28 => 4,  23 => 1,);
    }
}
