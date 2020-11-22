$(document).ready(function(){
	
	if (document.cookie.indexOf("data") > -1) {
		var tasks_str = getCookie("data");
		var tasks = tasks_str.split(",");
		var arraylength = tasks.length - 1;
		if (arraylength > 0) {
			for (var i = arraylength; i >=0; i--){
				add_task(tasks[i]);
				console.log(tasks[i]);
			}
		}
	}
	$("#add_new").click(function(){
		var new_task = "";
		if (!(new_task = prompt("New todo item:", ""))){
			return;
		}
		if (new_task === "")
			return;
		add_task(new_task);
		var cookie_string = "";
		var old_cookie_string = getCookie("data");
		cookie_string = new_task + "," + old_cookie_string;
		console.log(cookie_string);
		setCookie("data", cookie_string, 5);
		console.log("paastiin tanne");
		console.log(getCookie("data"));
		window.location.reload();
  });

  $(".item").click(function() {
	if (!confirm("Are you sure you want to remove this item?")) {
		return
	}
	var name = $(this).attr('name');
	console.log(name);
	var old_name = name + ","
	var old_cookie_string = getCookie("data");
	console.log(old_cookie_string);
	var new_cookie_string = old_cookie_string.replace(old_name, '');
	console.log(new_cookie_string);
	setCookie("data", new_cookie_string, 5);
	$(this).remove();
	});

});

function add_task(new_task) {
	var elem = '<div class=\"item\" name=\"' + new_task + '\">' + new_task + '</div>';
	$("#ft_list").prepend(elem);

}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
	  var c = ca[i];
	  while (c.charAt(0) == ' ') {
		c = c.substring(1);
	  }
	  if (c.indexOf(name) == 0) {
		return c.substring(name.length, c.length);
	  }
	}
	return "";
  }

function setCookie(cname, cvalue, emin) {
	var d = new Date();
	d.setTime(d.getTime() + (emin*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function functionConfirm(msg, myYes, myNo) {
	var confirmBox = $("#confirm");
	confirmBox.find(".message").text(msg);
	confirmBox.find(".yes,.no").unbind().click(function() {
	   confirmBox.hide();
	});
	confirmBox.find(".yes").click(myYes);
	confirmBox.find(".no").click(myNo);
	confirmBox.show();
 }