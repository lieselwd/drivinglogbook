<?php

namespace App\Models;

use App\Data\LocationData;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property array<array-key, mixed> $start_location
 * @property array<array-key, mixed> $finish_location
 * @property \Illuminate\Support\Carbon $start_datetime
 * @property \Illuminate\Support\Carbon $end_datetime
 * @property string|null $description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereFinishLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereStartLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LogbookEntry withoutTrashed()
 * @mixin \Eloquent
 */
class LogbookEntry extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'start_location',
        'finish_location',
        'start_datetime',
        'end_datetime',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'start_location' => LocationData::class,
            'finish_location' => LocationData::class,
            'start_datetime' => 'datetime',
            'end_datetime' => 'datetime',
        ];
    }
}
