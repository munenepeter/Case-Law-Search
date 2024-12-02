<?php include_once __DIR__ . '/../base.view.php'; ?>

<div class="px-4 py-8 mx-auto max-w-7xl">
       <div class="mb-8">
              <h1 class="text-3xl font-bold text-primary-dark">Kenya Gazette</h1>
              <p class="mt-2 text-gray-600">Official government notifications and legal notices</p>
       </div>

       <!-- Search and Filters -->
       <div class="mb-8">
              <form action="/gazettes/search" method="GET" class="max-w-2xl">
                     <div class="flex gap-4">
                            <input type="text"
                                   name="q"
                                   placeholder="Search gazette notices..."
                                   class="flex-1 px-4 py-2 border rounded-lg">
                            <button type="submit"
                                   class="px-6 py-2 text-white rounded-lg bg-primary-dark hover:bg-primary-medium">
                                   Search
                            </button>
                     </div>
              </form>
       </div>

       <!-- Filters -->
       <div class="mb-8">
              <div class="flex flex-wrap gap-4">
                     <select class="px-4 py-2 border rounded-lg">
                            <option>All Categories</option>
                            <option>Legal Notices</option>
                            <option>Public Appointments</option>
                            <option>Tenders</option>
                            <option>Land Notices</option>
                     </select>
                     <select class="px-6 py-2 border rounded-lg">
                            <option>All Years</option>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                     </select>
              </div>
       </div>

       <!-- Gazette Notices List -->
       <div class="space-y-6">
              <div class="p-6 border rounded-lg">
                     <div class="flex items-start justify-between">
                            <div>
                                   <h3 class="text-xl font-semibold text-primary-dark">Vol. CXXVI—No. 52</h3>
                                   <p class="mt-2 text-gray-600">Special Issue</p>
                            </div>
                            <span class="text-sm text-gray-500">March 22, 2024</span>
                     </div>
                     <div class="mt-4">
                            <h4 class="font-medium">Contents Include:</h4>
                            <ul class="mt-2 space-y-2 text-gray-600">
                                   <li>• The Public Finance Management Act - Appointment</li>
                                   <li>• The Land Registration Act - Issue of New Land Title Deeds</li>
                            </ul>
                     </div>
                     <a href="/gazettes/1" class="inline-block mt-4 text-primary hover:text-primary-medium">View Full Gazette →</a>
              </div>
       </div>
</div>