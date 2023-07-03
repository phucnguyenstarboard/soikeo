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
                <p>Copyright &copy; 彩加数据(<a href="http://www.zucaijia.com" target="_self" >www.zucaijia.com</a>) &copy; <a href="https://beian.miit.gov.cn" target="_blank" style="color:#969799;" id="ba">京ICP备15021253号-1</a> &copy; 2016</p>
                <div style="width:300px;margin:0 auto; padding:20px 0;">
                    <img src="<?php bloginfo('template_directory');?>//assets/images/ba.png" style="margin-top: -13px;">
                    <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010502039193" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
                        <img src="" style="float:left;"/>
                        <p id="caa"  style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">京公网安备 11010502039193号</p>
                    </a>
                </div>
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
