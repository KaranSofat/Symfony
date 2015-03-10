<?php

/* RAAAdminBundle:Dashboard:dashboard.html.twig */
class __TwigTemplate_072ce422af546f7b926f089f0a3caf02443671a65503946295c6f5e15df50aa7 extends Twig_Template
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

\t<script>

function detailReview(id)
{
var a = \$(\"#detailId\").val(id);
 \t
 \t
 \t\$.ajax({
               \turl : '";
        // line 14
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_ratingCompleteDetail", array("id" => "+a+"));
        echo "',
                type:'POST',
                data:'id='+id,
                dataType:'html',   
                success:function(data){
                    //var category_product = \$(data).find('.city').html();
                    \$('#city').html(data);
//alert(data);
document.getElementById(\"cross\").innerHTML=data;
                }
            });


}
</script>
";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
        // line 31
        echo "\t\t<section id=\"content\">\t\t
\t\t\t<div class=\"g12 nodrop\">
\t\t\t\t<h1>Dashboard</h1>
\t\t\t\t<p>This is a quick overview of some features</p>
\t\t\t</div>\t\t\t
\t\t\t<div class=\"g6 widgets\" style=\"width:32%;\">
\t\t\t\t<div class=\"widget number-widget\" id=\"widget_number\">
\t\t\t\t\t<h3 class=\"handle\">Overview</h3>
\t\t\t\t\t<div>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 41
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_airline");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dashboardDetails"]) ? $context["dashboardDetails"] : $this->getContext($context, "dashboardDetails")), "totalairlines", array()), "html", null, true);
        echo "</span> Airlines</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_reviewer");
        echo "\"><span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dashboardDetails"]) ? $context["dashboardDetails"] : $this->getContext($context, "dashboardDetails")), "totalReviewers", array()), "html", null, true);
        echo "</span> Reviewers</a></li>
\t\t\t\t\t\t
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t

\t\t\t</div>
\t\t\t
\t\t\t\t<div class=\"g6 widgets\" style=\"width:64%;\">\t\t
\t\t\t<div class=\"widget\" id=\"widget_ajax\" data-load=\"widget-content.php\" data-reload=\"10\" data-remove-content=\"false\">
\t\t\t\t\t<h3 class=\"handle\">Latest Users</h3>
\t\t\t\t\t<div>
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<table class=\"datatable\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t
\t\t\t\t\t<th class=\" col-2\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Name &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\" col-2\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Email &nbsp;&nbsp;</th>
\t\t\t
\t\t\t\t\t<th class=\" col-2\" style=\"width: 77px;\" rowspan=\"1\" colspan=\"1\">Phone &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\" col-3\" style=\"width: 75px; min-width:3%;\" rowspan=\"1\" colspan=\"1\">Reviews &nbsp;&nbsp;</th>
\t\t\t\t\t
\t\t
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t\t
\t\t\t\t
\t\t\t\t<tbody>\t\t
\t\t\t";
        // line 75
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["latestUsers"]) ? $context["latestUsers"] : $this->getContext($context, "latestUsers")));
        foreach ($context['_seq'] as $context["_key"] => $context["latestUser"]) {
            // line 76
            echo "\t\t\t\t<tr class=\"gradeA odd\">
\t\t\t\t
\t\t\t\t<td class=\"txtleft\">";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "first_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "email", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "phone", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td class=\"txtleft\"><a href=\"";
            // line 82
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("RAAAdminBundle_showRev", array("id" => (($this->getAttribute($context["latestUser"], "reviewer_id", array())) ? ($this->getAttribute($context["latestUser"], "reviewer_id", array())) : (0)))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "totalReviews", array()), "html", null, true);
            echo "</a></td>


