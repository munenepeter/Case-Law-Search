<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Case Law Database</h1>
        <p class="mt-2 text-gray-600">Browse and search through Kenya's legal cases</p>
    </div>

    <!-- Advanced Search -->
    <div class="mb-8">
        <form action="/cases/search" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                <input type="text" 
                       name="q" 
                       placeholder="Search by keywords..." 
                       class="w-full px-4 py-2 border rounded-lg">
                <input type="text" 
                       name="citation" 
                       placeholder="Citation (e.g., [2024] eKLR)" 
                       class="w-full px-4 py-2 border rounded-lg">
                <input type="text" 
                       name="judge" 
                       placeholder="Judge name" 
                       class="w-full px-4 py-2 border rounded-lg">
            </div>
            <div class="flex flex-wrap gap-4">
                <select name="court" class="px-4 py-2 border rounded-lg">
                    <option value="">All Courts</option>
                    <option>Supreme Court</option>
                    <option>Court of Appeal</option>
                    <option>High Court</option>
                </select>
                <select name="year" class="px-4 py-2 border rounded-lg">
                    <option value="">All Years</option>
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                </select>
                <select name="category" class="px-4 py-2 border rounded-lg">
                    <option value="">All Categories</option>
                    <option>Criminal</option>
                    <option>Civil</option>
                    <option>Constitutional</option>
                </select>
                <button type="submit" 
                        class="px-6 py-2 text-white rounded-lg bg-primary-dark hover:bg-primary-medium">
                    Search Cases
                </button>
            </div>
        </form>
    </div>

    <!-- Cases List -->
    <div class="space-y-6">
        <div class="p-6 border rounded-lg hover:border-primary-medium">
            <h3 class="text-xl font-semibold text-primary-dark">
                <a href="/cases/1" class="hover:text-primary-medium">
                    Republic v John Doe & another [2024] eKLR
                </a>
            </h3>
            <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-500">
                <span>Supreme Court</span>
                <span>•</span>
                <span>Criminal Law</span>
                <span>•</span>
                <span>March 20, 2024</span>
            </div>
            <p class="mt-4 text-gray-600">Brief excerpt or summary of the case...</p>
            <div class="flex items-center gap-4 mt-4">
                <a href="/cases/1" class="text-primary hover:text-primary-medium">Read Full Case →</a>
                <a href="/cases/1/pdf" class="flex items-center text-primary hover:text-primary-medium">
                    <span>📄</span>
                    <span class="ml-1">PDF</span>
                </a>
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