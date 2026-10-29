<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actualite;
use Illuminate\Database\Eloquent\Model;

class ActualiteController extends CrudController
{
    protected string $model = Actualite::class;

    protected string $title = 'Actualités CNEF';

    protected string $routeBase = 'admin.actualites';

    protected array $columns = [
        'titre' => 'Titre',
        'categorie' => 'Catégorie',
        'badge_label' => 'Badge',
        'date_publication' => 'Date',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'categorie', 'label' => 'Catégorie', 'type' => 'select', 'required' => true, 'options' => [
                'reglementation' => 'Réglementation',
                'communique' => 'Communiqué',
                'etude' => 'Étude & Rapport',
                'evenement' => 'Événement',
                'mediation' => 'Médiation financière',
            ]],
            ['name' => 'badge_label', 'label' => 'Libellé du badge', 'type' => 'text', 'required' => true],
            ['name' => 'badge_couleur', 'label' => 'Couleur du badge (hex)', 'type' => 'text', 'required' => true, 'help' => 'Ex : #E8A317'],
            ['name' => 'fond_couleur', 'label' => 'Couleur de fond de la vignette (hex)', 'type' => 'text', 'required' => true, 'help' => 'Ex : #E8F4EE'],
            ['name' => 'date_publication', 'label' => 'Date de publication', 'type' => 'text', 'required' => true],
            ['name' => 'ordre', 'label' => "Ordre d'affichage", 'type' => 'number'],
            ['name' => 'titre', 'label' => 'Titre', 'type' => 'text', 'required' => true, 'full' => true],
            ['name' => 'contenu', 'label' => 'Contenu', 'type' => 'textarea', 'required' => true, 'full' => true],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'categorie' => ['required', 'string', 'max:50'],
            'badge_label' => ['required', 'string', 'max:100'],
            'badge_couleur' => ['required', 'string', 'max:20'],
            'fond_couleur' => ['required', 'string', 'max:20'],
            'date_publication' => ['required', 'string', 'max:100'],
            'ordre' => ['nullable', 'integer'],
            'titre' => ['required', 'string'],
            'contenu' => ['required', 'string'],
        ];
    }
}
