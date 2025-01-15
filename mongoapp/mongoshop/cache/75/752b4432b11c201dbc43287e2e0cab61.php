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

/* errors.html.twig */
class __TwigTemplate_c2fcadf811b78f3a553947263f02c120 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        if ((array_key_exists("messages", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["messages"] ?? null)) > 0))) {
            // line 2
            yield "    <div class=\"alert alert-primary mt-5\" role=\"alert\">
        <ul>
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["messages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 5
                yield "                <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                yield "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            yield "        </ul>
    </div>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "errors.html.twig";
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
        return array (  61 => 7,  52 => 5,  48 => 4,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if messages is defined and messages|length > 0 %}
    <div class=\"alert alert-primary mt-5\" role=\"alert\">
        <ul>
            {% for error in messages %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
{% endif %}
", "errors.html.twig", "/var/www/html/mongoshop/views/errors.html.twig");
    }
}
