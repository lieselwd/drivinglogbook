<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $logbook_entry_id
 * @property int $user_id
 * @property bool $approved
 * @property string|null $comments
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $approver
 * @property-read \App\Models\LogbookEntry $logbookEntry
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereLogbookEntryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EntryApproval withoutTrashed()
 * @mixin \Eloquent
 */
class EntryApproval extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'logbook_entry_id',
        'user_id',
        'approved',
        'comments'
    ];

    public function logbookEntry(): BelongsTo
    {
        return $this->belongsTo(LogbookEntry::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
