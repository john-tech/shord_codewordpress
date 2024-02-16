<?php
function enqueue_my_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');


function my_shortcode_function($atts) {
    // Enqueue jQuery if not already enqueued
    wp_enqueue_script('jquery');

    // Start output buffering
    ob_start();
    ?>
	<style> 
		#form_set {
    			/* margin-left: 584px !important; */	
		}
		#inputt{
			width: 222px !important;
		}
		.rows{
			display: inline-flex;
			float: right;
			}
		#search{
			margin-left: 12px !important;
			color: #fff;
    background-color: var(--superio-theme-color); 
		}
	</style>
	<div id="form_set">

		<form action="<?php echo esc_url( home_url( '/jobs-list-v2/?filter-title=' ) );?>/"  id="myForm" method="get">
			<div class="rows">
				<label for=""> Search by Title</label>
				<input class="form-control" id="inputt" name="filter-title" type="text" value=""> 
				<button type="submit" id="search"> <i class="flaticon-magnifiying-glass"></i></button>
			</div>
			
		</form>

	 
	</div>
    <script>
        // Your jQuery code goes here
        jQuery(document).ready(function($) { 
           if($('.results-filter-wrapper').css('display') == 'block')
			{
				$('#form_set').hide();
			}
        });
    </script>
    <?php
	$output = ob_get_clean();
    return $output;
	}
	add_shortcode('filter_c', 'my_shortcode_function');

?>

