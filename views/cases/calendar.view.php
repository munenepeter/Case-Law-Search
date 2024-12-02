<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-dark">Court Calendar</h1>
        <p class="mt-2 text-gray-600">Upcoming court sessions and hearings</p>
    </div>

    <!-- Calendar Navigation -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button class="p-2 rounded-lg hover:bg-gray-100">←</button>
                <h2 class="text-xl font-semibold">March 2024</h2>
                <button class="p-2 rounded-lg hover:bg-gray-100">→</button>
            </div>
            <div class="flex gap-4">
                <button class="px-4 py-2 text-white rounded-lg bg-primary-dark">Month</button>
                <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">Week</button>
                <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200">Day</button>
            </div>
        </div>
    </div>

    <!-- Calendar Grid -->
    <div class="border rounded-lg">
        <!-- Days of Week -->
        <div class="grid grid-cols-7 gap-px bg-gray-200">
            <div class="p-4 font-semibold text-center bg-white">Mon</div>
            <div class="p-4 font-semibold text-center bg-white">Tue</div>
            <div class="p-4 font-semibold text-center bg-white">Wed</div>
            <div class="p-4 font-semibold text-center bg-white">Thu</div>
            <div class="p-4 font-semibold text-center bg-white">Fri</div>
            <div class="p-4 font-semibold text-center bg-white">Sat</div>
            <div class="p-4 font-semibold text-center bg-white">Sun</div>
        </div>

        <!-- Calendar Days -->
        <div class="grid grid-cols-7 gap-px bg-gray-200">
            <?php for ($i = 1; $i <= 31; $i++): ?>
                <div class="bg-white p-4 min-h-[120px]">
                    <div class="mb-2 font-semibold"><?= $i ?></div>
                    <?php if ($i == 20): ?>
                        <div class="p-1 mb-1 text-sm text-blue-800 bg-blue-100 rounded">
                            9:00 AM - Supreme Court
                        </div>
                        <div class="p-1 text-sm text-green-800 bg-green-100 rounded">
                            2:00 PM - High Court
                        </div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="mt-8">
        <h2 class="mb-4 text-xl font-bold text-primary-dark">Upcoming Events</h2>
        <div class="space-y-4">
            <div class="p-4 border rounded-lg">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-semibold">Criminal Case Hearing</h3>
                        <p class="mt-1 text-sm text-gray-600">Supreme Court - Main Chamber</p>
                        <p class="mt-1 text-sm text-gray-500">March 20, 2024 - 9:00 AM</p>
                    </div>
                    <span class="px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full">Upcoming</span>
                </div>
            </div>
        </div>
    </div>
</div>
