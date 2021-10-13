<?php

namespace Tests\Unit;

use App\Models\User;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     */
    public function has_projects()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    /** @test */
    public function a_user_has_accessible_projects(){
        $themis = $this->signIn();

        ProjectFactory::ownedBy($themis)->create();

        $this->assertCount(1, $themis->accessibleProjects());

        $sally = User::factory()->create();
        $nick = User::factory()->create();

        $project = tap(ProjectFactory::ownedBy($sally)->create())->invite($nick);

        $this->assertCount(1, $themis->accessibleProjects());

        $project->invite($themis);
        $this->assertCount(2, $themis->accessibleProjects());

    }
}
