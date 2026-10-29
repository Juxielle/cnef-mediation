<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediationKpi;
use Illuminate\Database\Eloquent\Model;

class MediationKpiController extends CrudController
{
    protected string $model = MediationKpi::class;

    protected string $title = 'Statistiques de médiation';

    protected string $routeBase = 'admin.mediation-kpis';

    protected array $columns = [
        'libelle' => 'Libellé',
        'valeur' => 'Valeur',
        'sous_texte' => 'Sous-texte',
        'ordre' => 'Ordre',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'libelle', 'label' => 'Libellé', 'type' => 'text', 'required' => true],
            ['name' => 'valeur', 'label' => 'Valeur', 'type' => 'text', 'required' => true],
            ['name' => 'sous_texte', 'label' => 'Sous-texte', 'type' => 'text', 'required' => true],
            ['name' => 'ordre', 'label' => "Ordre d'affichage", 'type' => 'number'],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'libelle' => ['required', 'string', 'max:150'],
            'valeur' => ['required', 'string', 'max:50'],
            'sous_texte' => ['required', 'string', 'max:150'],
            'ordre' => ['nullable', 'integer'],
        ];
    }
}
