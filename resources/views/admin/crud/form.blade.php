@extends('admin.layouts.app')

@section('title', $item ? 'Modifier — '.$title : 'Ajouter — '.$title)

@section('content')
<div class="admin-card">
  <div class="admin-card-head">
    <h2>{{ $item ? 'Modifier' : 'Nouvel élément' }} — {{ $title }}</h2>
    <a href="{{ route($routeBase.'.index') }}" class="abtn abtn-ghost">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      Retour à la liste
    </a>
  </div>

  <form method="POST" action="{{ $item ? route($routeBase.'.update', $item->id) : route($routeBase.'.store') }}" enctype="multipart/form-data" style="padding:24px 22px">
    @csrf
    @if ($item) @method('PUT') @endif

    <div class="aform-grid">
      @foreach ($fields as $field)
        @php
          $name = $field['name'];
          $raw = old($name, $item?->{$name});
          if (($field['type'] ?? 'text') === 'json') {
              $raw = old($name, $raw ? json_encode($raw, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : '[]');
          }
          if (($field['type'] ?? 'text') === 'datetime-local' && $raw instanceof \DateTimeInterface) {
              $raw = $raw->format('Y-m-d\TH:i');
          }
        @endphp
        <div class="afg {{ ($field['full'] ?? false) ? 'afg-full' : '' }}">
          @if (($field['type'] ?? 'text') === 'checkbox')
            <label class="afcheck">
              <input type="hidden" name="{{ $name }}" value="0">
              <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $item?->{$name}))>
              <span class="afl" style="margin-bottom:0">{{ $field['label'] }}</span>
            </label>
          @else
            <label class="afl">{{ $field['label'] }} @if($field['required'] ?? false)<span class="req">*</span>@endif</label>

            @if ($field['type'] === 'textarea')
              <textarea name="{{ $name }}" class="afta">{{ $raw }}</textarea>
            @elseif ($field['type'] === 'json')
              <textarea name="{{ $name }}" class="afta json">{{ $raw }}</textarea>
            @elseif ($field['type'] === 'svg_picker')
              <div class="af-svg-picker" data-svg-picker data-mode="{{ $field['mode'] ?? 'svg' }}">
                <input type="hidden" name="{{ $name }}" value="{{ $raw }}" data-svg-value>
                <div class="af-svg-current">
                  <div class="af-svg-preview" data-svg-preview>
                    @if ($raw)
                      @if (($field['mode'] ?? 'svg') === 'fragment')
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">{!! $raw !!}</svg>
                      @else
                        {!! $raw !!}
                      @endif
                    @else
                      <span>Aucune sélection</span>
                    @endif
                  </div>
                  <div>
                    <strong data-svg-status>{{ $raw ? 'Icône sélectionnée' : 'Aucune icône sélectionnée' }}</strong>
                    <small>Le code technique est enregistré automatiquement.</small>
                  </div>
                  @if (!($field['required'] ?? false))
                    <button type="button" class="abtn abtn-ghost abtn-sm" data-svg-clear>Retirer</button>
                  @endif
                </div>
                <div class="af-svg-gallery">
                  @foreach ($field['options'] as $optionLabel => $optionSvg)
                    <button type="button" class="af-svg-option {{ (string) $raw === (string) $optionSvg ? 'selected' : '' }}" data-svg-option data-svg="{{ $optionSvg }}" title="{{ $optionLabel }}">
                      <span>
                        @if (($field['mode'] ?? 'svg') === 'fragment')
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">{!! $optionSvg !!}</svg>
                        @else
                          {!! $optionSvg !!}
                        @endif
                      </span>
                      <small>{{ $optionLabel }}</small>
                    </button>
                  @endforeach
                  <label class="af-svg-option af-svg-upload">
                    <input type="file" accept=".svg,image/svg+xml" data-svg-file>
                    <span class="af-svg-upload-icon">+</span>
                    <small>Importer un SVG</small>
                  </label>
                </div>
                <div class="aferr" data-svg-error hidden></div>
              </div>
            @elseif ($field['type'] === 'list')
              @php $values = is_array($raw) && count($raw) ? array_values($raw) : ['']; @endphp
              <div class="af-repeat" data-repeat data-kind="list" data-name="{{ $name }}">
                <div class="af-repeat-rows">
                  @foreach ($values as $index => $value)
                    <div class="af-repeat-row">
                      <input type="{{ $field['input_type'] ?? 'text' }}" step="{{ $field['step'] ?? '1' }}" name="{{ $name }}[{{ $index }}]" class="afi" value="{{ $value }}" placeholder="{{ $field['placeholder'] ?? '' }}">
                      <button type="button" class="af-remove" data-remove aria-label="Supprimer cette ligne">&times;</button>
                    </div>
                  @endforeach
                </div>
                <button type="button" class="abtn abtn-ghost abtn-sm af-add" data-add>+ {{ $field['add_label'] ?? 'Ajouter une ligne' }}</button>
              </div>
            @elseif ($field['type'] === 'repeater')
              @php $rows = is_array($raw) && count($raw) ? array_values($raw) : [[]]; @endphp
              <div class="af-repeat" data-repeat data-kind="repeater" data-name="{{ $name }}">
                <div class="af-repeat-rows">
                  @foreach ($rows as $index => $row)
                    <div class="af-repeat-row af-repeat-grid" style="--repeat-cols:{{ count($field['columns']) }}">
                      @foreach ($field['columns'] as $column)
                        <div class="af-repeat-field">
                          <label>{{ $column['label'] }}</label>
                          @if (($column['type'] ?? 'text') === 'select')
                            <select name="{{ $name }}[{{ $index }}][{{ $column['name'] }}]" class="afsel">
                              <option value="">— Sélectionnez —</option>
                              @foreach ($column['options'] as $optionValue => $optionLabel)
                                <option value="{{ $optionValue }}" @selected((string) ($row[$column['name']] ?? '') === (string) $optionValue)>{{ $optionLabel }}</option>
                              @endforeach
                            </select>
                          @else
                            <input type="{{ $column['type'] ?? 'text' }}" step="{{ $column['step'] ?? '1' }}" name="{{ $name }}[{{ $index }}][{{ $column['name'] }}]" class="afi" value="{{ $row[$column['name']] ?? '' }}" placeholder="{{ $column['placeholder'] ?? '' }}">
                          @endif
                        </div>
                      @endforeach
                      <button type="button" class="af-remove" data-remove aria-label="Supprimer cette ligne">&times;</button>
                    </div>
                  @endforeach
                </div>
                <button type="button" class="abtn abtn-ghost abtn-sm af-add" data-add>+ {{ $field['add_label'] ?? 'Ajouter une ligne' }}</button>
              </div>
            @elseif ($field['type'] === 'select')
              <select name="{{ $name }}" class="afsel">
                <option value="">— Sélectionnez —</option>
                @foreach ($field['options'] as $val => $label)
                  <option value="{{ $val }}" @selected((string) $raw === (string) $val)>{{ $label }}</option>
                @endforeach
              </select>
            @elseif ($field['type'] === 'number')
              <input type="number" step="{{ $field['step'] ?? '1' }}" name="{{ $name }}" class="afi" value="{{ $raw }}">
            @elseif ($field['type'] === 'datetime-local')
              <input type="datetime-local" name="{{ $name }}" class="afi" value="{{ $raw instanceof \DateTimeInterface ? $raw->format('Y-m-d\TH:i') : $raw }}">
            @elseif ($field['type'] === 'url')
              <input type="url" name="{{ $name }}" class="afi" value="{{ $raw }}">
            @else
              <input type="text" name="{{ $name }}" class="afi" value="{{ $raw }}">
            @endif
          @endif

          @if (isset($field['help']))
            <div class="afhelp">{{ $field['help'] }}</div>
          @endif
          @error($name)
            <div class="aferr">{{ $message }}</div>
          @enderror
          @if (!$errors->has($name) && $errors->has($name.'.*'))
            <div class="aferr">{{ $errors->first($name.'.*') }}</div>
          @endif
        </div>
      @endforeach
    </div>

    <div class="admin-form-actions">
      <button type="submit" class="abtn abtn-primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 13l4 4L19 7"/></svg>
        {{ $item ? 'Enregistrer les modifications' : 'Créer' }}
      </button>
      <a href="{{ route($routeBase.'.index') }}" class="abtn abtn-ghost">Annuler</a>
    </div>
  </form>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('[data-repeat]').forEach(function (repeat) {
  const rows = repeat.querySelector('.af-repeat-rows');

  function reindex() {
    rows.querySelectorAll('.af-repeat-row').forEach(function (row, index) {
      row.querySelectorAll('[name]').forEach(function (input) {
        input.name = input.name.replace(/\[\d+\]/, '[' + index + ']');
      });
    });
  }

  repeat.addEventListener('click', function (event) {
    if (event.target.matches('[data-add]')) {
      const row = rows.querySelector('.af-repeat-row').cloneNode(true);
      row.querySelectorAll('input, select').forEach(function (input) { input.value = ''; });
      rows.appendChild(row);
      reindex();
    }
    if (event.target.matches('[data-remove]')) {
      const allRows = rows.querySelectorAll('.af-repeat-row');
      if (allRows.length === 1) {
        allRows[0].querySelectorAll('input, select').forEach(function (input) { input.value = ''; });
      } else {
        event.target.closest('.af-repeat-row').remove();
        reindex();
      }
    }
  });
});

