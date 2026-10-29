<?php

namespace Tests\Feature;

use App\Models\MediationEtablissement;
use App\Models\MediationKpi;
use App\Models\MediationRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MediationPortalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed basic required data for testing
        MediationEtablissement::create([
            'categorie' => '1- Établissements de crédits',
            'nom' => 'BGFI Bank Gabon',
            'sigle' => 'BGFIBank',
            'actif' => true,
            'ordre' => 1,
        ]);

        MediationKpi::create([
            'libelle' => 'Taux d’accord amiable',
            'valeur' => '88%',
            'sous_texte' => 'Résolution amiable obtenue',
            'ordre' => 1,
        ]);

    }

    public function test_homepage_is_accessible_and_renders_b1_accueil(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Médiation');
        $response->assertSee('Portail CNEF');
    }

    public function test_presentation_page_renders_b2_presentation(): void
    {
        $response = $this->get('/presentation');

        $response->assertStatus(200);
        $response->assertSee('Fondement');
        $response->assertSee('Médiateur Financier');
    }

    public function test_recours_page_renders_b3_recours_and_grouped_institutions(): void
    {
        $response = $this->get('/recours-a-la-mediation');

        $response->assertStatus(200);
        $response->assertSee('Saisine du Médiateur');
        $response->assertSee('Voies de saisine');
        $response->assertSee('Formulaire');
        $response->assertSee('BGFI Bank Gabon');
        $response->assertSee('Foire aux questions');
    }

    public function test_adherents_page_renders_b4_etablissements(): void
    {
        $response = $this->get('/etablissements-adherents');

        $response->assertStatus(200);
        $response->assertSee('Établissements adhérents');
        $response->assertSee('Branche 1');
        $response->assertSee('BGFI Bank Gabon');
    }

    public function test_fonds_documentaire_renders_b5(): void
    {
        $response = $this->get('/fonds-documentaire');

        $response->assertStatus(200);
        $response->assertSee('Fonds documentaire');
        $response->assertSee('Rapports');
    }

    public function test_contacts_utiles_renders_b6(): void
    {
        $response = $this->get('/contacts-utiles');

        $response->assertStatus(200);
        $response->assertSee('Contacts utiles');
        $response->assertSee('BEAC');
        $response->assertSee('mediation@cnef.ga');
    }

    public function test_suivi_and_candidature_pages_render(): void
    {
        $this->get('/suivi')->assertStatus(200);
        $this->get('/candidature')->assertStatus(200);
        $this->get('/actualites')->assertStatus(200);
        $this->get('/activites')->assertStatus(200);
    }

    public function test_saisine_submission_generates_mf_code_and_can_be_tracked(): void
    {
        Mail::fake();

        $payload = [
            'prenom' => 'Jean-Pierre',
            'nom' => 'Mba',
            'email' => 'jeanpierre.mba@example.ga',
            'telephone' => '+241 77 12 34 56',
            'etablissement' => 'BGFI Bank Gabon',
            'nature_litige' => 'Frais bancaires non justifiés',
            'description' => 'Prélèvement anormal constaté sur mon relevé de compte de septembre 2026.',
        ];

        $response = $this->post('/saisine', $payload);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('mediation_requests', [
            'email' => 'jeanpierre.mba@example.ga',
            'etablissement' => 'BGFI Bank Gabon',
            'statut' => 'nouveau',
        ]);

        $request = MediationRequest::where('email', 'jeanpierre.mba@example.ga')->first();
        $this->assertNotNull($request);
        $this->assertStringStartsWith('MF-', $request->reference);

        // Suivi du dossier
        $suiviResponse = $this->get('/suivi?reference='.$request->reference);
        $suiviResponse->assertStatus(200);
        $suiviResponse->assertSee($request->reference);
        $suiviResponse->assertSee('Jean-Pierre');
    }

    public function test_chatbot_responds_to_mediation_queries(): void
    {
        $response = $this->postJson('/assistant/message', [
            'message' => 'Comment suivre mon dossier avec mon code confidentiel ?',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['answer', 'action' => ['label', 'url']]);
        $response->assertJsonFragment(['label' => 'Suivre mon dossier']);
    }

    public function test_admin_authentication_and_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Secrétaire Général',
            'email' => 'admin@cnef.ga',
            'password' => Hash::make('SecretPassword123!'),
        ]);

        // Non authentifié -> redirigé vers login
        $this->get('/admin')->assertRedirect('/admin/login');

        // Login
        $loginResponse = $this->post('/admin/login', [
            'email' => 'admin@cnef.ga',
            'password' => 'SecretPassword123!',
        ]);
        $loginResponse->assertRedirect('/admin');

        // Dashboard accessible
        $dashResponse = $this->actingAs($admin)->get('/admin');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('Tableau de bord');
        $dashResponse->assertSee('Saisines');

        // Gestion des saisines
        $saisinesResponse = $this->actingAs($admin)->get('/admin/mediation-requests');
        $saisinesResponse->assertStatus(200);
    }
}
