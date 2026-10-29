<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediationRequest extends Model
{
    protected $fillable = [
        'reference',
        'prenom',
        'nom',
        'email',
        'telephone',
        'etablissement',
        'nature_litige',
        'description',
        'pieces_jointes',
        'statut',
        'observation_mediateur',
        'date_traitement',
    ];

    protected $casts = [
        'pieces_jointes' => 'array',
        'date_traitement' => 'datetime',
    ];

    /**
     * États officiels d'un dossier de médiation financière.
     */
    public const STATUTS = [
        'nouveau' => [
            'label' => 'Dossier déposé / Reçu',
            'badge' => '#2563EB',
            'step' => 1,
            'description' => 'Votre saisine a bien été enregistrée et transmise au Secrétariat du Médiateur pour examen initial de recevabilité.',
        ],
        'recevable' => [
            'label' => 'Dossier déclaré recevable',
            'badge' => '#059669',
            'step' => 2,
            'description' => 'Votre dossier remplit les conditions légales de recevabilité. L’instruction contradictoire est formellement ouverte.',
        ],
        'en_cours' => [
            'label' => 'En cours d’instruction',
            'badge' => '#0284C7',
            'step' => 3,
            'description' => 'Le Médiateur financier analyse les éléments techniques du litige et examine les pièces justificatives versées au dossier.',
        ],
        'echange_etablissement' => [
            'label' => 'Échanges avec l’établissement',
            'badge' => '#D97706',
            'step' => 3,
            'description' => 'La saisine a été notifiée à l’établissement financier assujetti pour recueillir ses observations et propositions sous délai imparti.',
        ],
        'proposition_accord' => [
            'label' => 'Proposition d’accord formulée',
            'badge' => '#7C3AED',
            'step' => 4,
            'description' => 'Le Médiateur a rédigé et soumis un projet de solution amiable aux deux parties pour examen et signature.',
        ],
        'resolu' => [
            'label' => 'Litige résolu (Accord trouvé)',
            'badge' => '#16A34A',
            'step' => 5,
            'description' => 'Un accord amiable et équitable a été validé et signé par les parties. Le litige est définitivement résolu.',
        ],
        'non_resolu' => [
            'label' => 'Clôturé sans accord amiable',
            'badge' => '#64748B',
            'step' => 5,
            'description' => 'La médiation n’a pas permis de rapprocher les positions. Le dossier est clos sans préjudice de vos droits judiciaires.',
        ],
        'rejete' => [
            'label' => 'Dossier non recevable',
            'badge' => '#DC2626',
            'step' => 0,
            'description' => 'La saisine ne satisfait pas aux critères légaux de recevabilité (absence de réclamation préalable infructueuse, litige en justice, forclusion).',
        ],
    ];

    public function getStatutMeta(): array
    {
        return self::STATUTS[$this->statut] ?? [
            'label' => ucfirst($this->statut),
            'badge' => '#475569',
            'step' => 1,
            'description' => 'Statut en cours de mise à jour.',
        ];
    }
}
