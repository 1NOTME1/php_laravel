<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalEvent extends Model
{
    use HasFactory;

    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

    protected $table = "InternalEvents";
    protected $primaryKey = "Id";

    public function InternalEventsAttachments()
    {
        return $this->hasMany(InternalEventsAttachments::class, "InternalEventId");
    }
}
