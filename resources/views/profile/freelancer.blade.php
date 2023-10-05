<div class="card">
    <div class="card-header ">
        <div class="card-title">{{__('Freelancer Profile')}}</div>
    </div>
    <div class="card-body">
        @include('partial.validation-errors')
        <div class="card-title font-weight-bold">{{__('Basic info:')}}</div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="form-label">{{__('Visibility')}}</label>
                    <select name="visibility" id="country_id" class="form-control select2">
                        <option>--Select--</option>
                        <option value="Public">{{__('Public')}}</option>
                        <option value="Users">Only {{config('app.name')}} users</option>
                        <option value="Private">{{__('Private')}}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="form-label">{{__('Project preference')}}</label>
                    <select name="project_preference" id="country_id" class="form-control select2">
                        <option>{{__('--Select--')}}</option>
                        <option value="Both">{{__('Both short-term and long-term projects')}}</option>
                        <option value="Long term">{{('Long term projects (3+ months)')}}</option>
                        <option value="Short term">{{('Short term projects (Less than 3 months)')}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-success">Updated</button>
        <a href="{{route('profile.show')}}" class="btn btn-danger">Cancel</a>
    </div>
</div>
        