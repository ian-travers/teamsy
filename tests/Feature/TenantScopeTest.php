<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_model_has_a_tenant_id_on_the_migration()
    {
        $now = now();

        $this->artisan('make:model Test -m');

        $filename = database_path('migrations/' . $now->format('Y_m_d_His') . '_create_tests_table.php');

        $this->assertTrue(File::exists($filename));
        $this->assertStringContainsString('$table->unsignedBigInteger(\'tenant_id\')->index();', File::get($filename));

        File::delete($filename);
        File::delete(app_path('Models/Test.php'));
    }

    /** @test */
    function a_user_can_only_see_users_in_the_same_tenant()
    {
        /** @var Tenant $tenant1 */
        $tenant1 = Tenant::factory()->create();
        /** @var Tenant $tenant2 */
        $tenant2 = Tenant::factory()->create();

        /** @var User $user1 */
        $user1 = User::factory()->create([
            'tenant_id' => $tenant1->id,
        ]);

        User::factory(2)->create([
            'tenant_id' => $tenant1->id,
        ]);

        User::factory(3)->create([
            'tenant_id' => $tenant2->id,
        ]);

        auth()->login($user1);

        $this->assertEquals(3, User::count());
    }

    /** @test */
    function a_user_can_only_create_a_user_in_his_tenant()
    {
        /** @var Tenant $tenant1 */
        $tenant1 = Tenant::factory()->create();

        /** @var User $user1 */
        $user1 = User::factory()->create([
            'tenant_id' => $tenant1->id,
        ]);

        auth()->login($user1);

        /** @var User $createdUser */
        $createdUser = User::factory()->create();

        $this->assertTrue($createdUser->tenant_id == $user1->tenant_id);
    }

    /** @test */
    function a_user_can_only_create_a_user_in_his_tenant_even_if_other_tenant_is_provided()
    {
        /** @var Tenant $tenant1 */
        $tenant1 = Tenant::factory()->create();
        /** @var Tenant $tenant2 */
        $tenant2 = Tenant::factory()->create();

        /** @var User $user1 */
        $user1 = User::factory()->create([
            'tenant_id' => $tenant1->id,
        ]);

        auth()->login($user1);

        /** @var User $createdUser */
        $createdUser = User::factory()->make();
        $createdUser->tenant_id = $tenant2->id;
        $createdUser->save();

        $this->assertTrue($createdUser->tenant_id == $user1->tenant_id);
    }
}
