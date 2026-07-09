<!-- Character Encoding & Viewport -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php /** @var \Z77\Shared\Entities\MetaData|null $metaData */ ?>
<!-- Author & Theme Color -->
<meta name="author" content="Max Mustermann">
<meta name="theme-color" content="<?= e($metaData?->getThemeColor() ?: '#ffffff') ?>">
