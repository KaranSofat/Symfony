<?php

/* RAAAdminBundle:Login:login.html.twig */
class __TwigTemplate_c0b13755469a8df21bb5b3654e4e96ed8478eec386df9279498d5d2caf40f488 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("RAAAdminBundle::layout2.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'meta' => array($this, 'block_meta'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "RAAAdminBundle::layout2.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        $this->displayBlock('meta', $context, $blocks);
        // line 8
        echo "<body id=\"login\">
\t<header style=\"height:91px;\">
\t\t\t<div id=\"logo\" style=\"margin-left: 8px; height:30px;margin-top:10px;\">
\t\t\t\t<a href=\"login.html\">whitelabel</a>
\t\t\t</div>
\t\t</header>
\t\t<section id=\"content\" >
\t\t<form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_login");
        echo "\" id=\"loginform\" method=\"post\">
\t\t\t<fieldset>
\t\t\t\t<section class=\"chrome\"><label for=\"username\">Email</label>
\t\t\t\t\t<div><input type=\"text\" id=\"email\" name=\"email\" autofocus></div>
\t\t\t\t</section>
\t\t\t\t<section class=\"chrome\"><label for=\"password\">Password <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("RAAAdminBundle_forgotpassword");
        echo "\" class=\"login-window\">Forgot password?</a></label>
\t\t\t\t\t<div><input type=\"password\"  name=\"password\"></div>
\t\t\t\t\t<div  class=\"rem\"><label><input type=\"checkbox\" id=\"remember\" name=\"remember\"><label  for=\"remember\" class=\"checkbox \">remember me</label></div>
\t\t\t\t</section>
\t\t\t\t<section class=\"chrome4\">
\t\t\t\t\t<div><button class=\"fr submit\">Login</button></div>
\t\t\t\t\t";
        // line 26
        if (array_key_exists("name", $context)) {
            // line 27
            echo "    <div class=\"error\">
        ";
            // line 28
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), "html", null, true);
            echo "
    </div>
\t\t\t\t</section>
\t\t\t\t
\t\t\t</fieldset>
\t\t</form>
\t\t</section>
\t\t</body>

    ";
        }
    }

    // line 4
    public function block_meta($context, array $blocks = array())
    {
        // line 5
        echo "    <meta name=\"description\" content=\"Review An Airline is the Internets leading source for reviewing airline cheap tickets, airline tickets customer reviews and flights. Discover what other people say about their experiences with an airline and hopefully you’ll make a better choice, choosing the right cheap airline tickets.\">
    <!--<meta name=\"keywords\" content=>-->
";
    }

    public function getTemplateName()
    {
        return "RAAAdminBundle:Login:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 5,  88 => 4,  73 => 28,  70 => 27,  68 => 26,  59 => 20,  51 => 15,  42 => 8,  40 => 4,  37 => 3,  11 => 1,);
    }
}
