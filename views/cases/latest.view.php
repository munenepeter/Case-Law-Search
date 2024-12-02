<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Latest Cases</h1>
        <p class="mt-2 text-gray-600">Most recent judgments and rulings</p>
    </div>

    <!-- Filter by Court -->
    <div class="mb-8">
        <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 text-white rounded-lg bg-primary-dark">All Courts</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">Supreme Court</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">Court of Appeal</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">High Court</button>
        </div>
    </div>

    <!-- Latest Cases List -->
    <div class="space-y-6">
        <div class="p-6 border rounded-lg">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-sm text-primary-medium">New</span>
                    <h3 class="mt-1 text-xl font-semibold text-primary-dark">
                        <a href="/cases/1" class="hover:text-primary-medium">
                            Republic v John Doe & another [2024] eKLR
                        </a>
                    </h3>
                    <div class="mt-2 text-sm text-gray-500">
                        <span>Supreme Court</span> • 
                        <span>Criminal Law</span> • 
                        <span>March 20, 2024</span>
                    </div>
                    <p class="mt-4 text-gray-600">Brief excerpt or summary of the case...</p>
                </div>
                <span class="px-3 py-1 text-sm text-green-800 bg-green-100 rounded-full">Just Added</span>
            </div>
        </div>
        <!-- Add more cases here -->
    </div>
</div>
