<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InternalEvent;
use App\Models\Attachment;
use App\Models\InternalEventsAttachments;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class InternalEventsController extends Controller
{
    public function index(): View
{
    $models = InternalEvent::where('IsActive', true)->get();
    return view("internalEvents.index", ["models" => $models]);
}


    public function create(): View
    {
        $model = new InternalEvent();
        $model->PublishDateTime = date("Y-m-d");
        $model->EventDateTime = date("Y-m-d");

        return view("internalEvents.create", ["model" => $model]);
    }

    public function edit(int $id): View
    {
        $model = InternalEvent::find($id);
        return view("internalEvents.edit", ["model" => $model]);
    }

    public function addToDb(Request $request): RedirectResponse
    {
        $model = new InternalEvent();
        $model->Title = $request->input("Title");
        $model->Link = $request->input("Link");
        $model->ShortDescription = $request->input("ShortDescription");
        $model->ContentHTML = $request->input("ContentHTML");
        $model->MetaTags = $request->input("MetaTags");
        $model->MetaDescription = $request->input("MetaDescription");
        $model->Notes = $request->input("Notes");
        $model->EventDateTime = $request->input("EventDateTime");
        $model->PublishDateTime = $request->input("PublishDateTime");
        $model->IsPublic = $request->input("IsPublic") ? true : false;
        $model->IsCancelled = $request->input("IsCancelled") ? true : false;
        $model->IsActive = true;
        $model->save();

        return redirect('/internal-events');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $model = InternalEvent::find($id);
        $model->Title = $request->input("Title");
        $model->Link = $request->input("Link");
        $model->ShortDescription = $request->input("ShortDescription");
        $model->ContentHTML = $request->input("ContentHTML");
        $model->MetaTags = $request->input("MetaTags");
        $model->MetaDescription = $request->input("MetaDescription");
        $model->Notes = $request->input("Notes");
        $model->EventDateTime = $request->input("EventDateTime");
        $model->PublishDateTime = $request->input("PublishDateTime");
        $model->IsPublic = $request->input("IsPublic") ? true : false;
        $model->IsCancelled = $request->input("IsCancelled") ? true : false;
        $model->save();

        return redirect('/internal-events');
    }

    public function delete($id): RedirectResponse {
        $model = InternalEvent::find($id);
            $model->IsActive = false;
            $model->save();

        return redirect("/internal-events");
    }

    public function addAttachment($id): View
    {
        $model = new InternalEventsAttachments();
        $model->InternalEventId = $id;
        $attachments = Attachment::all();
        return view("internalEvents.addAttachment", ["model" => $model, "attachments" => $attachments]);
    }

    public function addAttachmentToDB($id, Request $request): RedirectResponse
    {
        $model = new InternalEventsAttachments();
        $model->InternalEventId = $id;
        $model->Title = $request->input("Title");
        $model->AttachmentId = $request->input("AttachmentId");
        $model->IsPinned = $request->input("IsPinned") ? true : false;
        $model->Notes = $request->input("Notes");
        $model->IsActive = true;
        $model->save();
        return redirect("internal-events");
    }
}
