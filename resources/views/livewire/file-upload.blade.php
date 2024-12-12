<div>
    <div class="file-upload form-file-upload mb-1 {{$fileName}} ">
        <label class="file-select form-group rounded-pill" id="label-{{$fileName}}" for="{{$fileName}}">
            <div class="file-select-button" id="fileName">Choisir le fichier</div>
            <div class="file-select-name" id="noFile{{$fileName}}">Aucun fichier choisi...</div>
            <input type="file" name="{{$fileName}}" id={{$fileName}}>
            <input type="hidden" name="code_demande" value="{{ $code_demande }}" id="">
            <input type="hidden" name="type" value="{{$fileName}}">
        </label>
        @error($fileName)
            <p class="text-danger text-left">{{ $message }}</p>
        @enderror
        @error('code_demande')
            <p class="text-danger text-left">{{ $message }}</p>
        @enderror
        @if (!is_null($error))
            <p class="text-danger text-left">{{ $error }}</p>
        @endif
    </div>
    {{-- <input type="file" id="fileInput"> --}}

    <div wire:loading wire:target="file">
        Uploading...
    </div>

    @if ($progress > 0)
        <div style="width: 100%; background-color: #f3f3f3; border: 1px solid #ccc;">
            <div style="width: {{ $progress }}%; background-color: #4caf50; height: 10px;transistion:width 0.2s linear"></div>
        </div>
        {{-- <p class="text-muted">{{ $progress }}%</p> --}}
        <p class="text-muted" id="progress"></p>
    @endif

    {{-- @if ($uploadedFileName)
        <p>File uploaded successfully: {{ $uploadedFileName }}</p>
    @endif --}}

    @error('file')
        <span class="error">{{ $message }}</span>
    @enderror
    
<script>
    function uploadFile(name) {
        document.getElementById(name).addEventListener('change', function () {
            const el = document.getElementById(name)
            var filename = el.value;
            if (/^\s*$/.test(filename)) {
                document.querySelectorAll("." + name).forEach(function (el) {
                    el.classList.remove('active');
                });
                document.getElementById("noFile" + name).textContent = "No file chosen...";
            } else {
                document.querySelectorAll("." + name).forEach(function (el) {
                    el.classList.add('active');
                });
                document.getElementById("noFile" + name).textContent = filename.replace("C:\\fakepath\\", "");
            }
            document.getElementById("label-"+name).transform = "scale(0)";
        });
    }
    uploadFile('{{$fileName}}');
    
document.getElementById('{{$fileName}}').addEventListener('change', function(e) {
    const file = e.target.files?.[0];
    if(!file){
        alert('Please select a file');
        return;
    }
    const chunkSize = 0.5 * 1024 * 1024; // 0.5MB chunks
    const totalChunks = Math.ceil(file.size / chunkSize);
    let currentChunk = 0;
    const extension = file.name.split('.').pop();
    const filesize = (file.size / (1024*1024)).toFixed(2);

    const reader = new FileReader();

    reader.onload = async function(event) {
        const chunk = event.target.result.split(',')[1]; // Remove the base64 prefix
        console.log(chunk);
        await @this.call('uploadChunks', chunk, currentChunk, totalChunks, extension,filesize);

        currentChunk++;

        if (currentChunk < totalChunks) {
            loadNextChunk();
        }
    };

    function loadNextChunk() {
        const start = currentChunk * chunkSize;
        const end = Math.min(start + chunkSize, file.size);
        const blob = file.slice(start, end);

        reader.readAsDataURL(blob);
    }

    loadNextChunk();
});
@this.on('chunkUploaded', progress => {
    document.getElementById('progress').innerText = progress.toFixed(2) + '%';
        console.log('Progress: ' + progress + '%');
    });
@this.on('uploadCompleted', filePath => {
        console.log('File uploaded to: ' + filePath);
    });
    
</script>

</div>
