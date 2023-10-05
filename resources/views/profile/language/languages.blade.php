<div class="table-responsive">
    <table class="table table-bordered mb-0">
        @foreach(Auth::user()->languages as $obj)
            <tr>
                <td>
                    <label class="form-label">{{$obj->language->name}}</label>
                </td>
                <td>
                    <label class="form-label">{{$obj->proficiency->name}}</label>
                </td>
            </tr>
        @endforeach
    </table>
</div>
