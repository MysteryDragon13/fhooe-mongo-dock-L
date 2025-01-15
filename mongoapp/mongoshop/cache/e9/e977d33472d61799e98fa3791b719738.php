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

/* countries.html.twig */
class __TwigTemplate_7f97415dd93c6c4c06eafc9f55d39eb9 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "countries.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Country";
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
        yield "    <h1>Country Data</h1>
    <div class=\"border p-3 mt-5\">
        ";
        // line 7
        yield Twig\Extension\CoreExtension::include($this->env, $context, "errors.html.twig");
        yield "
        <form method=\"post\" action=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/createcountry"), "html", null, true);
        yield "\">
            <div class=\"mb-3\">
                <label for=\"country\" class=\"form-label\">Country Name</label>
                <input type=\"text\" class=\"form-control\" id=\"country\" name=\"country\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["country"] ?? null), "html", null, true);
        yield "\"
                       placeholder=\"country name\" aria-describedby=\"countryHelp\" autocomplete=\"country\">
                <div id=\"countryHelp\" class=\"form-text\">Please enter a country name.</div>
            </div>
            <div class=\"mb-3\">
                <label for=\"isocode\" class=\"form-label\">ISOcode</label>
                <input type=\"text\" class=\"form-control\" id=\"isocode\" name=\"isocode\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["isocode"] ?? null), "html", null, true);
        yield "\"
                       placeholder=\"isocode\" aria-describedby=\"isocodeHelp\" autocomplete=\"current-isocode\">
                <div id=\"isocodeHelp\" class=\"form-text\">Please enter an ISOcode.</div>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Add Country</button>
        </form>
    </div>
    <div class=\"border p-3 mt-5\">
    <h2>List of Countries</h2>
    <div>
        <table class=\"table table-bordered\">
            <tr>
                <th>Name</th>
                <th>ISOCode</th>
            </tr>
            ";
        // line 32
        if (array_key_exists("countries", $context)) {
            // line 33
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["countries"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 34
                yield "                    <tr>
                        <td> ";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = (($_v1 = ($context["countries"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["key"]] ?? null) : null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["country"] ?? null) : null), "html", null, true);
                yield " </td>
                        <td> ";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v2 = (($_v3 = ($context["countries"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[$context["key"]] ?? null) : null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["isocode"] ?? null) : null), "html", null, true);
                yield " </td>
                    </tr>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 39
                yield "                    <tr>
                        <td> No products found in search </td>
                        <td>&nbsp;</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "            ";
        }
        // line 45
        yield "        </table>
    </div>
    </div>

    <div class=\"border p-3 mt-5\">
        <h2>Delete Country</h2>
        <form method=\"post\" action=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/deletecountry"), "html", null, true);
        yield "\">
            <div class=\"mb-3\">
                <label for=\"countryToDelete\" class=\"form-label\">Select Country to Delete</label>
                <select class=\"form-select\" id=\"countryToDelete\" name=\"countryToDelete\" aria-describedby=\"countryDeleteHelp\">
                    ";
        // line 55
        if (array_key_exists("countries", $context)) {
            // line 56
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["countries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                // line 57
                yield "                            <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = $context["country"]) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["cid"] ?? null) : null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v5 = $context["country"]) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5["country"] ?? null) : null), "html", null, true);
                yield "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['country'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            yield "                    ";
        }
        // line 60
        yield "                </select>
                <div id=\"countryDeleteHelp\" class=\"form-text\">Please Select a Country to Delete</div>
            </div>
            <button type=\"submit\" class=\"btn btn-danger\">Delete Country</button>
        </form>
    </div>


";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "countries.html.twig";
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
        return array (  183 => 60,  180 => 59,  169 => 57,  164 => 56,  162 => 55,  155 => 51,  147 => 45,  144 => 44,  134 => 39,  126 => 36,  122 => 35,  119 => 34,  113 => 33,  111 => 32,  93 => 17,  84 => 11,  78 => 8,  74 => 7,  70 => 5,  63 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Country{% endblock title %}
{% block main %}
    <h1>Country Data</h1>
    <div class=\"border p-3 mt-5\">
        {{ include('errors.html.twig') }}
        <form method=\"post\" action=\"{{ url_for(\"/createcountry\") }}\">
            <div class=\"mb-3\">
                <label for=\"country\" class=\"form-label\">Country Name</label>
                <input type=\"text\" class=\"form-control\" id=\"country\" name=\"country\" value=\"{{ country }}\"
                       placeholder=\"country name\" aria-describedby=\"countryHelp\" autocomplete=\"country\">
                <div id=\"countryHelp\" class=\"form-text\">Please enter a country name.</div>
            </div>
            <div class=\"mb-3\">
                <label for=\"isocode\" class=\"form-label\">ISOcode</label>
                <input type=\"text\" class=\"form-control\" id=\"isocode\" name=\"isocode\" value=\"{{ isocode }}\"
                       placeholder=\"isocode\" aria-describedby=\"isocodeHelp\" autocomplete=\"current-isocode\">
                <div id=\"isocodeHelp\" class=\"form-text\">Please enter an ISOcode.</div>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Add Country</button>
        </form>
    </div>
    <div class=\"border p-3 mt-5\">
    <h2>List of Countries</h2>
    <div>
        <table class=\"table table-bordered\">
            <tr>
                <th>Name</th>
                <th>ISOCode</th>
            </tr>
            {% if countries is defined %}
                {% for key, value in countries %}
                    <tr>
                        <td> {{ countries[key]['country'] }} </td>
                        <td> {{ countries[key]['isocode'] }} </td>
                    </tr>
                {% else %}
                    <tr>
                        <td> No products found in search </td>
                        <td>&nbsp;</td>
                    </tr>
                {% endfor %}
            {% endif %}
        </table>
    </div>
    </div>

    <div class=\"border p-3 mt-5\">
        <h2>Delete Country</h2>
        <form method=\"post\" action=\"{{ url_for(\"/deletecountry\") }}\">
            <div class=\"mb-3\">
                <label for=\"countryToDelete\" class=\"form-label\">Select Country to Delete</label>
                <select class=\"form-select\" id=\"countryToDelete\" name=\"countryToDelete\" aria-describedby=\"countryDeleteHelp\">
                    {% if countries is defined %}
                        {% for country in countries %}
                            <option value=\"{{ country['cid'] }}\">{{ country['country'] }}</option>
                        {% endfor %}
                    {% endif %}
                </select>
                <div id=\"countryDeleteHelp\" class=\"form-text\">Please Select a Country to Delete</div>
            </div>
            <button type=\"submit\" class=\"btn btn-danger\">Delete Country</button>
        </form>
    </div>


{% endblock main %}", "countries.html.twig", "/var/www/html/mongoshop/views/countries.html.twig");
    }
}
