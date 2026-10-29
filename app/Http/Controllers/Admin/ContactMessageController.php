<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Model;

class ContactMessageController extends SubmissionController
{
    protected string $model = ContactMessage::class;

    protected string $title = 'Messages de contact';

    protected string $routeBase = 'admin.messages';

    protected array $columns = [
        'nom' => 'Nom',
        'email' => 'Email',
        'objet' => 'Objet',
        'traite' => 'Traité',
        'created_at' => 'Reçu le',
    ];

    protected string $statusField = 'traite';

    protected string $statusType = 'boolean';

    protected function detailFields(Model $item): array
    {
        return [
            ['label' => 'Nom', 'value' => $item->nom],
            ['label' => 'Email', 'value' => $item->email],
            ['label' => 'Objet', 'value' => $item->objet],
            ['label' => 'Message', 'value' => $item->message, 'full' => true],
            ['label' => 'Reçu le', 'value' => $item->created_at->format('d/m/Y à H:i')],
        ];
    }
}
