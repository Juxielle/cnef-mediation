<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class LocalizePublicSite
{
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        $supported = array_keys(config('locales.supported', []));
        $selected = $request->session()->get('locale');
        $locale = in_array($selected, $supported, true)
            ? $selected
            : config('locales.default', 'fr');

        App::setLocale($locale);
        $response = $next($request);

        $catalogue = lang_path($locale.'/site.php');

        if ($request->is('admin', 'admin/*') || $locale === config('locales.default', 'fr') ||
            ! is_file($catalogue) || ! $response instanceof Response ||
            ! str_contains((string) $response->headers->get('Content-Type'), 'text/html')) {
            return $response;
        }

        $translations = require $catalogue;
        uksort($translations, fn (string $a, string $b) => strlen($b) <=> strlen($a));
        $html = $response->getContent();

        $html = preg_replace_callback('/(?<=>)([^<>]+)(?=<)/u', function (array $match) use ($translations) {
            return $this->translateText($match[1], $translations);
        }, $html) ?? $html;

        $html = preg_replace_callback('/\b(placeholder|aria-label|title|content)=("|\')(.*?)\2/u', function (array $match) use ($translations) {
            return $match[1].'='.$match[2].$this->translateText($match[3], $translations).$match[2];
        }, $html) ?? $html;

        $response->setContent($html);

        return $response;
    }

    private function translateText(string $value, array $translations): string
    {
        $leading = preg_match('/^\s*/u', $value, $match) ? $match[0] : '';
        $trailing = preg_match('/\s*$/u', $value, $match) ? $match[0] : '';
        $text = trim($value);

        if ($text === '') {
            return $value;
        }

        $decoded = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        if (isset($translations[$decoded])) {
            return $leading.htmlspecialchars($translations[$decoded], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').$trailing;
        }

        $translated = strtr($decoded, $translations);

        if ($translated === $decoded) {
            return $value;
        }

        return $leading.htmlspecialchars($translated, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').$trailing;
    }
}
