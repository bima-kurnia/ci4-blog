<ul class="join">
    <?php foreach ($pager->links() as $link): ?>
        <li>
            <a href="<?= $link['uri']; ?>"
               class="join-item btn btn-sm <?= $link['active'] ? 'btn-primary' : '' ?>">
                <?= $link['title']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>