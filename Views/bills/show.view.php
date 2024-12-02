<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Finance Bill 2024</h1>
        <div class="flex items-center mt-2 space-x-4">
            <span class="px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full">Second Reading</span>
            <span class="text-gray-600">Bill No. 13 of 2024</span>
        </div>
    </div>

    <!-- Bill Progress Timeline -->
    <div class="mb-8">
        <h2 class="mb-4 text-xl font-bold text-primary-dark">Progress</h2>
        <div class="relative">
            <div class="absolute left-4 h-full w-0.5 bg-gray-200"></div>
            <div class="relative space-y-6">
                <div class="flex items-start">
                    <div class="relative z-10 flex items-center justify-center w-8 h-8 text-white bg-green-500 rounded-full">
                        ✓
                    </div>
                    <div class="ml-4">
                        <h3 class="font-semibold">First Reading</h3>
                        <p class="text-sm text-gray-600">Completed on January 15, 2024</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="relative z-10 flex items-center justify-center w-8 h-8 text-white bg-blue-500 rounded-full">
                        2
                    </div>
                    <div class="ml-4">
                        <h3 class="font-semibold">Second Reading</h3>
                        <p class="text-sm text-gray-600">In Progress</p>
                    </div>
                </div>
                <!-- Add more stages -->
            </div>
        </div>
    </div>

    <!-- Bill Details -->
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="p-6 border rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-primary-dark">Bill Summary</h2>
                <p class="text-gray-600">
                    An Act of Parliament to amend various laws relating to taxes and duties...
                </p>
                
                <h3 class="mt-6 mb-2 font-semibold">Key Provisions:</h3>
                <ul class="space-y-2 text-gray-600 list-disc list-inside">
                    <li>Amendment of Section 5 of Income Tax Act</li>
                    <li>Introduction of new digital service tax provisions</li>
                    <li>Revision of VAT rates on essential goods</li>
                </ul>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Key Dates -->
            <div class="p-6 border rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-primary-dark">Key Dates</h2>
                <div class="space-y-3">
                    <div>
                        <h3 class="font-semibold">Publication Date</h3>
                        <p class="text-gray-600">January 10, 2024</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">First Reading</h3>
                        <p class="text-gray-600">January 15, 2024</p>
                    </div>
                </div>
            </div>

            <!-- Related Documents -->
            <div class="p-6 border rounded-lg">
                <h2 class="mb-4 text-xl font-bold text-primary-dark">Related Documents</h2>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-primary hover:text-primary-medium">
                            <span>