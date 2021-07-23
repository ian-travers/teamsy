<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Login
 *
 * @property int $id
 * @property int $user_id
 * @property int $tenant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tenant $tenant
 * @method static \Database\Factories\LoginFactory factory(...$parameters)
 * @method static Builder|Login newModelQuery()
 * @method static Builder|Login newQuery()
 * @method static Builder|Login query()
 * @method static Builder|Login whereCreatedAt($value)
 * @method static Builder|Login whereId($value)
 * @method static Builder|Login whereTenantId($value)
 * @method static Builder|Login whereUpdatedAt($value)
 * @method static Builder|Login whereUserId($value)
 * @mixin \Eloquent
 */
class Login extends Model
{
    use HasFactory, BelongsToTenant;

    protected $guarded = [];
}
