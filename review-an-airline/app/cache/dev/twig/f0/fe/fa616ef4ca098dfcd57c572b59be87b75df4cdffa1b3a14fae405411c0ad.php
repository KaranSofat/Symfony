<?php

/* RAAAdminBundle:Airline:airline.html.twig */
class __TwigTemplate_f0fefa616ef4ca098dfcd57c572b59be87b75df4cdffa1b3a14fae405411c0ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("RAAAdminBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
            'title' => array($this, 'block_title'),
            'meta' => array($this, 'block_meta'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "RAAAdminBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        echo "\t<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>
\t<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js\"></script>
\t<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/functions.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/functions.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/plugins.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/editor.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/calendar.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/flot.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/elfinder.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/datatables.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Alert.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Autocomplete.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Breadcrumb.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Calendar.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Chart.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Color.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Date.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Editor.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_File.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Dialog.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Fileexplorer.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Form.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Gallery.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Multiselect.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Number.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Password.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Slider.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Store.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Time.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Valid.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/wl_Widget.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/config.js"), "html", null, true);
        echo "\"></script>
\t<script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("themes/backend/js/script.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
 function confirm_Delete(e) {
    var answer = confirm(\"Are you sure you want to delete this record?\")
    if (!answer){
        e.preventDefault();
        return false;
    }
}
 </script>
\t<script>
\t\$(document).ready(function(){
\t\t\$(\"#colAction\").removeClass(\"sorting\");
\t});
\t</script>
\t<script type=\"text/javascript\">\t\t
\tfunction addNewPlan()
\t{
\t\twindow.location.href = '";
        // line 53
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_addAirline");
        echo "';
\t}
\t</script>
\t<script>
\tfunction importUsers()
\t{
\t\twindow.location.href = '";
        // line 59
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_importRealtors");
        echo "';
\t}
\t\tfunction importUsers1()
\t{
\t\twindow.location.href = '";
        // line 63
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_getCsv");
        echo "';
\t}
\t\t\tfunction getPdf()
\t{
\t\twindow.location.href = '";
        // line 67
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_getPdf");
        echo "';
\t}
\t</script>
";
    }

    // line 71
    public function block_body($context, array $blocks = array())
    {
        // line 72
        echo "<title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
        // line 73
        $this->displayBlock('meta', $context, $blocks);
        // line 77
        echo "\t<section id=\"content\">
\t<div class=\"g12\">
\t\t<h1>Manage Airlines</h1>
\t\t<button class=\"btnAddNew\" onclick=\"javascript:addNewPlan();\">Add New</button>
\t\t<button class=\"btnAddNew\" onclick=\"javascript:importUsers();\">Import Airlines</button>
\t\t<button class=\"btnAddNew\" onclick=\"javascript:importUsers1();\">Export Airlines in Csv</button>
\t\t<!--<button class=\"btnAddNew\" onclick=\"javascript:getPdf();\">Export Realtors in Pdf</button>-->
\t\t<div class=\"dataTables_wrapper\">
\t\t\t<table class=\"datatable\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"sorting col-2\" style=\"min-width:3%;width: 58px;\" rowspan=\"1\" colspan=\"1\"> # &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\"sorting col-3\" style=\"width: 109px;\" rowspan=\"1\" colspan=\"1\">Name &nbsp;&nbsp;</th>
\t\t\t\t\t<!--<th class=\"sorting col-3\" style=\"width: 104px;\" rowspan=\"1\" colspan=\"1\">LastName &nbsp;&nbsp;</th>-->
\t\t\t\t\t<th class=\"sorting col-2\" rowspan=\"1\" colspan=\"1\">Tagline &nbsp;&nbsp;</th>
\t\t\t\t<!--\t<th class=\"sorting col-2\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">History &nbsp;&nbsp;</th>-->
\t\t\t\t\t<!--<th class=\"sorting col-6\" style=\"width: 240px;\" rowspan=\"1\" colspan=\"1\">Address &nbsp;&nbsp;</th>-->
\t\t\t\t\t<!--<th class=\"sorting col-2\" style=\"width: 77px;\" rowspan=\"1\" colspan=\"1\">City &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\"sorting col-3\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">State &nbsp;&nbsp;</th>-->
\t\t\t\t\t<!--<th class=\"sorting col-2\" rowspan=\"1\" colspan=\"1\" style=\"width: 180px;\">Country</th>-->
\t\t\t\t\t<!--<th class=\"sorting col-3\" style=\"width: 48px;\" rowspan=\"1\" colspan=\"1\">Zip &nbsp;&nbsp;</th>-->
\t\t\t\t\t<th class=\"col-2\" id=\"colAction\"style=\"width:100px;\" rowspan=\"1\" colspan=\"1\"><label class=\"lblAction\">Action &nbsp;&nbsp;</label></th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>\t\t
\t\t\t\t";
        // line 102
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["airlines"]) ? $context["airlines"] : $this->getContext($context, "airlines")));
        foreach ($context['_seq'] as $context["_key"] => $context["airline"]) {
            // line 103
            echo "\t\t\t\t<tr class=\"gradeA odd\">
\t\t\t\t\t<td class=\"\">";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "id", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t<td class=\"txtleft\">";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "business_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t<td class=\"txtleft\">";
            // line 106
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "airline_tagline", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t<!--<td class=\"txtleft\">";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "phone", array()), "html", null, true);
            echo "</td>-->
\t\t\t\t\t<!--<td class=\"txtleft\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "address", array()), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "address2", array()), "html", null, true);
            echo "</td>-->
\t\t\t\t\t<!--<td class=\"txtleft\">";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "city_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t<td class=\"txtleft\">";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "state_name", array()), "html", null, true);
            echo "</td>-->
