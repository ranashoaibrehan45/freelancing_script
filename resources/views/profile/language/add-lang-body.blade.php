<form class="addlangform">
    <hr>
    <div class="row">
        <div class="col-md-5">
            <select class="search-box language_id">
                <option value="">I know</option>
                @foreach(\App\Models\Language::dropdown() as $obj)
                <option value="{{$obj->id}}">{{$obj->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <select class="form-select language_proficiency">
                <option value="">My level is</option>
                @foreach(\App\Models\LanguageProficiency::all() as $obj)
                <option value="{{$obj->id}}">{{$obj->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn bg-danger-transparent btn_del_lang"><i class="fe fe-trash"></i></button>
        </div>
    </div>
</form>
<script src="{{url('assets/js/formelementadvnced.js')}}"></script>