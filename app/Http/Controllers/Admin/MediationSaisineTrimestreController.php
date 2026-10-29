<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediationSaisineTrimestre;
use Illuminate\Database\Eloquent\Model;

class MediationSaisineTrimestreController extends CrudController
{
    protected string $model = MediationSaisineTrimestre::class;

    protected string $title = 'Saisines par trimestre';

    protected string $routeBase = 'admin.mediation-saisines';

    protected array $columns = [
        'periode' => 'Période',
        'saisines' => 'Saisines',
        'resolus' => 'Résolus',
        'ordre' => 'Ordre',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'periode', 'label' => 'Période', 'type' => 'text', 'required' => true, 'help' => 'Ex : T1 24'],
            ['name' => 'saisines', 'label' => 'Nombre de saisines', 'type' => 'number', 'required' => true],
            ['name' => 'resolus', 'label' => 'Dossiers résolus', 'type' => 'number', 'required' => true],
            ['name' => 'ordre', 'label' => "Ordre d'affichage (chronologique)", 'type' => 'number', 'required' => true],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'periode' => ['required', 'string', 'max:20'],
            'saisines' => ['required', 'integer', 'min:0'],
            'resolus' => ['required', 'integer', 'min:0'],
            'ordre' => ['required', 'integer'],
        ];
    }
}
