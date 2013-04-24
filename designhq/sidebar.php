				<div id="right">
					<?php 
					if (is_page()) echo dynamic_sidebar('Sidebar for pages');
					else  include "sidebar-blog.php";
					
					?>					
					<div class="x"></div>		
				</div>
