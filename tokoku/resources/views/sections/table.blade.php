@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<button style="margin: 5px;" class="btn btn-danger btn-xs delete-all">Delete All</button>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="check_all"></th>
            <th>Section Name</th>
            <th>Section Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($sections->count())
        @foreach ($sections as $key => $section)
        <tr id="tr_{{$section->id}}">
            <td><input type="checkbox" class="checkbox" data-id="{{$section->id}}"></td>
            <td>{{$section->section_name}}</td>
            <td>{{$section->status==1?'Enable':'Disabled'}}</td>
            <td>
                <div class="btn-group">
                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editsection{{$section->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletesection{{$section->id}}"> <i class=" fa fa-trash"></i>Delete</a>
                </div>
            </td>
        </tr>
        <!-- Modal of Edit section-->
        @include('sections.edit')
        <!-- Modal of Delete section-->
        @include('sections.delete')
        @endforeach
        @endif
    </tbody>
</table>