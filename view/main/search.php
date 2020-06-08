<div class="header-search">
	<form method="POST" autocomplete="off">
		<input id="search" name="search" class="input search-input" type="text" placeholder="Bạn muốn tìm kiếm?">
		<button type="submit" name="submit"  class="search-btn"><i class="fa fa-search"></i></button>
	</form>
</div>
<div  style="position: absolute;margin-top: -15px;margin-left: 172px; z-index: 9999; width: 330px ">
	<div class="list-group" id="show-list">
		

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#search").keyup(function(){
			var searchText = $(this).val();
			if(searchText != ''){
				$.ajax({
					url:'app/ajax/search.php',
					method:'POST',
					data:{query:searchText},
					success:function(response){
						$("#show-list").html(response);
					}
				});
			}
			else{
				$("#show-list").html('');
			}
		});
		$(document).on('click','a',function(){
			$("#search").val($(this).test());
			$("#show-list").html('');
		});
	});
</script>