<div class="modal fade" id="modalProfileBio">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Overview</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="profileBioForm">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{__("Help people get to know you at a glance. What work do you do best? Tell them clearly, using photographes or bullet points. You can always edit later; just make sure you proofread now.")}}</h5>
                            <div class="form-group my-5">
                                <textarea id="profileBioText" rows="5" placeholder="{{__('Enter your top skills, experiences, and interests. This is one of the first things clients will see on your profile.')}}" class="form-control">{{Auth::user()->freelancer->bio}}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>