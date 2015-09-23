<?php
/**
 * @package WordPress
 * @subpackage Drochilli_Theme
 */
?>

		</div>

	</div>

	

</div>

<?php wp_footer(); ?>
	<script type="text/javascript">
    var hm=$('body').height(); 
var hd=$("#header").height();
var h_c=$("#page").height(); 
	/*var body = document.body,
    html = document.documentElement;

var h= Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
		document.getElementById("content").style.height = h+"px";
		var hnews = h-83-276;
		var elems = document.getElementsByClassName('news');
		for(var i = 0; i < elems.length; i++) {
		    elems[i].style.minHeight = hnews+"px";
		}
		var k = h-158-20;
		document.getElementById("news_title").style.height = k+"px";
*/
	</script>
	<script type="text/javascript">
	/*var body = document.body,
    html = document.documentElement;

var h= Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
		document.getElementById("content").style.height = h+"px";
		var hnew_jp_class = h-83;
		var elems = document.getElementsByClassName('jp_class');
		for(var i = 0; i < elems.length; i++) {
		    elems[i].style.minHeight = hnew_jp_class+"px";
		}
		var timetable = h-83-40;
		document.getElementById("time_table_block").style.maxHeight = timetable+"px";
*/
var h_body=$("body").height(); 
var h_content=$("#content").height(); 
var h_header=$("#header").height(); 
var h_news = $('.news').height();
var nav_pagination =$('.custom-pagination').height();
var h_info =$('.info').height();
if(h_content<h_body){
var total_content = h_body-h_header;
var total_news = total_content-h_news+h_news;
var total_info = (total_content-(nav_pagination+h_news));
$("#content").css("min-height",total_content+"px");
$(".posts, .jp_class").css("min-height",(total_content)+"px");
$(".info").css("min-height",(total_info)+"px");
}
	</script>
                        <script>
				$(".b-arrow").click(function(event){
				  $("#user-profile").toggle("slow");
                                });
			  </script>
</body>
</html>

<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->