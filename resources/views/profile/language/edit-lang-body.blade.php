@foreach(Auth::user()->languages as $obj)
<div class="row mb-3" id="langid-{{$obj->id}}">
    <div class="col-md-5">
        <input type="text" value="{{$obj->language->name}}" class="form-control" disabled="disabled" />
    </div>
    <div class="col-md-5">
        <select name="language_proficiency_id" id="language_proficiency_id" class="form-control">
            @foreach(\App\Models\LanguageProficiency::all() as $prof)
            <option value="{{$prof->id}}" @selected($prof->id == $obj->proficiency->id)>{{$prof->name}}</option>
            @endforeach
        </select>
    </div>
    @if(!$loop->first)
    <div class="col-md-2">
        <button type="button" class="btn btn-icon btn-danger dtnDelLang" data-id="{{$obj->id}}"><i class="fe fe-trash"></i></button>
    </div>
    @endif
</div>
@endforeach