<div class="modal fade" id="addteammember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add team member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('SupUser.OurTeamInsert') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control">
                        <div class="text-danger">
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-danger">Select Department <b>*</b></label>
                        <select name="department" class="form-control" id="department">
                            <option value="{{ _('0') }}" selected>Select Department</option>
                            @foreach ($empSectionCategory as $key => $EmpSectionCat)
                                <option value="{{ $EmpSectionCat->team_department_slug }}">{{ $EmpSectionCat->team_department }}</option>
                            @endforeach
                            
                        </select>
                        <div class="text-danger">
                            @error('department')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="text-danger">Select Degination <b>*</b></label>
                        <select name="degination" class="form-control" id="degination">
                            <option value="{{ _('0') }}" selected>Select Degination</option>
                            @foreach ($empDeginationCategory as $key => $empDegination)
                                <option value="{{ $empDegination->team_department_sub }}">{{ $empDegination->team_department_sub }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('degination')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Member Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" name="email" class="form-control">
                        <div class="text-danger">
                            @error('email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Member Mobile <span class="text-danger">*</span></label>
                        <input type="text" name="mobile" value="{{ old('mobile') }}" id="mobile" class="form-control">
                        <div class="text-danger">
                            @error('mobile')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Member WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" id="whatsapp" class="form-control">
                        <div class="text-danger">
                            @error('whatsapp')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Member Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control">
                        <div class="text-danger">
                            @error('image')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group float-right mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert Member</button>
                    </div>
                    <div class="form-group pt-3"></div>
                </div>
            </form>

            

        </div>
    </div>
</div>
