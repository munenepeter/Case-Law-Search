<?php include_once 'base.view.php'; ?>

<div class="max-w-4xl p-6 mx-auto">
    <div class="mb-8">
        <h1 class="mb-4 text-2xl font-bold text-primary-dark">Search Results</h1>
        <form action="/search" method="GET" class="flex gap-4">
            <input type="text" 
                   name="q" 
                   value="<?= htmlspecialchars($query) ?>"
                   class="flex-1 px-4 py-2 border rounded-lg border-primary-lighter focus:border-primary-medium focus:ring-2 focus:ring-primary-lighter">
            <button type="submit" 
                    class="px-6 py-2 text-white transition rounded-lg bg-primary-dark hover:bg-primary-medium">
                Search
            </button>
        </form>
    </div>

    <?php if (empty($results)): ?>
        <div class="py-8 text-center">
            <p class="text-gray-600">No results found for "<?= htmlspecialchars($query) ?>"</p>
        </div>
    <?php else: ?>
        <div class="space-y-6">
            <?php foreach ($results as $case): ?>
                <div class="p-6 border rounded-lg border-primary-lighter hover:border-primary-medium">
                    <h2 class="mb-2 text-xl font-semibold text-primary-dark">
                        <?= htmlspecialchars($case['title']) ?>
                    </h2>
                    <div class="mb-2 text-sm text-gray-600">
                        Citation: <?= htmlspecialchars($case['citation']) ?>
                    </div>
                    <p class="text-gray-700">
                        <?= htmlspecialchars($case['excerpt']) ?>
                    </p>
                    <a href="/case/<?= $case['id'] ?>" class="inline-block mt-4 text-primary hover:text-primary-medium">
                        Read full case →
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include_once 'sections/footer.view.php' ?>
