<?php
include_once 'src/bootstrap.php';
?>
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

<body class="bg-grey-100 px-3 font-sans leading-normal tracking-normal">
    <div x-data="lawSearch()" class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4">
        <div class="relative">
            <input x-model="search"
                class="w-full px-2 py-1 border focus:border-blue-300 ring-blue-300 focus:ring focus:outline-none"
                type="text" placeholder="Search..." />

            <button x-show="search.length > 0" @click="search = ''"
                class="absolute right-0 top-0 w-6 h-full flex justify-center items-center focus:outline-none text-gray-700 focus:text-gray-900">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

<?php
foreach($data as $d){
    echo $d->issuing_body . "<br>";
}

?>

        <ul class="mt-4 overflow-auto">
            <template x-for="law in filteredLaws()" :key="law">
                <li x-html="highlightSearch(law)"></li>
            </template>
        </ul>
    </div>
    <script>
        function lawSearch() {
            return {
                laws: [
                    "The Interpretation and General Provisions Act",
                    "The Law Reform Commission Act",
                    "The Constitution of Kenya Review Act (Expired)",
                    "The Architects and Quantity Surveyors Act",
                    "The Engineers Registration Act",
                    "The Certified Public Secretaries of Kenya Act",
                    "The Capital Markets Authority Act"                  
                ],

                search: '',
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