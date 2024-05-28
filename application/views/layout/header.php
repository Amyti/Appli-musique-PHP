<!doctype html>
<html lang="en" class="has-navbar-fixed-top">
	<head>
		<meta charset="UTF-8" />
		<title>SPOUTIFAYE</title>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
/>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <?=link_tag('assets/style.css')?>

   <style>

    .btn {
      display: inline-block;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      border-radius: 5px;
      color: #fff;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px; 
    }

    .navbar .search {
      flex-grow: 1;
    }

    .navbar form {
      display: flex;
      justify-content: center; /* Centrer le contenu du formulaire */
      width: 100%; /* Assurer que le formulaire occupe tout l'espace disponible */
    }

    .btn-login{
      background-color: #4CAF50;
    }

    .btn-logout {
      background-color: #f44336;
    }

    .btn-login:hover, .btn-logout:hover {
      opacity: 0.8;
    }

    .logo{
      color: green;
      
      display: inline-block;

    }
   </style>
	</head>
  
	<body>
		<main class='container'>
			<nav>
      <ul class="navbar">
    <h5 class="logo"><li ><strong>Spotif'aïe</strong></li></h5>

    <li class="search">

    <form method="GET">
      <input type="text" name="query" placeholder="Rechercher...">
    </form>
  </ul>
  <ul>

  <li><?=anchor('albums','Albums');?></li>
  <li><?=anchor('artistes','Artistes');?></li>
  <li><?=anchor('music','Musiques');?></li>
  
  <?php if($this->session->userdata('logged_in')){ ?>
  <li><?php echo anchor('playlist','Playlist'); ?></li>

  <li><?php echo anchor('user/logout','Deconnexion', ['class' => 'btn btn-logout']);?></li>   
  <?php }else{ ?>
  <li> <?php  echo anchor('user/create','S\'inscire'); ?> </li>    
      
  <li> <?php echo anchor('user/auth','Se connecter', ['class' => 'btn btn-login']); ?> </li> 
    <?php } ?>
  
  </ul>
</nav>
