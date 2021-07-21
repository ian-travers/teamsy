<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Phone
 *
 * @property int $id
 * @property int $tenant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tenant $tenant
 * @method static \Database\Factories\PhoneFactory factory(...$parameters)
 * @method static Builder|Phone newModelQuery()
 * @method static Builder|Phone newQuery()
 * @method static Builder|Phone query()
 * @method static Builder|Phone whereCreatedAt($value)
 * @method static Builder|Phone whereId($value)
 * @method static Builder|Phone whereTenantId($value)
 * @method static Builder|Phone whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Phone extends Model
{
    use HasFactory, BelongsToTenant;

    protected $guarded = [];
}
