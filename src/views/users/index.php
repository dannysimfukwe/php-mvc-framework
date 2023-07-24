<html>
    <title>Hello world</title>

    <body class="text-center">
        <?php foreach($users as $user): ?>
            <li><?php echo $user['first_name']; ?></li>
        <?php endforeach; ?>
        <hr/>
        <?php foreach($like_users as $user): ?>
        <li><?php echo $user['first_name']; ?></li>
        <?php endforeach; ?>
    </body>
</html>

