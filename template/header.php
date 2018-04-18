<nav class="navbar navbar-inverse navbar-fixed-top">
      	<div class="container">
	        <div class="navbar-header">
	        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
	          	<a class="navbar-brand" href="?page=">SIMUsul</a>

	        </div>
        
	        <div id="navbar" class="navbar-collapse collapse">
	          	<ul class="nav navbar-nav">
	          		<?php 
						if($akses_user['type_user']==1) {
	          		?>
				            <li><a href="?page=usulan">Usulan</a></li>
				            <li><a href="?page=manajemen">Manajemen</a></li>
				            <li><a href="?page=admin">Administrator</a></li>
				            <li><a href="?page=logout">Logout</a></li>
		            <?php 
		            	} elseif ($akses_user['type_user']==2) {
		            ?>
		            		<li><a href="?page=usulan">Usulan</a></li>
				            <li><a href="?page=logout">Logout</a></li>
				    <?php 
		            	} elseif ($akses_user['type_user']==3) {
		            ?>
		            		<li><a href="?page=manajemen">Manajemen</a></li>
				            <li><a href="?page=logout">Logout</a></li>
		            <?php
		            	}
		            ?>
	          	</ul>

	        
	          	
	        </div><!--/.nav-collapse -->
      	</div>
    </nav>