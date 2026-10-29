<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Contrôleur CRUD générique réutilisé par toutes les ressources de contenu
 * du back-office. Chaque sous-classe déclare seulement : le modèle, les
 * colonnes du tableau, les champs du formulaire et les règles de validation.
 */
abstract class CrudController extends Controller
{
    /** @var class-string<Model> */
    protected string $model;

    protected string $title;

    protected string $routeBase; // ex: admin.acteurs

    protected string $orderColumn = 'ordre';

    /** Colonnes affichées dans le tableau : ['champ' => 'Libellé'] */
    protected array $columns = [];

    /** Définition des champs du formulaire de création/édition */
    abstract protected function fields(?Model $item = null): array;

    /** Règles de validation Laravel */
    abstract protected function rules(?Model $item = null): array;

    public function index(): View
    {
        $items = $this->model::query()->orderBy($this->orderColumn)->paginate(15);

        return view('admin.crud.index', [
            'title' => $this->title,
            'routeBase' => $this->routeBase,
            'columns' => $this->columns,
            'items' => $items,
        ]);
    }

    public function create(): View
    {
        return view('admin.crud.form', [
            'title' => $this->title,
            'routeBase' => $this->routeBase,
            'item' => null,
            'fields' => $this->fields(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, $this->rules());

        $this->model::create($data);

        return redirect()->route($this->routeBase.'.index')->with('success', $this->title.' créé(e) avec succès.');
    }

    public function edit(int $id): View
    {
        $item = $this->model::findOrFail($id);

        return view('admin.crud.form', [
            'title' => $this->title,
            'routeBase' => $this->routeBase,
            'item' => $item,
            'fields' => $this->fields($item),
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $item = $this->model::findOrFail($id);
        $data = $this->validated($request, $this->rules($item));

        $item->update($data);

        return redirect()->route($this->routeBase.'.index')->with('success', $this->title.' mis(e) à jour avec succès.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->model::findOrFail($id)->delete();

        return redirect()->route($this->routeBase.'.index')->with('success', $this->title.' supprimé(e).');
    }

    /** Valide et normalise les valeurs structurées avant enregistrement. */
    protected function validated(Request $request, array $rules): array
    {
        // The UI posts native arrays. Keep accepting the former JSON payloads
        // so existing integrations remain compatible.
        foreach ($this->fields() as $field) {
            if (! in_array($field['type'] ?? null, ['list', 'repeater'], true)) {
                continue;
            }

            $value = $request->input($field['name']);
            if (is_string($value) && is_array($decoded = json_decode($value, true))) {
                $request->merge([$field['name'] => $decoded]);
            }
        }

        $data = $request->validate($rules);

        foreach ($this->fields() as $field) {
            if (($field['type'] ?? null) === 'json' && array_key_exists($field['name'], $data)) {
                $data[$field['name']] = json_decode($data[$field['name']], true) ?? [];
            }
            if (($field['type'] ?? null) === 'checkbox') {
                $data[$field['name']] = $request->boolean($field['name']);
            }
            if (($field['type'] ?? null) === 'list' && isset($data[$field['name']])) {
                $data[$field['name']] = array_values(array_filter(
                    $data[$field['name']], fn ($value) => $value !== null && $value !== ''
                ));
            }
            if (($field['type'] ?? null) === 'repeater' && isset($data[$field['name']])) {
                $data[$field['name']] = array_values(array_filter(
                    $data[$field['name']],
                    fn ($row) => is_array($row) && count(array_filter($row, fn ($value) => $value !== null && $value !== '')) > 0
                ));
            }
        }

        return $data;
    }
}
