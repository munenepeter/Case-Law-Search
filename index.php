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

    <div class="h-full bg-gray-200 text-gray-800 p-4 lg:p-8" x-data="alpineInstance()" x-init="getData()">
        <div class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4">
            <div class="relative">
                <input x-model="search" class="w-full px-2 py-1 border focus:border-blue-300 ring-blue-300 focus:ring focus:outline-none" type="text" placeholder="Search..." />

                <button x-show="search.length > 0" @click="search = ''" class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-gray-900">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div> 
           
        </div>
        <div class="flex flex-wrap -mx-2 pb-8">
            <!-- begin: law card -->
            <template x-for="law in laws" :key="law.case_id">
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 h-full font-light">
                    <div class="flex bg-white rounded-lg shadow-md m-2 border-l-4 border-white hover:shadow-2xl hover:border-pink-500 cursor-pointer relative">
                        <div class="p-4 pr-6 leading-normal">
                            <div class="font-medium text-xl truncate" x-text="law.case_no"></div>
                            <div class="truncate uppercase text-xs text-gray-500 font-semibold pb-2 tracking-widest" x-text="law.case_parties"></div>
                            <div class="" x-text="law.date_of_delivery"></div>
                            <a class="text-blue-600 hover:text-blue-700 mr-4 block" x-bind:href="'mailto:' + law.court" x-text="law.court"></a>
                            <a class="text-blue-600 hover:text-blue-700 block" x-bind:href="'https://' + law.website" x-text="law.created_at"></a>
                        </div>
                    </div>
                </div>
            </template>
            <!-- end: law card -->
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

    <!-- <div x-data="lawSearch()" x-init="getData()" class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4">
        <div class="relative">
            <input x-model="search" class="w-full px-2 py-1 border focus:border-blue-300 ring-blue-300 focus:ring focus:outline-none" type="text" placeholder="Search..." />

            <button x-show="search.length > 0" @click="search = ''" class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-gray-900">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
       

        <ul class="mt-4 overflow-auto">
            <template x-for="law in filteredLaws()" :key="law">
                <li x-html="highlightSearch(law)"></li>
            </template>
        </ul>
    </div>
    <script>
        // function getLaws() {

        //     let laws = {};
        //     fetch('http://localhost:3000/src/api.php', {
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'Accept': 'application/json'
        //             }
        //         })
        //         .then(res => res.json())
        //         .then((data) => {
        //             laws = data;
        //            // console.log(data)
        //         });

        //     console.log(laws);
        // }
        // getLaws();

        function lawSearch(laws) {
            return {
                laws: [],
                teams: null,
                search: '',

                getData() {
                    fetch('http://localhost:3000/src/api.php')
                        .then(response => response.json())
                        .then(response => {
                            this.teams = response;
                            isLoading = false;
                            console.log(response);
                        })
                        console.log(this.teams);
                    // fetch('http://localhost:3000/src/api.php', {
                    //         headers: {
                    //             'Content-Type': 'application/json',
                    //             'Accept': 'application/json'
                    //         }
                    //     })
                    //     .then(res => res.json())
                    //     .then((data) => {
                    //         console.log(this.laws)
                    //         this.laws = data;
                    //         console.log(this.laws)
                    //         console.log(data)
                    //     });
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
    </script> -->
</body>

</html>