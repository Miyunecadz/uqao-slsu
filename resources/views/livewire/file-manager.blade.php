<div>
    <div class="d-flex">
        <div class="me-auto">
            <small>Current Directory</small>
            <h6 class="fs-5">{{$currentDirectory == 'public' ? 'Root Folder' : basename($currentDirectory) . " Folder"}}</h6>
        </div>
        <div>
            <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-upload-file" data-backdrop="static" data-keyboard="false">Upload File</a>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-directory" data-backdrop="static" data-keyboard="false">New Directory</a>
        </div>
    </div>


    <div class="mt-3 row">


        @if ($currentDirectory !== 'public')
            <div class="col-xl-4 col-lg-5 col-sm-6">
                <div class="icon-card mb-30 w-100">
                    <div class="d-flex  w-100">
                        <div class="icon purple flex-fill" style="height: 3.2rem;cursor: pointer;" wire:click="setDirectory('{{$previousDirectory}}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </div>
                        <div class="d-flex flex-column flex-fill">
                            <div class="d-flex justify-content-end invisible">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <a href="#" class="text-bold mb-10 text-dark" style="cursor: pointer" wire:click.prevent="setDirectory('{{$previousDirectory}}')">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @foreach ($directories as $directory)
            <div class="col-xl-4 col-lg-5 col-sm-6">
                <div class="icon-card mb-30 w-100">
                    <div class="d-flex  w-100">
                        <div class="icon purple flex-fill" wire:click="setDirectory('{{$directory}}')" style="height: 3.2rem;cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder2" viewBox="0 0 16 16">
                                <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/>
                            </svg>
                        </div>
                        <div class="d-flex flex-column flex-fill">
                            <div class="d-flex justify-content-end">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                        </svg>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    {{-- <li><a class="dropdown-item" href="#">Rename</a></li> --}}
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete" data-backdrop="static" data-keyboard="false" wire:click="deleteState('{{$directory}}', 'directory')">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h6 class="text-bold mb-10" style="cursor: pointer" wire:click="setDirectory('{{$directory}}')">{{basename($directory)}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        @foreach ($files as $file)
            @if(basename($file) !== '.gitignore')
                <div class="col-xl-4 col-lg-5 col-sm-6">
                    <div class="icon-card mb-30 w-100">
                        <div class="d-flex  w-100">
                            <div class="icon purple flex-fill" style="height: 3.2rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder2" viewBox="0 0 16 16">
                                    <path d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v7a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 12.5v-9zM2.5 3a.5.5 0 0 0-.5.5V6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5zM14 7H2v5.5a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5V7z"/>
                                </svg>
                            </div>
                            <div class="d-flex flex-column flex-fill">
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                            </svg>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#" wire:click="download('{{$file}}')">Download</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete" data-backdrop="static" data-keyboard="false" wire:click="deleteState('{{$file}}', 'file')">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h6 class="text-bold mb-10">{{basename($file)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- New Directory Modal --}}
    <div class="modal modal-blur fade" id="modal-new-directory" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Directory</h5>
              <button type="button" class="btn-close"  data-bs-dismiss="modal"  aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <label for="directory">Directory name</label>
              <input type="text" name="directoryName" id="directoryName" wire:model="directoryName"  class="form-control">
              @error('directoryName')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal" >Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent="createDirectory">Create</button>
            </div>
          </div>
        </div>
    </div>
    {{-- End of New Directory Modal --}}

    {{-- File Upload Modal --}}
    <div class="modal modal-blur fade" id="modal-upload-file" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">File Upload</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <div class="file-upload">
                    <input type="file" wire:loading.remove name="fileUpload" id="fileUpload" wire:model="fileUpload" class="form-control">
                    @error('fileUpload')
                        <small class="text-danger" wire:loading.remove wire:target="fileUpload">{{$message}}</small>
                    @enderror
                    <div class="file-upload-loading-state" wire:loading wire:target="fileUpload">
                        <p>Uploading...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal" >Close</button>

              <button type="button" class="btn btn-primary" wire:loading wire:target="file" disabled>Upload</button>

              <button type="button" class="btn btn-primary" wire:click.prevent="saveFile()" wire:loading.remove wire:target="file">Upload</button>
            </div>
          </div>
        </div>
    </div>
    {{-- End of File Upload Modal --}}

    {{-- Delete Modal --}}
    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-status bg-danger"></div>
              <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <!-- SVG icon code with class="mb-2 text-danger icon-lg" -->
                <h3>Are you sure?</h3>
                <div class="text-muted">Do you really want to remove this {{$onDeleteStateType}} ({{basename($onDeleteStateName)}})? What you've done cannot be undone.</div>
              </div>
              <div class="modal-footer">
                <div class="w-100">
                  <div class="row">
                    <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                        Cancel
                      </a></div>
                    <div class="col"><a href="#"  class="btn btn-danger w-100"  wire:click.prevent="deleteConfirm()">
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
        window.addEventListener('modalDismiss', event=>{
            $(`#${event.detail.modalName}`).modal('hide')

            if(event.detail.modalName == 'modal-new-directory'){
                document.getElementById('directoryName').value = ''
            }
            else if(event.detail.modalName == 'modal-upload-file'){
                document.getElementById('fileUpload').value = ''
            }
        });
    </script>
</div>
