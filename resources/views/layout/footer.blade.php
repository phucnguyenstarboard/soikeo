
        <div class="copy-rights text-center" style="background-color:#134e14;">
            <div class="container">
                <p>Copyright &copy; <a href="" target="_blank" style="color:#969799;" id="ba">Soi  kèo</a> &copy; 2023</p>
            </div>
        </div>

        <div class="banner_adv">
            <div class="inner">
               <img src="{{ asset('assets/images/banner_adv.gif') }}">
            </div>
        </div>
        
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