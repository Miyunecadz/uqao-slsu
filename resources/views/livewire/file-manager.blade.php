<div class="mt-3 container">
    <div class="d-flex">
        <div class="me-auto">
            <small>Current Directory</small>
            <h6 class="fs-5">{{$currentDirectory == 'public' ? 'Root Folder' : basename($currentDirectory) . " Folder"}}
            </h6>
        </div>
        <div>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-search-file-directory">Search</button>
            <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-upload-file"
                data-backdrop="static" data-keyboard="false">Upload File</a>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-directory"
                data-backdrop="static" data-keyboard="false">New Directory</a>
        </div>
    </div>


    <div class=" row">

        <div class="row row-cols-1 row-cols-md-4 g-4 mb-5 accordion" id="accordionThings">

            @if ($currentDirectory !== 'public')

            <div class="col">
                <div class="card h-100">
                    <div class="card-body" style="cursor: pointer">
                        <h5 class="card-title mb-0 stretched-link" wire:click="setDirectory('{{$previousDirectory}}')">
                            Go Back</h5>
                    </div>
                </div>
            </div>
            @endif

            @foreach ($directories as $key => $directory)
            <div class="col">
                <div class="card h-100">
                    <div class="card-header d-flex">
                        <div>
                            Folder
                        </div>
                        <div class="ms-auto">
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#card_{{$key}}" aria-expanded="true"
                                aria-controls="card_{{$key}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="cursor: pointer" wire:click="setDirectory('{{$directory}}')">
                        <h5 class="card-title mb-0" @if ($directory == $selected && !$selected == "") style="background: #FFC107; color: #ffffff;" @endif>{{basename($directory)}}</h5>
                    </div>
                    <div id="card_{{$key}}" class="accordion-collapse collapse card-body pt-0"
                        aria-labelledby="card_{{$key}}" data-bs-parent="#accordionThings">
                        <hr>
                        <a class="card-link text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete"
                            data-backdrop="static" data-keyboard="false"
                            wire:click="deleteState('{{$directory}}', 'directory')">Delete</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-lg-5 col-sm-6">
            <div class="icon-card mb-30 w-100">
                <div class="d-flex  w-100">
                    <div class="icon purple flex-fill" wire:click="setDirectory('{{$directory}}')"
            style="height: 3.2rem;cursor: pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder2"
                viewBox="0 0 16 16">
                <path
                    d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z" />
            </svg>
        </div>
        <div class="d-flex flex-column flex-fill">
            <div class="d-flex justify-content-end">
                <div class="dropdown">
                    <a class="dropdown" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-three-dots" viewBox="0 0 16 16">
                            <path
                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                        </svg>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                data-backdrop="static" data-keyboard="false"
                                wire:click="deleteState('{{$directory}}', 'directory')">Delete</a></li>
                    </ul>
                </div>
            </div>
            <h6 class="text-bold mb-10" style="cursor: pointer" wire:click="setDirectory('{{$directory}}')">
                {{basename($directory)}}</h6>
        </div>
    </div>
</div>
</div> --}}
        @endforeach

        @foreach ($files as $key => $file)
        @if(basename($file) !== '.gitignore')

        <div class="col mb-5">
            <div class="card h-100">
                <div class="card-header d-flex">
                    <div>
                        File
                    </div>
                    <div class="ms-auto">
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#file_{{$key}}" aria-expanded="true"
                            aria-controls="file_{{$key}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-0"  @if ($file == $selected && !$selected == "") style="background: #FFC107; color: #ffffff;" @endif>{{basename($file)}}</h5>
                </div>
                <div id="file_{{$key}}" class="accordion-collapse collapse card-body pt-0" aria-labelledby="file_{{$key}}"
                    data-bs-parent="#accordionThings">
                    <hr>
                    <div class="d-flex">
                        {{-- <form action="{{route('file.open')}}" method="post" target="_blank">
                            @csrf
                            <input type="hidden" name="file" id="file" value="{{$file}}">
                            <button type="submit" class="card-link text-success card-link pt-0">Open</button>
                        </form> --}}
                        <a class="card-link text-success" target="_blank" href="{{Storage::url($file)}}">Open</a>

                        <a class="card-link text-primary" href="#" wire:click="download('{{$file}}')">Download</a>
                        <a class="card-link text-danger" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete"
                            data-backdrop="static" data-keyboard="false"
                            wire:click="deleteState('{{$file}}', 'file')">Delete</a>
                    </div>
                </div>
            </div>
        </div>

