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

/* mongocrud.html.twig */
class __TwigTemplate_fbe19b87305ccbe8d5b1b7abf6010836 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "mongocrud.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "CRUD Example";
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
        yield "    <h1>CRUD Example</h1>
    <div class=\"border p-3 mt-5\">
        ";
        // line 7
        yield Twig\Extension\CoreExtension::include($this->env, $context, "errors.html.twig");
        yield "
        <form method=\"post\" action=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor(($context["route"] ?? null)), "html", null, true);
        yield "\">
            <div class=\"mb-3\">
                <label for=\"email\" class=\"form-label\">Email address</label>
                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["email"] ?? null), "html", null, true);
        yield "\"
                       placeholder=\"you@example.com\" aria-describedby=\"emailHelp\" autocomplete=\"email\" required>
                <div id=\"emailHelp\" class=\"form-text\">Please enter the email address you registered with.</div>
            </div>
            <div class=\"mb-3\">
                <label for=\"name\" class=\"form-label\">Your Name</label>
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
        yield "\"
                       placeholder=\"Your Name\" aria-describedby=\"nameHelp\">
                <div id=\"nameHelp\" class=\"form-text\">Please enter your name.</div>
            </div>
            ";
        // line 21
        if (array_key_exists("uid", $context)) {
            // line 22
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["uid"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 23
                yield "                    <button type=\"submit\" class=\"btn btn-primary\" name=\"uid[";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html", null, true);
                yield "]\">Update</button>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "            ";
        } else {
            // line 26
            yield "                <button type=\"submit\" class=\"btn btn-primary\">Insert</button>
            ";
        }
        // line 28
        yield "        </form>
    </div>
    <div class=\"border p-3 mt-5\">
        <h2>List of User E-Mails</h2>
        <div>
            <table class=\"table table-bordered\">
                <tr>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>User E-Mails</th>
                </tr>
                ";
        // line 39
        if (array_key_exists("users", $context)) {
            // line 40
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 41
                yield "                        <tr>
                            <td> <a href=\"";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((Fhooe\Router\Router::urlFor("/deleteuser") . "?uid=") . (($_v0 = (($_v1 = ($context["users"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[$context["key"]] ?? null) : null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0["_id"] ?? null) : null)), "html", null, true);
                yield "\"> Delete </a></td>
                            <td> <a href=\"";
                // line 43
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((Fhooe\Router\Router::urlFor("/updateuser") . "?uid=") . (($_v2 = (($_v3 = ($context["users"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess ? ($_v3[$context["key"]] ?? null) : null)) && is_array($_v2) || $_v2 instanceof ArrayAccess ? ($_v2["_id"] ?? null) : null)), "html", null, true);
                yield "\"> Update </a></td>
                            <td> &nbsp; ";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v4 = (($_v5 = ($context["users"] ?? null)) && is_array($_v5) || $_v5 instanceof ArrayAccess ? ($_v5[$context["key"]] ?? null) : null)) && is_array($_v4) || $_v4 instanceof ArrayAccess ? ($_v4["email"] ?? null) : null), "html", null, true);
                yield " </td>
                        </tr>
                    ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 47
                yield "                        <tr>
                            <td> No users found in database </td>
                            <td>&nbsp;</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['value'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            yield "                ";
        }
        // line 53
        yield "            </table>
        </div>
    </div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mongocrud.html.twig";
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
        return array (  176 => 53,  173 => 52,  163 => 47,  155 => 44,  151 => 43,  147 => 42,  144 => 41,  138 => 40,  136 => 39,  123 => 28,  119 => 26,  116 => 25,  107 => 23,  102 => 22,  100 => 21,  93 => 17,  84 => 11,  78 => 8,  74 => 7,  70 => 5,  63 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}CRUD Example{% endblock title %}
{% block main %}
    <h1>CRUD Example</h1>
    <div class=\"border p-3 mt-5\">
        {{ include('errors.html.twig') }}
        <form method=\"post\" action=\"{{ url_for( route ) }}\">
            <div class=\"mb-3\">
                <label for=\"email\" class=\"form-label\">Email address</label>
                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"{{ email }}\"
                       placeholder=\"you@example.com\" aria-describedby=\"emailHelp\" autocomplete=\"email\" required>
                <div id=\"emailHelp\" class=\"form-text\">Please enter the email address you registered with.</div>
            </div>
            <div class=\"mb-3\">
                <label for=\"name\" class=\"form-label\">Your Name</label>
                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" value=\"{{ name }}\"
                       placeholder=\"Your Name\" aria-describedby=\"nameHelp\">
                <div id=\"nameHelp\" class=\"form-text\">Please enter your name.</div>
            </div>
            {% if uid is defined %}
                {% for key, value in uid %}
                    <button type=\"submit\" class=\"btn btn-primary\" name=\"uid[{{ value }}]\">Update</button>
                {% endfor %}
            {% else %}
                <button type=\"submit\" class=\"btn btn-primary\">Insert</button>
            {% endif %}
        </form>
    </div>
    <div class=\"border p-3 mt-5\">
        <h2>List of User E-Mails</h2>
        <div>
            <table class=\"table table-bordered\">
                <tr>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>User E-Mails</th>
                </tr>
                {% if users is defined %}
                    {% for key, value in users %}
                        <tr>
                            <td> <a href=\"{{ url_for(\"/deleteuser\") ~ \"?uid=\" ~ users[key]['_id'] }}\"> Delete </a></td>
                            <td> <a href=\"{{ url_for(\"/updateuser\") ~ \"?uid=\" ~ users[key]['_id'] }}\"> Update </a></td>
                            <td> &nbsp; {{ users[key]['email'] }} </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td> No users found in database </td>
                            <td>&nbsp;</td>
                        </tr>
                    {% endfor %}
                {% endif %}
            </table>
        </div>
    </div>
{% endblock main %}", "mongocrud.html.twig", "/var/www/html/mongoshop/views/mongocrud.html.twig");
    }
}
