<?php

namespace App\Http\Controllers\Admin;

use App\Models\TexteReglementaire;
use Illuminate\Database\Eloquent\Model;

class TexteReglementaireController extends CrudController
{
    protected string $model = TexteReglementaire::class;

    protected string $title = 'Veille réglementaire';

    protected string $routeBase = 'admin.textes';

    protected array $columns = [
        'titre' => 'Titre',
        'type' => 'Type',
        'reference' => 'Référence',
        'date_publication' => 'Date',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'categorie', 'label' => 'Catégorie', 'type' => 'select', 'required' => true, 'options' => [
                'fondateurs' => 'Textes fondateurs',
                'mediation' => 'Médiation financière',
                'cobac' => 'Règlements COBAC',
                'cosumaf' => 'Marchés financiers (COSUMAF)',
                'cima' => 'Assurances (CIMA)',
                'lbc' => 'LBC / FT',
                'teg' => 'TEG & Tarification',
            ]],
            ['name' => 'type', 'label' => 'Type de texte', 'type' => 'text', 'required' => true, 'help' => 'Ex : Règlement CEMAC, Décret, Arrêté MEP...'],
            ['name' => 'reference', 'label' => 'Référence', 'type' => 'text', 'required' => true],
            ['name' => 'date_publication', 'label' => 'Date de publication', 'type' => 'text', 'required' => true, 'help' => 'Texte libre, ex : 12 décembre 2019'],
            ['name' => 'fichier', 'label' => 'Nom du fichier (public/assets/documents)', 'type' => 'text'],
            ['name' => 'ordre', 'label' => "Ordre d'affichage", 'type' => 'number'],
            ['name' => 'titre', 'label' => 'Titre', 'type' => 'textarea', 'required' => true, 'full' => true],
            ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'required' => true, 'full' => true],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'categorie' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', 'max:100'],
            'reference' => ['required', 'string', 'max:150'],
            'date_publication' => ['required', 'string', 'max:100'],
            'fichier' => ['nullable', 'string', 'max:255'],
            'ordre' => ['nullable', 'integer'],
            'titre' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
