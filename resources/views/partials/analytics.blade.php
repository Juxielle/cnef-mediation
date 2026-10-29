@php($googleAnalyticsId = config('services.google_analytics.measurement_id'))

@if (is_string($googleAnalyticsId) && preg_match('/^G-[A-Z0-9]+$/i', $googleAnalyticsId))
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ urlencode($googleAnalyticsId) }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', @json($googleAnalyticsId));
</script>
@endif
