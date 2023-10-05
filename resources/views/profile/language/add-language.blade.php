<div class="modal fade" id="modalAddLanguage">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <form id="addLangForm">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Add language</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-12 form-label" for="language_id">Language:</label>
                        <div class="col-md-12">
                            <select name="language_id" id="language_id" class="search-box">
                                @foreach(\App\Models\Language::dropdown() as $obj)
                                <option value="{{$obj->id}}">{{$obj->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="language_proficiency_id" class="form-label">Proficiency level</label>
                        <select name="language_proficiency_id" id="language_proficiency_id" class="form-control">
                            @foreach(\App\Models\LanguageProficiency::all() as $obj)
                            <option value="{{$obj->id}}">{{$obj->name}}</option>
                            @endforeach
                        </select>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>