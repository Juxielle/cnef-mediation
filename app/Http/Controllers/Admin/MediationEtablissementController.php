<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediationEtablissement;
use Illuminate\Database\Eloquent\Model;

class MediationEtablissementController extends CrudController
{
    protected string $model = MediationEtablissement::class;

    protected string $title = 'Établissements assujettis';

    protected string $routeBase = 'admin.mediation-etablissements';

    protected string $orderColumn = 'ordre';

    protected array $columns = [
        'nom' => 'Nom de l’établissement',
        'categorie' => 'Catégorie / Groupe',
        'sigle' => 'Sigle / Code',
        'actif' => 'Actif',
        'ordre' => 'Ordre',
    ];

    protected function fields(?Model $item = null): array
    {
        return [
            ['name' => 'categorie', 'label' => 'Catégorie / Groupe', 'type' => 'select', 'required' => true, 'options' => [
                '1- Établissements de crédits' => '1- Établissements de crédits (Banques, etc.)',
                '2- Établissements de Micro Finance (EMF)' => '2- Établissements de Micro Finance (EMF)',
                '3- Établissements de paiement' => '3- Établissements de paiement (Mobile Money, etc.)',
                '4- Assurances' => '4- Assurances',
                '5- Intermédiaires marchés' => '5- Intermédiaires marchés (Bourses, Asset Management...)',
            ]],
            ['name' => 'nom', 'label' => 'Nom officiel de l’établissement', 'type' => 'text', 'required' => true, 'full' => true],
            ['name' => 'sigle', 'label' => 'Sigle usuel ou code', 'type' => 'text', 'help' => 'Ex : BICIG, BGFI, CBI Gabon...'],
            ['name' => 'actif', 'label' => 'Établissement actif (visible dans le formulaire de médiation)', 'type' => 'checkbox'],
            ['name' => 'ordre', 'label' => 'Ordre d’affichage', 'type' => 'number', 'help' => 'Ordre de tri au sein du groupe ou global'],
        ];
    }

    protected function rules(?Model $item = null): array
    {
        return [
            'categorie' => ['required', 'string', 'max:100'],
            'nom' => ['required', 'string', 'max:150'],
            'sigle' => ['nullable', 'string', 'max:50'],
            'actif' => ['sometimes', 'boolean'],
            'ordre' => ['nullable', 'integer'],
        ];
    }
}
