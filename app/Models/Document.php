<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $type
 * @property int $user_id
 * @property string $filename
 * @property string $extension
 * @property int $size
 * @property int $tenant_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Tenant $tenant
 * @method static Builder|Document newModelQuery()
 * @method static Builder|Document newQuery()
 * @method static Builder|Document query()
 * @method static Builder|Document whereCreatedAt($value)
 * @method static Builder|Document whereExtension($value)
 * @method static Builder|Document whereFilename($value)
 * @method static Builder|Document whereId($value)
 * @method static Builder|Document whereSize($value)
 * @method static Builder|Document whereTenantId($value)
 * @method static Builder|Document whereType($value)
 * @method static Builder|Document whereUpdatedAt($value)
 * @method static Builder|Document whereUserId($value)
 * @mixin \Eloquent
 */
class Document extends Model
{
    use HasFactory, BelongsToTenant;

    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
