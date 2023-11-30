<div class="card-body">
    <h1>
        <span id="profileTitle">{{__($user->freelancer->title)}}</span>
        <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileTitle" data-bs-toggle="modal">
            <i class="fe fe-edit"></i>
        </button>
    </h1>
    <div class="row border p-2">
        <div class="col-md-11 text-wrap">
            <p class="text-justify">
                <span id="profileBio">{!! $user->freelancer->bio !!}</span>
            </p>
            <p class="font-weight-bold">
                $<span id="profileRate">{{$user->freelancer->getRate()}}</span>
                <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileRate" data-bs-toggle="modal">
                    <i class="fe fe-edit"></i>
                </button>
                <br>
                <span class="fs-10 font-weight-normal">Hourly rate</span>
            </p>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileBio" data-bs-toggle="modal">
                <i class="fe fe-edit"></i>
            </button>
        </div>
    </div>

    <div class="row border p-2 mt-4">
        <div class="col-md-11 text-wrap">
            <h3>Skills</h3>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalProfileSkills" data-bs-toggle="modal">
                <i class="fe fe-edit"></i>
            </button>
        </div>
        <div class="col-md-12">
            <div class="tags" id="profileSkills">
                @foreach ($user->skills as $skill)
                    <span class="tag">{{__($skill->skill->name)}}</span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row border p-2 mt-4">
        <div class="col-md-11 text-wrap">
            <h3>Work history</h3>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn bg-primary-transparent btn-sm" data-bs-target="#modalAddExperience" data-bs-toggle="modal">
                <i class="fe fe-plus"></i>
            </button>
        </div>
        <div class="col-md-12">
            <div class="row my-5" id="exp_container"></div>
        </div>
    </div>
</div>

@include('profile.language.add-language')
@include('profile.language.edit-languages')
@include('profile.experience.add-exp-modal')
@include('profile.experience.edit-exp-modal')
@include('profile.components.set-title-modal')
@include('profile.components.set-bio-modal')
@include('profile.components.set-rate-modal')
@include('profile.components.set-skills-modal')