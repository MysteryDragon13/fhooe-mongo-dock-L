<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* mycart.html.twig */
class __TwigTemplate_6668c6cb5f65b58ef2e01054c34a53ab extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "mycart.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "MyCart";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "    <h1>MyCart</h1>
    <div class=\"border p-3 mt-5\">
        ";
        // line 7
        yield Twig\Extension\CoreExtension::include($this->env, $context, "errors.html.twig");
        yield "
        <form method=\"post\" action=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/mycart"), "html", null, true);
        yield "\">
            <div class=\"InputCombo Grid-full\">
                <table class=\"table table-bordered\">
                    <tr>
                        <th>PID</th>
                        <th>Product_name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    ";
        // line 17
        if (array_key_exists("order_items", $context)) {
            // line 18
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["order_items"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 19
                yield "                            <tr>
                                <td>";
                // line 20
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = (($_v1 = ($context["order_items"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["key"]] ?? null) : null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["pid"] ?? null) : null), "html", null, true);
                yield "</td>
                                <td>";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v2 = (($_v3 = ($context["order_items"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[$context["key"]] ?? null) : null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["product_name"] ?? null) : null), "html", null, true);
                yield "</td>
                                <td>";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = (($_v5 = ($context["order_items"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5[$context["key"]] ?? null) : null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["price"] ?? null) : null), "html", null, true);
                yield "</td>
                                <td>
                                    <input id=\"";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v6 = (($_v7 = ($context["order_items"] ?? null)) && is_array($_v7) || $_v7 instanceof ArrayAccess ? ($_v7[$context["key"]] ?? null) : null)) && is_array($_v6) || $_v6 instanceof ArrayAccess ? ($_v6["pid"] ?? null) : null), "html", null, true);
                yield "\" type=\"number\" name=\"quantity[";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v8 = (($_v9 = ($context["order_items"] ?? null)) && is_array($_v9) || $_v9 instanceof ArrayAccess ? ($_v9[$context["key"]] ?? null) : null)) && is_array($_v8) || $_v8 instanceof ArrayAccess ? ($_v8["pid"] ?? null) : null), "html", null, true);
                yield "]\" min=\"0\" max=\"10\" value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v10 = (($_v11 = ($context["order_items"] ?? null)) && is_array($_v11) || $_v11 instanceof ArrayAccess ? ($_v11[$context["key"]] ?? null) : null)) && is_array($_v10) || $_v10 instanceof ArrayAccess ? ($_v10["quantity"] ?? null) : null), "html", null, true);
                yield "\" class=\"input_qty\"/>
                                </td>
                            </tr>
                        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 28
                yield "                            <tr>
                                <td> No Products in Cart </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "                    ";
        }
        // line 36
        yield "                </table>
            </div>
            ";
        // line 38
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["order_items"] ?? null))) {
            // line 39
            yield "                <div id=\"submitbuttons\" class=\"Grid-full\">
                    <input id=\"update\" type=\"submit\" class=\"Button\" name=\"update\" value=\"Change Quantity\" />
                    <input id=\"checkout\" type=\"submit\" class=\"Button\" name=\"checkout\" value=\"Buy now\" />
                </div>
            ";
        }
        // line 44
        yield "        </form>
    </div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mycart.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  155 => 44,  148 => 39,  146 => 38,  142 => 36,  139 => 35,  127 => 28,  114 => 24,  109 => 22,  105 => 21,  101 => 20,  98 => 19,  92 => 18,  90 => 17,  78 => 8,  74 => 7,  70 => 5,  63 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}MyCart{% endblock title %}
{% block main %}
    <h1>MyCart</h1>
    <div class=\"border p-3 mt-5\">
        {{ include('errors.html.twig') }}
        <form method=\"post\" action=\"{{ url_for(\"/mycart\") }}\">
            <div class=\"InputCombo Grid-full\">
                <table class=\"table table-bordered\">
                    <tr>
                        <th>PID</th>
                        <th>Product_name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    {% if order_items is defined %}
                        {% for key, value in order_items %}
                            <tr>
                                <td>{{ order_items[key]['pid'] }}</td>
                                <td>{{ order_items[key]['product_name'] }}</td>
                                <td>{{ order_items[key]['price'] }}</td>
                                <td>
                                    <input id=\"{{ order_items[key]['pid'] }}\" type=\"number\" name=\"quantity[{{ order_items[key]['pid'] }}]\" min=\"0\" max=\"10\" value=\"{{ order_items[key]['quantity'] }}\" class=\"input_qty\"/>
                                </td>
                            </tr>
                        {% else %}
                            <tr>
                                <td> No Products in Cart </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        {% endfor %}
                    {% endif %}
                </table>
            </div>
            {% if not(order_items is empty) %}
                <div id=\"submitbuttons\" class=\"Grid-full\">
                    <input id=\"update\" type=\"submit\" class=\"Button\" name=\"update\" value=\"Change Quantity\" />
                    <input id=\"checkout\" type=\"submit\" class=\"Button\" name=\"checkout\" value=\"Buy now\" />
                </div>
            {% endif %}
        </form>
    </div>
{% endblock main %}", "mycart.html.twig", "/var/www/html/mongoshop/views/mycart.html.twig");
    }
}
