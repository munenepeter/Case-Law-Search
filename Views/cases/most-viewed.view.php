<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Most Viewed Cases</h1>
        <p class="mt-2 text-gray-600">Popular and frequently referenced cases</p>
    </div>

    <!-- Time Period Filter -->
    <div class="mb-8">
        <div class="flex flex-wrap gap-4">
            <button class="px-4 py-2 text-white rounded-lg bg-primary-dark">This Week</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">This Month</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">This Year</button>
            <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">All Time</button>
        </div>
    </div>

    <!-- Most Viewed Cases List -->
    <div class="space-y-6">
        <div class="p-6 border rounded-lg">
            <div class="flex items-start justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-primary-dark">
                        <a href="/cases/1" class="hover:text-primary-medium">
                            Republic v John Doe & another [2024] eKLR
                        </a>
                    </h3>
                    <div class="mt-2 text-sm text-gray-500">
                        <span>Supreme Court</span> • 
                        <span>Criminal Law</span> • 
                        <span>Views: 1,234</span>
                    </div>
                    <p class="mt-4 text-gray-600">Brief excerpt or summary of the case...</p>
                </div>
                <span class="px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full">Trending</span>
            </div>
        </div>
    </div>
</div>
