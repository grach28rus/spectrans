<?php
/* @var $category array */
/* @var $dataForMenu array */

?>
<li class="dropdown">
    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
        Техника
        <b class="caret">
        </b>
    </a>
    <ul class="sub-menu-item dropdown-menu multi-level">
        <?php foreach ($dataForMenu as $categoryId => $types) : ?>
        <li class="dropdown dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <?= $category[$categoryId] ?>
            </a>
            <ul class="sub-menu-item dropdown-menu multi-level">
            <?php foreach ($types as $type) : ?>
                <li class="dropdown">
                    <a href="/buses/buses-list?id=<?= $type->id ?>" style="position: relative">
                        <?= $type->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <?php endforeach; ?>
    </ul>
</li>