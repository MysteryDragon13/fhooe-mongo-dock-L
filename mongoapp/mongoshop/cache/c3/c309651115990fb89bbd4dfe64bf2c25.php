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

/* base.html.twig */
class __TwigTemplate_365f4098a2ea2224c70e49f7782b3600 extends Template
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
            'head' => [$this, 'block_head'],
            'title' => [$this, 'block_title'],
            'header' => [$this, 'block_header'],
            'main' => [$this, 'block_main'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
  ";
        // line 4
        yield from $this->unwrap()->yieldBlock('head', $context, $blocks);
        // line 11
        yield "</head>
<body>
<header>";
        // line 13
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 43
        yield "</header>
<main>
  <div class=\"container-lg mt-lg-4\">
    ";
        // line 46
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["_session"] ?? null), "isloggedin", [], "any", true, true, false, 46)) {
            // line 47
            yield "    <p><i class=\"bi-emoji-smile\" style=\"font-size: 1em\"></i> Your are logged in as ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["_session"] ?? null), "first_name", [], "any", false, false, false, 47), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["_session"] ?? null), "last_name", [], "any", false, false, false, 47), "html", null, true);
            yield ".</p>
    ";
        }
        // line 49
        yield "    ";
        yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
        // line 50
        yield "  </div>
</main>
<div class=\"container-lg\">
<footer class=\"d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top\">
  ";
        // line 54
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 68
        yield "</footer>
</div>
<script src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::getBasePath(), "html", null, true);
        yield "/../vendor/twbs/bootstrap/dist/js/bootstrap.js\"></script>
</body>
</html>";
        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_head(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 5
        yield "  <meta charset=\"UTF-8\">
  <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::getBasePath(), "html", null, true);
        yield "/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::getBasePath(), "html", null, true);
        yield "/../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css\">
  ";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 14
        yield "  <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container-lg\">
      <a class=\"navbar-brand\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/"), "html", null, true);
        yield "\">
        <img src=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::getBasePath(), "html", null, true);
        yield "/../views/images/fhooe.svg\" alt=\"\" height=\"30\" class=\"d-inline-block align-text-top\">
        fhooe/router-skeleton
      </a>
      <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\"
              aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/createuser"), "html", null, true);
        yield "\">CRUD</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/create_user"), "html", null, true);
        yield "\">Doctrine</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/createcountry"), "html", null, true);
        yield "\">Country</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Fhooe\Router\Router::urlFor("/mycart"), "html", null, true);
        yield "\">Mycart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
";
        yield from [];
    }

    // line 49
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    // line 54
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 55
        yield "    <div class=\"col-lg-9 d-flex align-items-center\">
      <img src=\"../views/images/fhooe.svg\" alt=\"\" height=\"24\" class=\"me-2\">
      <span class=\"text-muted\">© FH Oberösterreich | Department of Digital Media</span>
    </div>

    <ul class=\"nav col-lg-3 justify-content-end list-unstyled d-flex\">
      <li class=\"ms-3\">
        <a class=\"text-muted\" href=\"https://github.com/Digital-Media/fhooe-router-skeleton\">
          <i class=\"bi-github\"></i>
        </a>
      </li>
    </ul>
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  209 => 55,  202 => 54,  192 => 49,  180 => 36,  174 => 33,  168 => 30,  162 => 27,  149 => 17,  145 => 16,  141 => 14,  134 => 13,  124 => 6,  117 => 9,  113 => 8,  108 => 6,  105 => 5,  98 => 4,  90 => 70,  86 => 68,  84 => 54,  78 => 50,  75 => 49,  67 => 47,  65 => 46,  60 => 43,  58 => 13,  54 => 11,  52 => 4,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
  {% block head %}
  <meta charset=\"UTF-8\">
  <title>{% block title %}{% endblock %}</title>
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <link rel=\"stylesheet\" href=\"{{ get_base_path() }}/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css\">
  <link rel=\"stylesheet\" href=\"{{ get_base_path() }}/../vendor/twbs/bootstrap-icons/font/bootstrap-icons.css\">
  {% endblock head %}
</head>
<body>
<header>{% block header %}
  <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container-lg\">
      <a class=\"navbar-brand\" href=\"{{ url_for(\"/\") }}\">
        <img src=\"{{ get_base_path() }}/../views/images/fhooe.svg\" alt=\"\" height=\"30\" class=\"d-inline-block align-text-top\">
        fhooe/router-skeleton
      </a>
      <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\"
              aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ url_for(\"/createuser\") }}\">CRUD</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ url_for(\"/create_user\") }}\">Doctrine</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ url_for(\"/createcountry\") }}\">Country</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ url_for(\"/mycart\") }}\">Mycart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
{% endblock header %}
</header>
<main>
  <div class=\"container-lg mt-lg-4\">
    {% if _session.isloggedin is defined %}
    <p><i class=\"bi-emoji-smile\" style=\"font-size: 1em\"></i> Your are logged in as {{  _session.first_name }} {{  _session.last_name }}.</p>
    {% endif %}
    {% block main %}{% endblock main %}
  </div>
</main>
<div class=\"container-lg\">
<footer class=\"d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top\">
  {% block footer %}
    <div class=\"col-lg-9 d-flex align-items-center\">
      <img src=\"../views/images/fhooe.svg\" alt=\"\" height=\"24\" class=\"me-2\">
      <span class=\"text-muted\">© FH Oberösterreich | Department of Digital Media</span>
    </div>

    <ul class=\"nav col-lg-3 justify-content-end list-unstyled d-flex\">
      <li class=\"ms-3\">
        <a class=\"text-muted\" href=\"https://github.com/Digital-Media/fhooe-router-skeleton\">
          <i class=\"bi-github\"></i>
        </a>
      </li>
    </ul>
  {% endblock footer %}
</footer>
</div>
<script src=\"{{ get_base_path() }}/../vendor/twbs/bootstrap/dist/js/bootstrap.js\"></script>
</body>
</html>", "base.html.twig", "/var/www/html/mongoshop/views/base.html.twig");
    }
}
