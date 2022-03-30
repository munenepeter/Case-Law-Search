<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Laws Search</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head> 
<body class="bg-gray-100 px-3 font-sans leading-normal tracking-normal">
    <div class=" mt-4  max-w-screen-md max-h-screen mx-auto p-4 text-center">
        <h2 class="font-bold text-xl">Search a Case</h2>
    </div>
    <br> <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" href="upload.php">Upload a case</a> 
    <div class="h-full bg-gray-200 text-gray-800 p-4 lg:p-8" x-data="alpineInstance()" x-init="getData()">
        <div class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4">
            <div class="relative">
                <input x-model="search" class="w-full rounded-lg px-2 py-2 border focus:border-blue-300 ring-blue-300 focus:ring focus:outline-none" type="text" placeholder="Search..." /> 
                <button x-show="search.length > 0" @click="search = ''" class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-gray-900">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div> 
        </div>
        <div class="container w-100 lg:w-4/5 mx-auto flex flex-col"> 
            <template x-for="law in laws" :key="law.case_id">
                <div class="flex flex-col md:flex-row overflow-hidden                                    bg-white rounded-lg shadow-xl  mt-4 w-100 mx-2">  
                    <div class="h-56"> 
                    </div> 
                    <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                        <div class="flex justify-between">
                            <h3 class="font-semibold text-lg leading-tight truncate" x-text="law.case_no"> </h3>
                            <span><b>Date of Delivery:</b> <span x-text="law.date_of_delivery"></span></span>
                        </div>
                        <p class="mt-2" x-text="law.case_parties"></p>
                        <div class="flex justify-between">
                        <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2" x-text="law.court"></p>
                        <span><b>Updated:</b> <span x-text="law.updated_at"></span></span>
                        <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" x-bind:href="'viewCase.php?case_id=' + law.case_id" href="">Read More</a>
                        </div>
                    </div>

                  
                </div>
            </template>
        </div> 
    </div>
    </div>
    <script>
        function alpineInstance() {
            return {
                laws: [],
                search: '',
                getData() {
                    fetch('http://localhost:3000/src/api.php')
                        .then(response => response.json())
                        .then((data) => {
                            this.laws = data;
                        })
                },
                filteredLaws() {
                    return this.laws.filter(
                        law => law.toLowerCase().includes(this.search.toLowerCase())
                    );
                },
                highlightSearch(s) {
                    if (this.search === '') return s;

                    return s.replaceAll(
                        new RegExp(`(${this.search.toLowerCase()})`, 'ig'),
                        '<strong class="font-semibold bg-blue-200">$1</strong>'
                    )
                }
            }
        }
    </script> 
    
</body>

</html>