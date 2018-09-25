<h2><?php echo $title; ?></h2>

<?php foreach($QryOutput as $QryField) : ?> 
	<h3><?php echo $QryField['strTitle']; ?></h3>
	<small class="post-date">Posted on <?php echo $QryField['dteCreated']; ?></small>
	<p><?php echo substr($QryField['strBody'],0,400); ?>...</p>
	<!-- anything under posts are rerouted to posts/view. se routes.php -->
	<p><a class="btn btn-info btn-sm" href="<?php echo site_url('posts/' .$QryField['strSlug']); ?>">Read More</a></p> 

<?php endforeach; ?>  