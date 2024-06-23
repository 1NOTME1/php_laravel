@extends("main")

@section("menu")
    <a class="btn btn-primary" href="/internal-events/create">Create new</a>
    <a class="btn btn-primary" href="/internal-events">All</a>
@endsection

@section("content")
    <div class="container">
        <form method="post" action="/internal-events/update/{{ $model->Id }}">
        @csrf
        <div class="row gy-3">
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">label</i>
                        Title
                    </label>
                    <input class="form-control validate" name="Title" value="{{$model->Title}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round align-middle">link</i>
                        Link
                    </label>
                    <input class="form-control validate" name="Link" value="{{$model->Link}}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="row">
                    <div class="col-auto">
                        <label class="form-check-label">
                            Public
                            <i class="material-icons-round align-middle">public</i>
                        </label>
                    </div>
                    <div class="form-switch form-check col-auto">
                        <input class="form-check-input validate" {{ $model->IsPublic ? "checked" : "" }} type="checkbox" name="IsPublic">
                        <label class="form-check-label">
                            <i class="material-icons-round align-middle">block</i>
                            Private
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="row">
                    <div class="col-auto">
                        <label class="form-check-label">
                            Cancelled
                            <i class="material-icons-round align-middle">cancel</i>
                        </label>
                    </div>
                    <div class="form-switch form-check col-auto">
                        <input class="form-check-input validate" {{ $model->IsCancelled ? "checked" : "" }} type="checkbox" name="IsCancelled">

                        <label class="form-check-label">
                            <i class="material-icons-round align-middle">public</i>
                            Active
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round palette-accent-text-color align-middle">event</i>
                        Event date
                    </label>
                    <input class="form-control validate" type="date" name="EventDateTime" value="{{ date('Y-m-d', strtotime($model->EventDateTime)) }}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xxl-4">
                <div class="input-group">
                    <label class="input-group-text">
                        <i class="material-icons-round palette-accent-text-color align-middle">today</i>
                        Publish date
                    </label>
                    <input class="form-control validate" type="date" name="PublishDateTime" value="{{ date('Y-m-d', strtotime($model->PublishDateTime)) }}">
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label">
                    <i class="material-icons-round palette-accent-text-color align-middle">description</i>
                    Short description
                </label>
                <textarea class="form-control validate" name="ShortDescription">{{$model->ShortDescription}}</textarea>
            </div>
            <div class="col-sm-12">
                <label class="form-label">
                    <i class="material-icons-round palette-accent-text-color align-middle">newspaper</i>
                    Content
                </label>
                <textarea class="form-control validate" name="ContentHTML">{{$model->ContentHTML}}</textarea>
            </div>
            <div class="col-sm-12">
                <label class="form-label">
                    <i class="material-icons-round palette-accent-text-color align-middle">feed</i>
                    Meta description
                </label>
                <textarea class="form-control validate" name="MetaDescription">{{$model->MetaDescription}}</textarea>
            </div>
            <div class="col-sm-12">
                <label class="form-label">
                    <i class="material-icons-round palette-accent-text-color align-middle">subtitles</i>
                    Meta tags
                </label>
                <textarea class="form-control validate" name="MetaTags">{{$model->MetaTags}}</textarea>
            </div>
            <div class="col-sm-12">
                <label class="form-label">
                    <i class="material-icons-round palette-accent-text-color align-middle">notes</i>
                    Notes
                </label>
                <textarea class="form-control validate" name="Notes">{{$model->Notes}}</textarea>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>
@endsection
