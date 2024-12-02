<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Recent Judgments</h1>
        <p class="mt-2 text-gray-600">Latest court decisions and rulings</p>
    </div>

    <!-- Filters -->
    <div class="mb-8">
        <div class="flex flex-wrap gap-4">
            <select class="px-4 py-2 border rounded-lg">
                <option>All Courts</option>
                <option>Supreme Court</option>
                <option>Court of Appeal</option>
                <option>High Court</option>
            </select>
            <select class="px-4 py-2 border rounded-lg">
                <option>All Categories</option>
                <option>Criminal</option>
                <option>Civil</option>
                <option>Constitutional</option>
            </select>
            <button class="px-6 py-2 text-white rounded-lg bg-primary-dark hover:bg-primary-medium">
                Apply Filters
            </button>
        </div>
    </div>

    <!-- Judgments List -->
    <div class="space-y-6">
        <div class="p-6 border rounded-lg">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-sm text-primary-medium">New Judgment</span>
                    <h3 class="mt-1 text-xl font-semibold text-primary-dark">
                        <a href="/cases/1" class="hover:text-primary-medium">
                            Republic v John Doe & another [2024] eKLR
                        </a>
                    </h3>
                    <div class="mt-2 text-sm text-gray-500">
                        <span>Supreme Court</span> • 
                        <span>Judge: Hon. Justice Smith</span> • 
                        <span>March 20, 2024</span>
                    </div>
                    <p class="mt-4 text-gray-600">Key points from the judgment...</p>
                    <div class="flex items-center gap-4 mt-4">
                        <a href="/cases/1" class="text-primary hover:text-primary-medium">Read Full Judgment →</a>
                        <a href="/cases/1/pdf" class="flex items-center text-primary hover:text-primary-medium">
                            <span>📄</span>
                            <span class="ml-1">Download PDF</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-8">
        <nav class="flex items-center gap-2">
            <a href="?page=1" class="px-3 py-1 border rounded hover:bg-gray-50">Previous</a>
            <a href="?page=1" class="px-3 py-1 text-white border rounded bg-primary-dark">1</a>
            <a href="?page=2" class="px-3 py-1 border rounded hover:bg-gray-50">2</a>
            <a href="?page=3" class="px-3 py-1 border rounded hover:bg-gray-50">3</a>
            <span class="px-3 py-1">...</span>
            <a href="?page=2" class="px-3 py-1 border rounded hover:bg-gray-50">Next</a>
        </nav>
    </div>
</div>
