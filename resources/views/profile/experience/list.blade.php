@foreach(Auth::user()->experiences as $experience)
    <div class="col-md-12 col-sm-12" id="exp-{{$experience->id}}">
        <div class="col-md-8">
            <h5 class="font-bold">{{$experience->title}}</h5>
        </div>
        <div class="col-md-4">
            <button data-bs-target="#modalEditExp" data-bs-toggle="modal" type="button" class="btn btn-icon btn-sm btn-success dtnEditExp" data-id="{{$experience->id}}">
                <i class="fe fe-edit"></i>
            </button>
            <button type="button" class="btn btn-icon btn-sm btn-danger ml-1 dtnDelExp" data-id="{{$experience->id}}">
                <i class="fe fe-trash"></i>
            </button>
        </div>
        <div class="col-md-12 my-3">
            <label class="font-semibold">
                {{$experience->company}} | 
                {{date("F", mktime(0, 0, 0, $experience->start_month, 1))}} {{$experience->start_year}} - 
                @if ($experience->continue)
                Present
                @else
                {{date("F", mktime(0, 0, 0, $experience->end_month, 1))}} {{$experience->end_year}}
                @endif
            </label>
            @if ($experience->location)
            <label class="font-semibold">{{$experience->location}}</label>
            @endif

            @if ($experience->country_id)
            <label class="font-semibold">{{$experience->country->name}}</label>
            @endif

            @if ($experience->description)
            <label class="font-semibold">{{Str::words($experience->description, 15)}}</label>
            @endif
        </div>
    </div>
    @if (!$loop->last)
    <hr>
    @endif
@endforeach