<?php

namespace Tests\Feature;

use App\Http\Controllers\ProjectsTaskController;
use Tests\TestCase;
use App\Models\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function non_owners_may_not_invite_users(){
        $project = ProjectFactory::create();

        $user = User::factory()->create();

        $assertInvitationForbidden = function () use ($user, $project) {
            $this->actingAs($user)
                ->post($project->path() . '/invitations')
                ->assertStatus(403);
        };

        $assertInvitationForbidden();

        $project->invite($user);

        $assertInvitationForbidden();


    }

    /** @test */
    public function the_email_address_must_be_associated_with_a_valid_birdboard_account(){
        // $this->withoutExceptionHandling();
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)
            ->post($project->path() . '/invitations', [
                'email' => 'noemail@example.com'
            ])
            ->assertSessionHasErrors([
                'email' => 'The user you are inviting must have a birdboard account!'
            ], null, 'invitations');
    }

    /** @test */
    public function a_project_owner_can_invite_a_user(){

        $project = ProjectFactory::create();

        $userToInvite = User::factory()->create();

        $this->actingAs($project->owner)->post($project->path() . '/invitations', [
            'email' => $userToInvite->email
        ])->assertRedirect($project->path());

        $this->assertTrue($project->members->contains($userToInvite));
    }

    /** @test */
    public function invited_users_may_update_project_details(){
        $project = ProjectFactory::create();

        $project->invite($newUser = User::factory()->create());

        $this->signIn($newUser);
        $this->post(action([ProjectsTaskController::class, 'store'], $project), $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }
}