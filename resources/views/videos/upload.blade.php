<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            فيديو جديد
        </h2>
    </x-slot>
    <div class=" text-white font-bold flex flex-col mt-14 gap-y-2 w-full">
        <div class="flex flex-col items-start pr-16">
            <h2 class="text-center text-3xl font-bold mb-8 bg-gray-950 p-4 rounded-lg">رفع فيديو</h2>
        <form action="/videos" method="POST" enctype="multipart/form-data" class="flex flex-col items-start gap-y-4 justify-center w-full">
            @csrf
            <label>عنوان الفيديو</label>
            <input class="font-bold w-1/2 rounded-xl bg-cyan-950 border-none" type="text" name="title">
            @error('title')
                {{$message}}
            @enderror
            <label>الوصف</label>
            <textarea class="font-bold w-1/2 rounded-xl bg-cyan-950 border-none text-white" rows="5" name="description"></textarea>
    
            <div class="flex flex-col items-start justify-center w-full mt-4">
                <label for="file-upload" class="flex flex-col items-center px-2 py-4 bg-gray-100 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-200 focus:outline-none" id="drop-area">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-500 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="text-gray-600">اضغط لرفع ملف</span>
                    <span class="text-sm text-gray-500">أو قم بإلقائه هنا</span>
                    <input id="file-upload" name="video" type="file" accept="video/mp4, video/x-m4v, video/*" class="hidden" />
                </label>
                <div id="file-name" class="mt-4 text-sm text-gray-500"></div> <!-- Feedback area -->
            </div>
    
            <button class="bg-blue-400 hover:bg-blue-500 rounded-lg w-24 py-2 w-1/2 py-2 h-12" type="submit">رفع</button>
        </form>
        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        
    </div>
    <script>
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('file-upload');
        const fileNameDisplay = document.getElementById('file-name');
      
        // Allow drag over
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('bg-gray-200');
        });
      
        // Remove highlight when dragging ends
        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('bg-gray-200');
        });
      
        // Handle drop
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('bg-gray-200');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;  // Assign the dropped files to the file input
                updateFileName(files[0]);
            }
        });
      
        // Handle file input change (if user selects a file via the dialog)
        fileInput.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files.length > 0) {
                updateFileName(files[0]);
            }
        });
      
        // Function to update the file name display
        function updateFileName(file) {
            fileNameDisplay.textContent = `Selected file: ${file.name}`;
        }
    </script>
</x-app-layout>    