\t\t\t\t\t<!--<td class=\"txtleft\">";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "country", array()), "html", null, true);
            echo "</td>-->
\t\t\t\t\t<!--<td class=\"txtleft\">";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute($context["airline"], "pincode", array()), "html", null, true);
            echo "</td>-->
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<td><a href=\"";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("RAAAdminBundle_airlineupdate", array("id" => $this->getAttribute($context["airline"], "id", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/images/pencil.png"), "html", null, true);
            echo "\" title=\"Edit\"></image></a><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("RAAAdminBundle_airlinedelete", array("id" => $this->getAttribute($context["airline"], "id", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/images/cross.png"), "html", null, true);
            echo "\" onclick=\"confirm_Delete(event);\" title=\"Delete\"></image>\t</a>
\t\t\t\t
\t\t\t\t\t<a href=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("RAAAdminBundle_viewAirline", array("id" => $this->getAttribute($context["airline"], "id", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/images/preview.png"), "html", null, true);
            echo "\"title=\"View\"></image>\t</a>\t</td>\t\t\t



\t\t\t\t\t\t</tr>\t\t
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['airline'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "\t\t\t\t</table>
\t\t\t\t\t</tbody>
\t\t\t</div>\t
";
    }

    // line 72
    public function block_title($context, array $blocks = array())
    {
        echo "Manage Airline | Admin";
    }

    // line 73
    public function block_meta($context, array $blocks = array())
    {
        // line 74
        echo "    <meta name=\"description\" content=\"Review An Airline is the Internets leading source for reviewing airline cheap tickets, airline tickets customer reviews and flights. Discover what other people say about their experiences with an airline and hopefully you’ll make a better choice, choosing the right cheap airline tickets.\">
    <!--<meta name=\"keywords\" content=>-->
";
    }

    public function getTemplateName()
    {
        return "RAAAdminBundle:Airline:airline.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  344 => 74,  341 => 73,  335 => 72,  328 => 124,  314 => 118,  303 => 116,  296 => 112,  292 => 111,  288 => 110,  284 => 109,  278 => 108,  274 => 107,  270 => 106,  266 => 105,  262 => 104,  259 => 103,  255 => 102,  228 => 77,  226 => 73,  221 => 72,  218 => 71,  210 => 67,  203 => 63,  196 => 59,  187 => 53,  166 => 35,  162 => 34,  158 => 33,  154 => 32,  150 => 31,  146 => 30,  142 => 29,  138 => 28,  134 => 27,  130 => 26,  126 => 25,  122 => 24,  118 => 23,  114 => 22,  110 => 21,  106 => 20,  102 => 19,  98 => 18,  94 => 17,  90 => 16,  86 => 15,  82 => 14,  78 => 13,  74 => 12,  70 => 11,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  46 => 5,  42 => 3,  39 => 2,  11 => 1,);
    }
}
