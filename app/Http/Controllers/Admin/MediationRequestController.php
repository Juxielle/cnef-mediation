<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediationRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MediationRequestController extends SubmissionController
{
    protected string $model = MediationRequest::class;

    protected string $title = 'Saisines de médiation';

    protected string $routeBase = 'admin.mediation-requests';

    protected array $columns = [
        'reference' => 'Code / Référence',
        'prenom' => 'Prénom',
        'nom' => 'Nom',
        'etablissement' => 'Établissement',
        'statut' => 'Statut du dossier',
        'created_at' => 'Reçu le',
    ];

    protected string $statusField = 'statut';

    protected array $statusOptions = [
        'nouveau' => '1. Dossier déposé / Reçu',
        'recevable' => '2. Dossier déclaré recevable',
        'en_cours' => '3. En cours d’instruction',
        'echange_etablissement' => '3b. Échanges avec l’établissement',
        'proposition_accord' => '4. Proposition d’accord formulée',
        'resolu' => '5. Litige résolu (Accord trouvé)',
        'non_resolu' => '5b. Clôturé sans accord amiable',
        'rejete' => '0. Dossier non recevable (Rejeté)',
    ];

    protected function detailFields(Model $item): array
    {
        return [
            ['label' => 'Code Confidentiel / Référence', 'value' => $item->reference],
            ['label' => 'Prénom', 'value' => $item->prenom],
            ['label' => 'Nom', 'value' => $item->nom],
            ['label' => 'Email', 'value' => $item->email],
            ['label' => 'Téléphone', 'value' => $item->telephone ?: '—'],
            ['label' => 'Établissement concerné', 'value' => $item->etablissement],
            ['label' => 'Nature du litige', 'value' => $item->nature_litige],
            ['label' => 'Description du différend', 'value' => $item->description, 'full' => true],
            ['label' => 'Observations du Médiateur (visibles par l’usager en suivi)', 'value' => $item->observation_mediateur ?: 'Aucune observation enregistrée.', 'full' => true],
            ['label' => 'Pièces jointes fournies', 'files' => $item->pieces_jointes ?? [], 'full' => true],
            ['label' => 'Date de réception', 'value' => $item->created_at->format('d/m/Y à H:i')],
            ['label' => 'Dernière mise à jour', 'value' => $item->date_traitement ? $item->date_traitement->format('d/m/Y à H:i') : '—'],
        ];
    }

    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $item = $this->model::findOrFail($id);

        $data = $request->validate([
            $this->statusField => ['required', 'string', 'in:'.implode(',', array_keys($this->statusOptions))],
            'observation_mediateur' => ['nullable', 'string', 'max:3000'],
        ]);

        $data['date_traitement'] = now();
        $item->update($data);

        return redirect()->route($this->routeBase.'.show', $id)
            ->with('success', 'Statut et observations du dossier de médiation mis à jour avec succès.');
    }
}
