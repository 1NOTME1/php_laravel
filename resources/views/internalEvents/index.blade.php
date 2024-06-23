@extends("main")

@section("menu")
    <a class="btn btn-primary" href="/internal-events/create">Create new</a>
    <a class="btn btn-primary" href="/internal-events">All</a>
@endsection

@section("content")
    <div class="container">
        <div class="row gy-3">
            @foreach($models as $model)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title h5">{{ $model->Title }}</p>
                        <p><strong>{{ $model->ShortDescription }}</strong></p>
                        <p>{!! $model->ContentHTML !!}</p>
                        <div>
                            @foreach($model->InternalEventsAttachments as $item)
                                <div class="badge {{$item->IsPinned ? 'bg-primary' : 'bg-secondary'}}">
                                    {{$item->Attachment->Title}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="/internal-events/edit/{{ $model->Id }}">Edit</a>
                        <a class="btn btn-danger" href="/internal-events/delete/{{ $model->Id }}">Delete</a>
                        <a class="btn btn-secondary" href="/internal-events/add-attachment/{{$model->Id}}">Add Attachment</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