\t\t\t\t\t\t</tr>\t\t
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latestUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "\t\t\t\t</table>
\t\t\t\t\t</tbody>
\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t\t<div class=\"g6 widgets\" style=\"width:97%;\">
\t\t\t<div class=\"widget\" id=\"widget_charts\" data-icon=\"graph\">
\t\t\t\t<h3 class=\"handle\">Latest Reviewes</h3>
\t\t\t\t<div>
\t\t\t\t
\t\t\t\t<table class=\"datatable\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t
\t\t\t\t\t<th class=\"col-3\" style=\"width: 109px;min-width:5%;\" rowspan=\"1\" colspan=\"1\">User &nbsp;&nbsp;</th>
\t\t\t\t\t<!--<th class=\"sorting col-3\" style=\"width: 104px;\" rowspan=\"1\" colspan=\"1\">LastName &nbsp;&nbsp;</th>-->
\t\t\t\t\t<th class=\" col-2\" rowspan=\"1\" colspan=\"1\">Airline &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\" col-2\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Title &nbsp;&nbsp;</th>
\t\t\t\t\t<!--<th class=\"sorting col-6\" style=\"width: 240px;\" rowspan=\"1\" colspan=\"1\">Address &nbsp;&nbsp;</th>-->
\t\t\t\t\t<th class=\" col-2\" style=\"width: 77px;min-width:20%;\" rowspan=\"1\" colspan=\"1\">Review &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\" col-3\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Date &nbsp;&nbsp;</th>
\t\t\t\t\t<!--<th class=\"sorting col-2\" rowspan=\"1\" colspan=\"1\" style=\"width: 180px;\">Country</th>-->
\t\t\t\t\t<!--<th class=\"sorting col-3\" style=\"width: 48px;\" rowspan=\"1\" colspan=\"1\">Zip &nbsp;&nbsp;</th>-->
\t\t
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t\t
\t\t\t\t
\t\t\t\t<tbody>\t\t
\t\t\t";
        // line 129
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["latestReview"]) ? $context["latestReview"] : $this->getContext($context, "latestReview")));
        foreach ($context['_seq'] as $context["_key"] => $context["latestReviews"]) {
            // line 130
            echo "\t\t\t\t<tr class=\"gradeA odd\">
\t\t\t\t
\t\t\t\t<td class=\"txtleft\">";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestReviews"], "first_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"txtleft\">";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestReviews"], "business_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestReviews"], "headline", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 136
            if ((twig_length_filter($this->env, $this->getAttribute($context["latestReviews"], "description", array())) > 40)) {
                echo " ";
                echo twig_escape_filter($this->env, (twig_slice($this->env, $this->getAttribute($context["latestReviews"], "description", array()), 0, 40) . "..."), "html", null, true);
                echo "<a data-toggle=\"modal\" role=\"button\" href=\"#\" id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["latestReviews"], "id", array()), "html", null, true);
                echo "\" onclick=\"detailReview(this.id);\" class=\"big-link\" data-reveal-id=\"myModal\">Readmore</a>";
            } else {
                echo twig_escape_filter($this->env, $this->getAttribute($context["latestReviews"], "description", array()), "html", null, true);
            }
            echo "</td>
\t\t\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 137
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["latestReviews"], "creation_timestamp", array()), "F j, Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t


\t\t\t\t\t\t</tr>\t\t
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latestReviews'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 143
        echo "\t\t\t\t</table>
\t\t\t\t\t</tbody>
\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<!--<div class=\"widget\" id=\"widget_ajax\" data-load=\"widget-content.php\" data-reload=\"10\" data-remove-content=\"false\">
\t\t\t\t\t<h3 class=\"handle\">Latest Users</h3>
\t\t\t\t\t<div>
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t<table class=\"datatable\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t
\t\t\t
\t\t\t\t\t<th class=\"sorting col-2\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Email &nbsp;&nbsp;</th>
\t\t\t
\t\t\t\t\t<th class=\"sorting col-2\" style=\"width: 77px;\" rowspan=\"1\" colspan=\"1\">Phone &nbsp;&nbsp;</th>
\t\t\t\t\t<th class=\"sorting col-3\" style=\"width: 75px;\" rowspan=\"1\" colspan=\"1\">Reviewes &nbsp;&nbsp;</th>
\t\t\t\t\t
\t\t
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t\t
\t\t\t\t
\t\t\t\t<tbody>\t\t
\t\t\t";
        // line 171
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["latestUsers"]) ? $context["latestUsers"] : $this->getContext($context, "latestUsers")));
        foreach ($context['_seq'] as $context["_key"] => $context["latestUser"]) {
            // line 172
            echo "\t\t\t\t<tr class=\"gradeA odd\">
\t\t\t\t
\t\t\t\t<td class=\"txtleft\">";
            // line 174
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "first_name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 175
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "email", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 177
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "phone", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td class=\"txtleft\">";
            // line 178
            echo twig_escape_filter($this->env, $this->getAttribute($context["latestUser"], "totalReviews", array()), "html", null, true);
            echo "</td>


\t\t\t\t\t\t</tr>\t\t
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['latestUser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 183
        echo "\t\t\t\t</table>
\t\t\t\t\t</tbody>
\t\t\t</div>\t
\t\t\t\t</div>-->
\t\t\t\t
\t\t\t\t
\t\t\t\t
\t\t\t\t

\t\t\t\t</div>
\t\t\t
\t\t\t ";
        // line 194
        $this->env->loadTemplate("RAAAdminBundle:Dashboard:ratingDetail.html.twig")->display($context);
        // line 195
        echo "\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
";
    }

    public function getTemplateName()
    {
        return "RAAAdminBundle:Dashboard:dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  332 => 195,  330 => 194,  317 => 183,  306 => 178,  302 => 177,  297 => 175,  293 => 174,  289 => 172,  285 => 171,  255 => 143,  243 => 137,  231 => 136,  226 => 134,  222 => 133,  218 => 132,  214 => 130,  210 => 129,  166 => 87,  153 => 82,  149 => 81,  144 => 79,  140 => 78,  136 => 76,  132 => 75,  94 => 42,  88 => 41,  76 => 31,  73 => 30,  53 => 14,  40 => 3,  37 => 2,  11 => 1,);
    }
}
