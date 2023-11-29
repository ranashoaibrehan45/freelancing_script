<div class="modal fade" id="modalProfileTitle">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Set Profile Title</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('freelancer.profile.title')}}" id="profileTitleForm">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h5>Its the very first thing clients see, so make it count. Stand out by describing your experties in your own words.</h5>
                            <div class="form-group  my-5">
                                <label for="title" class="form-label">{{__('Your professional role')}}</label>
                                <x-text-input type="text" id="profiletitle" value="{{old('title') ?? Auth::user()->freelancer->title ?? ''}}" required placeholder="Software engineer | Javascript | iOS" />
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>