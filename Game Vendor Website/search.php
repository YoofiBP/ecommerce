<script>

function fx(search)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (search.length==0) {
    document.getElementById("livesearch").innerHTML="";
    return;
  }
  xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();
}
</script>
			<form method="get">
              	<input type="text" onKeyUp="fx(this.value)" name="qu" id="qu" class="textbox" placeholder="What are you looking for ?" tabindex="1">
		    	<div id="livesearch"></div>
			</form>
