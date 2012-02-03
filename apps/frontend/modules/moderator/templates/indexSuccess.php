<h1>Moderate new contents</h1>

<h2>Translations</h2>
<?php include_partial('moderator/modelList', array('models' => $translations, 'name' => 'translation')) ?>

<h2>Chapters</h2>
<?php include_partial('moderator/modelList', array('models' => $chapters, 'name' => 'chapter')) ?>

<h2>Sections</h2>
<?php include_partial('moderator/modelList', array('models' => $sections, 'name' => 'section')) ?>
