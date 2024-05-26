<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
		/>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur votre tableau de bord, <?php echo $this->session->userdata('username'); ?>!</h1>
        <p>Email: <?php echo $this->session->userdata('email'); ?></p>
        <a href="<?php echo site_url('todo'); ?>">Votre todo list</a>
        <a href="<?php echo site_url('user/logout'); ?>">Déconnexion</a>
    </div>
</body>
</html>
