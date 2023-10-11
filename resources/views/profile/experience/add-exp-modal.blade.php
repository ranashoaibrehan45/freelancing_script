<div class="modal fade" id="modalAddExperience">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <form method="post" action="{{route('user_education.store')}}">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title">Add Work Exprience</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-12 form-label" for="language_id">
                            {{__('Title')}}
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-md-12">
                            <x-text-input type="text" 
                                name="title" 
                                :value="old('title')" 
                                required 
                                autocomplete="title" 
                                placeholder="Ex: Software Engineer" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 form-label" for="language_id">
                            {{__('Company')}}
                            <span class="text-red">*</span>
                        </label>
                        <div class="col-md-12">
                            <x-text-input type="text" 
                                name="title" 
                                :value="old('title')" 
                                required 
                                autocomplete="title" 
                                placeholder="Ex: Software Engineer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="location">
                                    {{__('Location')}}
                                </label>
                                <x-text-input type="text" 
                                    name="location" 
                                    :value="old('location')" 
                                    required 
                                    autocomplete="location" 
                                    placeholder="Ex: London" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="country_id">{{__('Country')}}</label>
                                <select name="country_id" id="country_id" class="form-control select2">
                                    <option>--Select--</option>
                                    @foreach(\App\Models\Country::orderBy('name')->get() as $country)
                                    <option value="{{$country->id}}" @selected($country->id == old('country_id') || $country->id == $user->country_id)>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="continue" class="custom-control-input" value="1">
                                <span class="custom-control-label">I am currently working in this role</span>
                            </label>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <label class="form-label">
                                    {{__('Start Date')}}
                                    <span class="text-red">*</span>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 float-start">
                                    <select name="year_from" id="year_from" class="form-control">
                                        @for($i = 1; $i <= 12; $i++)
                                        <option value="{{$i}}">{{DateTime::createFromFormat('!m', $i)->format('F')}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 float-start">
                                    <select name="year_from" id="year_from" class="form-control" required>
                                        @for($year = intval(date('Y')); $year >= 1950; $year--)
                                        <option value="{{$year}}">{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <label class="form-label">
                                    {{__('End Date')}}
                                    <span class="text-red">*</span>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 float-start">
                                    <select name="year_from" id="year_from" class="form-control">
                                        @for($i = 1; $i <= 12; $i++)
                                        <option value="{{$i}}">{{DateTime::createFromFormat('!m', $i)->format('F')}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6 float-start">
                                    <select name="year_from" id="year_from" class="form-control" required>
                                        @for($year = intval(date('Y')); $year >= 1950; $year--)
                                        <option value="{{$year}}">{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <label class="col-md-12 form-label" for="description">Description (Optional)</label>
                        <div class="col-md-12">
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                        </div>
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