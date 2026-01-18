<?php

namespace App\Models;

use App\Data\RegistrationData;
use App\Enums\TransmissionTypes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property \Spatie\LaravelData\Contracts\BaseData|\Spatie\LaravelData\Contracts\TransformableData $registration
 * @property array<array-key, mixed>|null $registration_history
 * @property string|null $vin
 * @property string|null $model_year
 * @property string $make
 * @property string $model
 * @property string $nickname
 * @property int $user_id
 * @property TransmissionTypes|null $transmission
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LogbookEntry> $logbookEntries
 * @property-read int|null $logbook_entries_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereMake($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereModelYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereRegistrationHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereTransmission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereVin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle withoutTrashed()
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'registration',
        'registration_history',
        'vin',
        'model_year',
        'make',
        'model',
        'nickname',
        'user_id',
        'transmission',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function logbookEntries(): HasMany
    {
        return $this->hasMany(LogbookEntry::class);
    }

    protected function casts(): array
    {
        return [
            'registration' => RegistrationData::class,
            'registration_history' => 'array',
            'transmission' => TransmissionTypes::class
        ];
    }

    public function getFriendlyName(): string
    {
        return "{$this->model_year} {$this->make} {$this->model} {$this->transmission?->friendlyName()}";
    }
}
