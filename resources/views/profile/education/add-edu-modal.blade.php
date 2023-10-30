<div class="modal fade" id="modalAddEdu">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Add education</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-12 form-label" for="add_edu_school">School</label>
                    <div class="col-md-12">
                        <select name="school" id="add_edu_school" class="search-box" required>
                            @foreach(\App\Models\School::orderBy('name')->get() as $obj)
                            <option value="{{$obj->name}}">{{$obj->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-12 form-label">Dates Attended</label>
                    <div class="col-md-6">
                        <select name="year_from" id="add_edu_year_from" class="search-box" required>
                            @for($year = intval(date('Y')); $year >= 1950; $year--)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="year_to" id="add_edu_year_to" class="search-box" required>
                            @for($year = date('Y'); $year >= 1950; $year--)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 form-label" for="add_edu_degree_id">Degree</label>
                    <div class="col-md-12">
                        <select name="degree_id" id="add_edu_degree_id" class="search-box" required>
                            @foreach(\App\Models\Degree::orderBy('name')->get() as $obj)
                            <option value="{{$obj->id}}">{{$obj->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 form-label" for="add_edu_study_area">Area of Study (Optional)</label>
                    <div class="col-md-12">
                        <select name="study_area" id="add_edu_study_area" class="search-box">
                            @foreach(\App\Models\StudyArea::orderBy('name')->get() as $obj)
                            <option value="{{$obj->name}}">{{$obj->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-12 form-label" for="add_edu_description">Description (Optional)</label>
                    <div class="col-md-12">
                        <textarea name="description" id="add_edu_description" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="addEduBtn">Save changes</button>
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>