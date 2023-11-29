<div class="modal fade" id="modalProfileRate">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Overview</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="profileRateForm">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{__("Clients will see this rate on your profile and in search results once you publish your profile. You can adjust your rate every time you submit a proposal.")}}</h5>
                            <div class="form-group row mt-5">
                                <label for="inputName" class="col-md-8 form-label">
                                    <h3>{{__('Hourly rate')}}</h3>
                                    <p>{{__('Total amount the client will see')}}</p>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">{{__('$')}}</span>
                                        <input type="number" id="profilerate" value="{{Auth::user()->freelancer->rate}}" class="form-control" required="">
                                        <span class="input-group-text">{{__('/ hr')}}</span>
                                      </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row mt-5">
                                <label for="inputName" class="col-md-8 form-label">
                                    <strong>{{__('Service Fee')}}</strong>
                                    <a href="#" class="text-primary">{{__('Learn more')}}</a>
                                    <p>{{__("This helps us run the plateform and provide services like payment protection and customer support.")}}</p>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">{{__('$')}}</span>
                                        <input type="text" class="form-control" id="servicefee" readonly>
                                        <span class="input-group-text">{{__('/ hr')}}</span>
                                      </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row mt-5">
                                <label for="inputName" class="col-md-8 form-label">
                                    <strong>{{__('You will get')}}</strong>
                                    <p>{{__("The estimated amount you'll receive after service fees.")}}</p>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">{{__('$')}}</span>
                                        <input type="text" class="form-control" id="youget" readonly>
                                        <span class="input-group-text">{{__('/ hr')}}</span>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">{{__('Save')}}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>