{{-- <div class="col-xl-4 col-lg-5 col-sm-6">
            <div class="icon-card mb-30 w-100">
                <div class="d-flex  w-100">
                    <div class="icon purple flex-fill" style="height: 3.2rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                            <path
                                d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                        </svg>
                    </div>
                    <div class="d-flex flex-column flex-fill">
                        <div class="d-flex justify-content-end">
                            <div class="dropdown">
                                <a class="dropdown" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-three-dots" viewBox="0 0 16 16">
                                        <path
                                            d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                    </svg>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <form action="{{route('file.open')}}" method="post">
@csrf
<input type="hidden" name="file" id="file" value="{{$file}}">
<button type="submit" class="dropdown-item">Open</button>
</form>
</li>
<li><a class="dropdown-item" href="#" wire:click="download('{{$file}}')">Download</a></li>
<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete" data-backdrop="static"
        data-keyboard="false" wire:click="deleteState('{{$file}}', 'file')">Delete</a></li>
</ul>
</div>
</div>
<h6 class="text-bold mb-10">{{basename($file)}}</h6>
</div>
</div>
</div>
</div> --}}

        @endif
        @endforeach
        </div>
    </div>


    {{--Search Modal --}}
<div class="modal modal-blur fade" id="modal-search-file-directory" tabindex="-1" role="dialog" aria-hidden="true"
wire:ignore.self>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Search file or directory</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="searchName">Name</label>
            <input type="text" name="searchName" id="searchName" wire:model.debounce.1000ms="searchName"
                class="form-control">
        </div>
        <div class="modal-footer overflow-auto" style="height: 20rem;">
            @forelse ($filters as $filter)
                @if (basename($filter) != ".gitignore")
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">{{basename($filter)}}</h5>
                            <small>{{$filter}}</small>
                            <a href="#" class="stretched-link" wire:click.prevent="getDirectory('{{$filter}}')"></a>
                        </div>
                    </div>
                @endif
            @empty
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">No Item Found</h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
</div>
{{-- End of Search Modal --}}

{{-- New Directory Modal --}}
<div class="modal modal-blur fade" id="modal-new-directory" tabindex="-1" role="dialog" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Directory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="directory">Directory name</label>
                <input type="text" name="directoryName" id="directoryName" wire:model="directoryName"
                    class="form-control">
                @error('directoryName')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="createDirectory">Create</button>
            </div>
        </div>
    </div>
</div>
{{-- End of New Directory Modal --}}

{{-- File Upload Modal --}}
<div class="modal modal-blur fade" id="modal-upload-file" tabindex="-1" role="dialog" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="file-upload">
                    <input type="file" wire:loading.remove name="fileUpload" id="fileUpload" wire:model="fileUpload"
                        class="form-control">
                    @error('fileUpload')
                    <small class="text-danger" wire:loading.remove wire:target="fileUpload">{{$message}}</small>
                    @enderror
                    <div class="file-upload-loading-state" wire:loading wire:target="fileUpload">
                        <p>Uploading...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary" wire:loading wire:target="file" disabled>Upload</button>

                <button type="button" class="btn btn-primary" wire:click.prevent="saveFile()" wire:loading.remove
                    wire:target="file">Upload</button>
            </div>
        </div>
    </div>
</div>
{{-- End of File Upload Modal --}}

{{-- Delete Modal --}}
<div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4 w-100">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <!-- SVG icon code with class="mb-2 text-danger icon-lg" -->
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove this {{$onDeleteStateType}}
                    ({{basename($onDeleteStateName)}})? What you've done cannot be undone.</div>
                <div class="mt-2">
                    <input type="password" wire:model.lazy="master_key" name="master_key" id="master_key"
                        class="form-control text-center" placeholder="Enter master key">
                    @error('master_key')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Cancel
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" wire:click.prevent="deleteConfirm()">
                                Delete
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Delete Modal --}}

<script>
    window.addEventListener('modalDismiss', event => {
        $(`#${event.detail.modalName}`).modal('hide')

        if (event.detail.modalName == 'modal-new-directory') {
            document.getElementById('directoryName').value = ''
        } else if (event.detail.modalName == 'modal-upload-file') {
            document.getElementById('fileUpload').value = ''
        }else if(event.detail.modalName == 'modal-search-file-directory'){
            document.getElementById('searchName').value = ''
        }
    });

</script>
</div>
