<div class="modal fade" id="modalEditLanguages">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form id="addLangForm">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Edit Languages</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <h3>Language</h3>
                        </div>
                        <div class="col-md-5">
                            <h3>Proficiency Level</h3>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
                    <div id="editLangBody"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>