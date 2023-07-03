<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
	    <!-- 开始：页脚 -->
        <div class="copy-rights text-center" style="background-color:#070b13;">
            <div class="container">
                <p>Copyright &copy; <a href="" target="_blank" style="color:#969799;" id="ba">Soi  kèo</a> &copy; 2023</p>                
            </div>
        </div>
        <!-- 结束：页脚 -->
        <script type="text/javascript">
            $(document).ready(function() {
            	
            	$(".scroll").click(function(event){		
            		event.preventDefault();
            		$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            	});
            	
            	$().UItoTop({ easingType: 'easeOutQuart' });
            });
        </script>
        <a href="#defaultmenu" class="scroll" id="toTop" style="display: block;">
        <span id="toTopHover" style="opacity: 1;"></span>
        </a>
	</body>
</html>
