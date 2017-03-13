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

            <?php if (\yii\helpers\ArrayHelper::keyExists($categoryId, $category)) : ?>
                <li class="dropdown dropdown-submenu">
                    <a href="/buses/buses-list?id=''&category_id=<?= $categoryId ?>" class="dropdown-toggle">
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
            <?php else : ?>
                <li class="dropdown">
                    <a href="/buses/buses-list?id=<?= $types->id ?>" style="position: relative">
                        <?= $types->name ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</li>