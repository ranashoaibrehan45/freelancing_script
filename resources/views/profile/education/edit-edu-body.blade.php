<div class="modal-header">
    <h6 class="modal-title">Edit Education</h6>
    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row">
        <label class="col-md-12 form-label" for="language_id">School</label>
        <div class="col-md-12">
            <select name="school" id="edit_edu_school" class="search-box" required>
                @foreach(\App\Models\School::orderBy('name')->get() as $obj)
                <option value="{{$obj->name}}" @selected($obj->name == $userEdu->school)>{{$obj->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-12 form-label" for="language_id">Dates Attended</label>
        <div class="col-md-6">
            <select name="year_from" id="edit_edu_year_from" class="search-box" required>
                @for($year = intval(date('Y')); $year >= 1950; $year--)
                <option value="{{$year}}" @selected($year == $userEdu->year_from)>{{$year}}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-6">
            <select name="year_to" id="edit_edu_year_to" class="search-box" required>
                @for($year = date('Y'); $year >= 1950; $year--)
                <option value="{{$year}}" @selected($year == $userEdu->year_to)>{{$year}}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12 form-label" for="degree_id">Degree</label>
        <div class="col-md-12">
            <select name="degree_id" id="edit_edu_degree_id" class="search-box" required>
                @foreach(\App\Models\Degree::orderBy('name')->get() as $obj)
                <option value="{{$obj->id}}" @selected($obj->id == $userEdu->degree_id)>{{$obj->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12 form-label" for="study_area">Area of Study (Optional)</label>
        <div class="col-md-12">
            <select name="study_area" id="edit_edu_study_area" class="search-box">
                @foreach(\App\Models\StudyArea::orderBy('name')->get() as $obj)
                <option value="{{$obj->name}}" @selected($obj->name == $userEdu->study_area)>{{$obj->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12 form-label" for="description">Description (Optional)</label>
        <div class="col-md-12">
            <textarea name="description" id="edit_edu_description" cols="30" rows="5" class="form-control">{{$userEdu->description}}</textarea>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary" id="updateEduBtn" data-id="{{$userEdu->id}}">Save changes</button>
    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
</div>

<script src="{{url('assets/js/formelementadvnced.js')}}"></script>