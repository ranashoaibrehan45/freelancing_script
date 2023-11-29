<div class="modal fade" id="modalProfileSkills" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Skills</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                @php
                $skills = \App\Models\FreelancerSkill::where('user_id', Auth::id())->pluck('skill_id')->toArray();
                @endphp
                <h5>{{__("Your skills show clients what you can offer, and help us choose which jobs to recommend to you. Add or remove the ones we've suggested, start typing to pick more. It's up to you.")}}</h5>
                <a href="#" class="text-primary">{{__('Why choosing carefully matters')}}</a>
                <div class="form-group my-5">
                    <label class="form-label">Skills</label>
                    <select class="form-control select2" id="profileskills" data-placeholder="Enter skills here" multiple>
                        @foreach(\App\Models\Skill::all() as $obj)
                        <option value="{{$obj->id}}" @selected(in_array($obj->id, $skills))>{{$obj->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>