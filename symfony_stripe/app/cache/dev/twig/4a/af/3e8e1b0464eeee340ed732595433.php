<?php

/* AcmeTestBundle:Default:index.html.twig */
class __TwigTemplate_4aaf3e8e1b0464eeee340ed732595433 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeTestBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeTestBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<h3>";
        echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
        echo "</h3>

<form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dashboard"), "html", null, true);
        echo "\" method=\"post\">
  <input type=\"hidden\" name=\"test\" value=\"test\"/>
  <script src=\"https://checkout.stripe.com/v2/checkout.js\" class=\"stripe-button\"
          data-key=\"pk_test_ur0ebwOGBrsNzQrpdCNENIu4\"
          data-data-amount=\"1900\" 
          data-data-description=\"One year's subscription\"
          data-address='true'
          data-name='Test'
          data-description='Test Transaction'
          data-panel-label='Checkout'
          ></script>
</form>
";
    }

    public function getTemplateName()
    {
        return "AcmeTestBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  31 => 4,  28 => 3,);
    }
}
