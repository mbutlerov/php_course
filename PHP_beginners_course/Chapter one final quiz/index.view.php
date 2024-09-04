<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chapter one</title>
</head>
<body>
    <h1><?= $business['name'] ?></h1>

    <ul>
        <?php foreach ($business['categories'] as $category) : ?>
            <li><?= $category; ?></li>
        <?php endforeach; ?>

    </ul>
</body>
</html>