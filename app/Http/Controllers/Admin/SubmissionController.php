<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Contrôleur générique pour la gestion des données soumises par les visiteurs
 * (saisines de médiation, messages de contact, candidatures médiateur).
 * Contrairement au CrudController, ces ressources ne sont pas créées depuis
 * le back-office : l'admin peut seulement les consulter, changer leur statut
 * et les supprimer.
 */
abstract class SubmissionController extends Controller
{
    /** @var class-string<Model> */
    protected string $model;

    protected string $title;

    protected string $routeBase;

    protected array $columns = [];

    protected string $statusField = 'statut';

    protected string $statusType = 'select'; // select | boolean

    protected array $statusOptions = [];

    /** Champs affichés sur la page de détail : ['label' => ..., 'value' => ...] */
    abstract protected function detailFields(Model $item): array;

    public function index(): View
    {
        $items = $this->model::query()->latest()->paginate(15);

        return view('admin.submissions.index', [
            'title' => $this->title,
            'routeBase' => $this->routeBase,
            'columns' => $this->columns,
            'items' => $items,
            'statusField' => $this->statusField,
            'statusType' => $this->statusType,
        ]);
    }

    public function show(int $id): View
    {
        $item = $this->model::findOrFail($id);

        return view('admin.submissions.show', [
            'title' => $this->title,
            'routeBase' => $this->routeBase,
            'item' => $item,
            'fields' => $this->detailFields($item),
            'statusField' => $this->statusField,
            'statusType' => $this->statusType,
            'statusOptions' => $this->statusOptions,
        ]);
    }

    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $item = $this->model::findOrFail($id);

        if ($this->statusType === 'boolean') {
            $item->update([$this->statusField => $request->boolean($this->statusField)]);
        } else {
            $data = $request->validate([
                $this->statusField => ['required', 'string', 'in:'.implode(',', array_keys($this->statusOptions))],
            ]);
            $item->update($data);
        }

        return redirect()->route($this->routeBase.'.show', $id)->with('success', 'Statut mis à jour.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->model::findOrFail($id)->delete();

        return redirect()->route($this->routeBase.'.index')->with('success', 'Élément supprimé.');
    }

    public function download(int $id, int $index): StreamedResponse
    {
        $item = $this->model::findOrFail($id);
        $path = $item->pieces_jointes[$index] ?? abort(404);

        abort_unless(Storage::disk('local')->exists($path), 404);

        return Storage::disk('local')->download($path);
    }
}
