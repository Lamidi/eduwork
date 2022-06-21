<div class="col-md-4 col-sm 4">
    @if(count($checked)>1)
    <a href="#" class="btn btn-outline btn-sm" wire:click.prevent="confirmbulkdelete">
        ({{count($checked)}} Row Selected to <b>Delete</b> )
    </a>
    @endif
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><input class="h-5 w-5" type="checkbox" wire:model="selectall"></th>
            <th>Section Name</th>
            <th>Section Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sections as $key => $section)
        <tr>
            <td><input value="{{$section->id}}" wire:model="checked" class="h-5 w-5" type="checkbox"></td>
            <!-- <td>{{$key+1}}</td> -->
            <td>{{$section->section_name}}</td>
            <td>{{$section->status==1?'Enable':'Disabled'}}</td>
            <td>
                <div class="btn-group">
                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editsection{{$section->id}}"> <i class=" fa fa-edit"></i>Edit</a>
                    @if (count($checked)<2) <a href="#" wire:click.prevent="confirmdelete({{$section->id}}, '{{$section->section_name}}')" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"> <i class=" fa fa-trash"></i>Delete</a>
                        @endif
                </div>
            </td>
        </tr>
        <!-- Modal of Edit section-->
        @include('sections.edit')
        <!-- Modal of Delete section-->
        @include('sections.delete')
        @endforeach
    </tbody>
</table>