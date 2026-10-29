<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediateurCandidature;
use Illuminate\Database\Eloquent\Model;

class MediateurCandidatureController extends SubmissionController
{
    protected string $model = MediateurCandidature::class;

    protected string $title = 'Candidatures médiateur';

    protected string $routeBase = 'admin.candidatures';

    protected array $columns = [
        'prenom' => 'Prénom',
        'nom' => 'Nom',
        'branche' => 'Branche',
        'statut' => 'Statut',
        'created_at' => 'Reçue le',
    ];

    protected string $statusField = 'statut';

    protected array $statusOptions = [
        'recue' => 'Reçue',
        'en_examen' => 'En examen',
        'retenue' => 'Retenue',
        'rejetee' => 'Rejetée',
    ];

    protected function detailFields(Model $item): array
    {
        return [
            ['label' => 'Prénom', 'value' => $item->prenom],
            ['label' => 'Nom', 'value' => $item->nom],
            ['label' => 'Email', 'value' => $item->email],
            ['label' => 'Téléphone', 'value' => $item->telephone ?: '—'],
            ['label' => 'Branche visée', 'value' => $item->branche],
            ['label' => 'Lettre de motivation', 'value' => $item->lettre_motivation ?: '—', 'full' => true],
            ['label' => 'Pièces jointes', 'files' => $item->pieces_jointes ?? [], 'full' => true],
            ['label' => 'Reçue le', 'value' => $item->created_at->format('d/m/Y à H:i')],
        ];
    }
}
