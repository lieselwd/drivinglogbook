<?php

namespace App\Models;

use App\Enums\LogbookTypes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property int $user_id
 * @property LogbookTypes $type
 * @property string $name
 * @property string|null $description
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Logbook withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $approvers
 * @property-read int|null $approvers_count
 * @mixin \Eloquent
 */
class Logbook extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'user_id',
        'type',
        'name',
        'description',
        'slug'
    ];

    protected $casts = [
        'type' => LogbookTypes::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function approvers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'logbook_approvers', 'logbook_id', 'user_id');
    }
}