document.querySelectorAll('[data-svg-picker]').forEach(function (picker) {
  const value = picker.querySelector('[data-svg-value]');
  const preview = picker.querySelector('[data-svg-preview]');
  const status = picker.querySelector('[data-svg-status]');
  const error = picker.querySelector('[data-svg-error]');
  const mode = picker.dataset.mode;

  function selectSvg(svg, selectedOption) {
    value.value = svg;
    preview.innerHTML = mode === 'fragment'
      ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">' + svg + '</svg>'
      : svg;
    status.textContent = 'Icône sélectionnée';
    error.hidden = true;
    picker.querySelectorAll('[data-svg-option]').forEach(function (option) {
      option.classList.toggle('selected', option === selectedOption);
    });
  }

  picker.querySelectorAll('[data-svg-option]').forEach(function (option) {
    option.addEventListener('click', function () { selectSvg(option.dataset.svg, option); });
  });

  picker.querySelector('[data-svg-file]').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (!file) return;
    if (file.size > 512 * 1024) {
      error.textContent = 'Le fichier SVG ne doit pas dépasser 512 Ko.';
      error.hidden = false;
      return;
    }
    const reader = new FileReader();
    reader.onload = function () {
      const documentSvg = new DOMParser().parseFromString(reader.result, 'image/svg+xml');
      const svg = documentSvg.documentElement;
      const unsafe = svg.querySelector('script, foreignObject, iframe, object, embed, style, [onload], [onclick]');
      if (svg.nodeName.toLowerCase() !== 'svg' || unsafe || documentSvg.querySelector('parsererror')) {
        error.textContent = 'Ce fichier SVG est invalide ou contient du contenu non autorisé.';
        error.hidden = false;
        return;
      }
      selectSvg(mode === 'fragment' ? svg.innerHTML : svg.outerHTML, null);
    };
    reader.readAsText(file);
  });

  const clear = picker.querySelector('[data-svg-clear]');
  if (clear) clear.addEventListener('click', function () {
    value.value = '';
    preview.innerHTML = '<span>Aucune sélection</span>';
    status.textContent = 'Aucune icône sélectionnée';
    picker.querySelectorAll('[data-svg-option]').forEach(function (option) { option.classList.remove('selected'); });
  });
});
</script>
@endpush
