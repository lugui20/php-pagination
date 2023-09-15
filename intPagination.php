<?php
class IntPagination
{
	public function viewPagination($pagesVector, $baseLink, $currentPage)
	{
		?>

			<div class="center" style="width:248px;"><?php 
				for($i = 0; $i <= 6; $i++) {
					if($pagesVector[$i][0])
						$this->link($i, $pagesVector[$i][1], $baseLink, $currentPage); 
					else
						$this->text($i, $pagesVector[$i][1]);
				}
			?></div>
		<?php
	}
	
	public function link($position, $page, $baseLink, $currentPage)
	{
			?>

			<a 
				href="<?php echo $baseLink . "?page=" . $page; ?>" 
				class="button-square<?php 
					if(($page == $currentPage) && ($position != 0) && ($position != 6)) 
						echo " button-active"; ?>"
			><?php 
				if($position == 0) echo "&laquo"; 
				else if($position == 6) echo "&raquo;"; 
				else echo $page;
			?></a>

		<?php
	}

	public function text($position, $page)
	{
		?>

			<p class="button-square button-inactive"><?php
					if($position == 0) echo "&laquo"; 
					else if($position == 6) echo "&raquo;"; 
					else echo $page; 
			?></p>
		<?php
	}	

	public function viewStats($showing)
	{
		?>

			<div class="center" style="width:260px; text-align:center;">				
				<span style="font-size: 13px; font-family: Arial, Helvetica, sans-serif, sans-serif;">
					Showing results 
					<b><?php echo $showing[0]; ?></b> to <b><?php echo $showing[1]; ?></b>, 
						from <b><?php echo $showing[2]; ?></b>.					
				</span>
			</div>	
		<?php
	}
}
?>