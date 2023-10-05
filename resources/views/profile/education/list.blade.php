@foreach(Auth::user()->educations as $education)
<div class="row" id="edu-{{$education->id}}">
    <div class="col-md-8">
        <h5 class="font-bold">{{$education->school}}</h5>
        <label class="font-semibold">{{$education->degree->name}}</label>
        <label class="font-semibold">{{$education->study_area}}</label>
        <label class="font-semibold">{{$education->year_from}} - {{$education->year_to}}</label>
    </div>
    <div class="col-md-4">
        <button data-bs-target="#modalEditEdu" data-bs-toggle="modal" type="button" class="btn btn-icon btn-sm btn-success dtnEditEdu" data-id="{{$education->id}}">
            <i class="fe fe-edit"></i>
        </button>
        <button type="button" class="btn btn-icon btn-sm btn-danger ml-1 dtnDelEdu" data-id="{{$education->id}}">
            <i class="fe fe-trash"></i>
        </button>
    </div>
</div>
@endforeach