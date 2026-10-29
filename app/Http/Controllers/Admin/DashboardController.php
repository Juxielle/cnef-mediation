<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\ContactMessage;
use App\Models\MediateurCandidature;
use App\Models\MediationEtablissement;
use App\Models\MediationKpi;
use App\Models\MediationRequest;
use App\Models\TexteReglementaire;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            ['label' => 'Total Saisines', 'value' => MediationRequest::count(), 'route' => 'admin.mediation-requests.index'],
            ['label' => 'Établissements adhérents', 'value' => MediationEtablissement::count(), 'route' => 'admin.mediation-etablissements.index'],
            ['label' => 'Candidatures reçues', 'value' => MediateurCandidature::count(), 'route' => 'admin.candidatures.index'],
            ['label' => 'Fonds documentaire (Textes)', 'value' => TexteReglementaire::count(), 'route' => 'admin.textes.index'],
            ['label' => 'Actualités de la médiation', 'value' => Actualite::count(), 'route' => 'admin.actualites.index'],
            ['label' => 'Indicateurs clés (KPI)', 'value' => MediationKpi::count(), 'route' => 'admin.mediation-kpis.index'],
        ];

        $pending = [
            ['label' => 'Saisines de médiation non traitées', 'value' => MediationRequest::where('statut', 'nouveau')->count(), 'route' => 'admin.mediation-requests.index'],
            ['label' => 'Messages de contact non traités', 'value' => ContactMessage::where('traite', false)->count(), 'route' => 'admin.messages.index'],
            ['label' => 'Candidatures médiateur en attente', 'value' => MediateurCandidature::where('statut', 'recue')->count(), 'route' => 'admin.candidatures.index'],
        ];

        return view('admin.dashboard', compact('stats', 'pending'));
    }
}

