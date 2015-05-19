<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_8fed53976c995b9ff64756532f7664af extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  50 => 15,  46 => 14,  32 => 6,  26 => 3,  24 => 2,  19 => 1,  143 => 40,  133 => 31,  130 => 30,  123 => 33,  118 => 29,  115 => 28,  102 => 47,  97 => 45,  92 => 43,  88 => 41,  86 => 39,  82 => 37,  80 => 28,  77 => 27,  65 => 23,  61 => 22,  49 => 13,  37 => 7,  33 => 6,  29 => 5,  23 => 1,  140 => 39,  121 => 30,  117 => 44,  113 => 43,  109 => 5,  105 => 41,  94 => 44,  89 => 31,  85 => 29,  79 => 26,  74 => 24,  70 => 22,  68 => 24,  63 => 19,  58 => 17,  48 => 9,  45 => 12,  42 => 12,  36 => 5,  30 => 5,);
    }
}
