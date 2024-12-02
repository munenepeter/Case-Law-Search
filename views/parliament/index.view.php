<?php include_once __DIR__ . '/../base.view.php'; ?>


<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Parliamentary Business</h1>
        <p class="mt-2 text-gray-600">Track parliamentary proceedings, debates, and committees</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
        <div class="p-6 rounded-lg bg-gray-50">
            <h3 class="font-semibold text-primary-dark">Current Session</h3>
            <p class="mt-2 text-2xl font-bold">13th Parliament</p>
        </div>
        <div class="p-6 rounded-lg bg-gray-50">
            <h3 class="font-semibold text-primary-dark">Active Bills</h3>
            <p class="mt-2 text-2xl font-bold">47</p>
        </div>
        <div class="p-6 rounded-lg bg-gray-50">
            <h3 class="font-semibold text-primary-dark">Committee Meetings</h3>
            <p class="mt-2 text-2xl font-bold">12 This Week</p>
        </div>
    </div>

    <!-- Today's Business -->
    <div class="mb-8">
        <h2 class="mb-4 text-2xl font-bold text-primary-dark">Today's Business</h2>
        <div class="p-6 border rounded-lg">
            <div class="space-y-4">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">Morning Session (9:30 AM)</h3>
                        <p class="mt-1 text-gray-600">Debate on Finance Bill 2024</p>
                    </div>
                    <span class="px-3 py-1 text-sm text-green-800 bg-green-100 rounded-full">In Progress</span>
                </div>
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">Afternoon Session (2:30 PM)</h3>
                        <p class="mt-1 text-gray-600">Committee Reports Presentation</p>
                    </div>
                    <span class="px-3 py-1 text-sm text-gray-800 bg-gray-100 rounded-full">Upcoming</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
        <!-- Committee Meetings -->
        <div>
            <h2 class="mb-4 text-2xl font-bold text-primary-dark">Committee Meetings</h2>
            <div class="p-6 border rounded-lg">
                <ul class="space-y-4">
                    <li class="pb-4 border-b">
                        <h3 class="font-semibold">Budget Committee</h3>
                        <p class="mt-1 text-gray-600">Review of Supplementary Budget</p>
                        <p class="mt-1 text-sm text-gray-500">March 23, 2024 - 10:00 AM</p>
                    </li>
                    <li class="pb-4 border-b">
                        <h3 class="font-semibold">Justice and Legal Affairs</h3>
                        <p class="mt-1 text-gray-600">Public Participation on Elections Act</p>
                        <p class="mt-1 text-sm text-gray-500">March 24, 2024 - 2:00 PM</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Recent Debates -->
        <div>
            <h2 class="mb-4 text-2xl font-bold text-primary-dark">Recent Debates</h2>
            <div class="p-6 border rounded-lg">
                <ul class="space-y-4">
                    <li class="pb-4 border-b">
                        <h3 class="font-semibold">Health Amendment Bill Debate</h3>
                        <p class="mt-1 text-gray-600">Second Reading completed</p>
                        <p class="mt-1 text-sm text-gray-500">March 21, 2024</p>
                    </li>
                    <li class="pb-4 border-b">
                        <h3 class="font-semibold">Motion on Climate Change</h3>
                        <p class="mt-1 text-gray-600">Motion passed with amendments</p>
                        <p class="mt-1 text-sm text-gray-500">March 20, 2024</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>