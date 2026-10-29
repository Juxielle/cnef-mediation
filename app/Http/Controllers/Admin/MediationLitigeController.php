<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediationLitige;
use Illuminate\Database\Eloquent\Model;

class MediationLitigeController extends CrudController
{
    protected string $model = MediationLitige::class;

    protected string $title = 'Nature des litiges';

    protected string $routeBase = 'admin.mediation-litiges';

    protected array $columns = [
        'nature' => 'Nature du litige',
        'dossiers' => 'Dossiers',
        'resolus' => 'Résolus',
        'tendance' => 'Tendance',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'nature', 'label' => 'Nature du litige', 'type' => 'text', 'required' => true, 'full' => true],
            ['name' => 'dossiers', 'label' => 'Nombre de dossiers', 'type' => 'number', 'required' => true],
            ['name' => 'resolus', 'label' => 'Dossiers résolus', 'type' => 'number', 'required' => true],
            ['name' => 'taux', 'label' => 'Taux de résolution (%)', 'type' => 'number', 'required' => true],
            ['name' => 'tendance', 'label' => 'Tendance affichée', 'type' => 'text', 'required' => true, 'help' => 'Ex : +12% ou -4%'],
            ['name' => 'tendance_niveau', 'label' => 'Couleur de la tendance', 'type' => 'select', 'required' => true, 'options' => [
                'g' => 'Vert (positif)',
                'y' => 'Jaune (attention)',
                'r' => 'Rouge (négatif)',
            ]],
            ['name' => 'ordre', 'label' => "Ordre d'affichage", 'type' => 'number'],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'nature' => ['required', 'string', 'max:150'],
            'dossiers' => ['required', 'integer', 'min:0'],
            'resolus' => ['required', 'integer', 'min:0'],
            'taux' => ['required', 'integer', 'min:0', 'max:100'],
            'tendance' => ['required', 'string', 'max:20'],
            'tendance_niveau' => ['required', 'string', 'max:5'],
            'ordre' => ['nullable', 'integer'],
        ];
    }
}
