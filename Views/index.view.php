<?php include_once 'base.view.php'; ?>

<div class="px-4 mx-auto max-w-7xl">
    <!-- Hero Section with Search -->
    <div class="py-12 text-center">
        <h1 class="mb-4 text-4xl font-bold text-primary-dark">Kenya Case Law Search</h1>
        <p class="mb-8 text-lg text-primary-medium">Search through Kenya's legal cases quickly and efficiently</p>
        
        <!-- Search Form -->
        <div class="max-w-2xl mx-auto">
            <form action="/search" method="GET" class="flex flex-col space-y-4">
                <input type="text" 
                       name="q" 
                       placeholder="Search cases by title, citation, or keywords..." 
                       class="w-full px-4 py-3 text-lg border rounded-lg border-primary-lighter focus:border-primary-medium focus:ring-2 focus:ring-primary-lighter">
                <button type="submit" 
                        class="px-8 py-3 text-white transition rounded-lg bg-primary-dark hover:bg-primary-medium">
                    Search Cases
                </button>
            </form>
        </div>
    </div>

    <!-- Quick Links Grid -->
    <div class="grid grid-cols-1 gap-6 my-12 md:grid-cols-2 lg:grid-cols-4">
        <a href="/latest-cases" class="p-6 rounded-lg bg-gray-50 hover:bg-gray-100">
            <h3 class="font-semibold text-primary-dark">Latest Cases</h3>
            <p class="mt-2 text-sm text-gray-600">Most recent court decisions and judgments</p>
        </a>
        <a href="/upcoming-hearings" class="p-6 rounded-lg bg-gray-50 hover:bg-gray-100">
            <h3 class="font-semibold text-primary-dark">Upcoming Hearings</h3>
            <p class="mt-2 text-sm text-gray-600">Schedule of upcoming court sessions</p>
        </a>
        <a href="/new-bills" class="p-6 rounded-lg bg-gray-50 hover:bg-gray-100">
            <h3 class="font-semibold text-primary-dark">New Bills</h3>
            <p class="mt-2 text-sm text-gray-600">Recently introduced legislation</p>
        </a>
        <a href="/latest-gazettes" class="p-6 rounded-lg bg-gray-50 hover:bg-gray-100">
            <h3 class="font-semibold text-primary-dark">Latest Gazettes</h3>
            <p class="mt-2 text-sm text-gray-600">Recent government notifications</p>
        </a>
    </div>

    <!-- Main Content Sections -->
    <div class="grid grid-cols-1 gap-8 mb-12 lg:grid-cols-3">
        <!-- Latest Updates Section -->
        <div class="space-y-6 lg:col-span-2">
            <h2 class="mb-4 text-2xl font-bold text-primary-dark">Latest Updates</h2>
            
            <!-- Featured Case -->
            <div class="p-6 border rounded-lg">
                <span class="text-sm text-primary-medium">Featured Case</span>
                <h3 class="mt-2 text-xl font-semibold">Recent Supreme Court Decision</h3>
                <p class="mt-2 text-gray-600">Summary of the latest landmark decision...</p>
                <a href="#" class="inline-block mt-4 text-primary hover:text-primary-medium">Read more →</a>
            </div>

            <!-- Recent Bills -->
            <div class="p-6 border rounded-lg">
                <h3 class="text-xl font-semibold">Bills Before Parliament</h3>
                <ul class="mt-4 space-y-4">
                    <li class="flex items-center justify-between">
                        <span>Finance Bill 2024</span>
                        <span class="text-sm text-primary">Second Reading</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>Health Amendment Bill</span>
                        <span class="text-sm text-primary">Committee Stage</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Court Calendar -->
            <div class="p-6 border rounded-lg">
                <h3 class="mb-4 text-xl font-semibold">Court Calendar</h3>
                <div class="space-y-4">
                    <div>
                        <h4 class="font-medium">Today's Hearings</h4>
                        <ul class="mt-2 space-y-2 text-sm">
                            <li>Commercial Court - Room 3</li>
                            <li>Supreme Court - Main Chamber</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="p-6 border rounded-lg">
                <h3 class="mb-4 text-xl font-semibold">Quick Stats</h3>
                <div class="space-y-4">
                    <div>
                        <span class="block text-2xl font-bold">2,345</span>
                        <span class="text-sm text-gray-600">Cases this month</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">127</span>
                        <span class="text-sm text-gray-600">New bills in progress</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Boxes -->
    <div class="grid grid-cols-1 gap-8 mt-12 mb-12 md:grid-cols-3">
        <div class="p-6 border rounded-lg border-primary-lighter">
            <h2 class="mb-3 text-xl font-semibold text-primary-dark">Comprehensive Database</h2>
            <p class="text-gray-600">Access thousands of legal cases from Kenya's courts.</p>
        </div>

        <div class="p-6 border rounded-lg border-primary-lighter">
            <h2 class="mb-3 text-xl font-semibold text-primary-dark">Advanced Search</h2>
            <p class="text-gray-600">Search by citation, case name, judge, or full text content.</p>
        </div>

        <div class="p-6 border rounded-lg border-primary-lighter">
            <h2 class="mb-3 text-xl font-semibold text-primary-dark">Regular Updates</h2>
            <p class="text-gray-600">New cases added regularly to keep you up to date.</p>
        </div>
    </div>
</div>

<?php include_once 'sections/footer.view.php' ?>
