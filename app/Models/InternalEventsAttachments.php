<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalEventsAttachments extends Model
{
    use HasFactory;

    protected $table = "InternalEventsAttachments";
    protected $primaryKey = "Id";

    const CREATED_AT = 'CreationDateTime';
    const UPDATED_AT = 'EditDateTime';

    public function Attachment()
    {
        return $this->belongsTo(Attachment::class, "AttachmentId");
    }

    public function InternalEvent()
    {
        return $this->belongsTo(InternalEvent::class, "InternalEventId");
    }
}
