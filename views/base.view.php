<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Case Law Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            dark: '#011f4b',
                            medium: '#03396c',
                            DEFAULT: '#005b96',
                            light: '#6497b1',
                            lighter: '#b3cde0',
                        }
                    }
                }
            }
        }
    </script>
    <script defer src="<?php asset("js/index.js") ?>"></script>
    <script defer src="<?php asset("js/instant-page.js") ?>"></script>

</head>
<body class="flex flex-col min-h-screen bg-white">
    <!-- Main Navigation -->
    <nav class="border-b border-gray-200">
        <div class="px-4 mx-auto max-w-7xl">
            <!-- Top Nav Bar -->
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-semibold text-primary-dark">Case Law Search</a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="/bills" class="transition text-primary hover:text-primary-medium">Bills & Legislation</a>
                    <a href="/cases" class="transition text-primary hover:text-primary-medium">Case Law</a>
                    <a href="/gazettes" class="transition text-primary hover:text-primary-medium">Gazettes</a>
                    <a href="/parliament" class="transition text-primary hover:text-primary-medium">Parliamentary Business</a>
                    <a href="/docs" class="transition text-primary hover:text-primary-medium">Documentation</a>
                    <a href="https://github.com/munenepeter/Case-Law-Search" class="transition text-primary hover:text-primary-medium">GitHub</a>
                </div>
            </div>
            
            <!-- Secondary Navigation -->
            <div class="py-2 -mb-px text-sm border-t border-gray-100">
                <div class="flex space-x-8">
                    <a href="/latest-updates" class="text-primary-medium hover:text-primary-dark">Latest Updates</a>
                    <a href="/most-viewed" class="text-primary-medium hover:text-primary-dark">Most Viewed</a>
                    <a href="/court-calendar" class="text-primary-medium hover:text-primary-dark">Court Calendar</a>
                    <a href="/judgments" class="text-primary-medium hover:text-primary-dark">Recent Judgments</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
