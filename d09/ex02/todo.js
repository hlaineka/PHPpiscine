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

function add_new() {
	var new_task = "";
	if (!(new_task = prompt("New todo item:", ""))){
		return;
	}
	if (new_task === "")
		return;
	add_task(new_task);
	var cookie_string = "";
	var old_cookie_string = "";
	if (document.cookie.indexOf("data") > -1)
		old_cookie_string = getCookie("data");
	cookie_string = new_task + "," + old_cookie_string;
	console.log(cookie_string);
	setCookie("data", cookie_string, 5);
	console.log("paastiin tanne");
	console.log(getCookie("data"));
}

function add_task(new_task) {
	var new_task_elem = document.createTextNode(new_task);
	var elem = document.createElement('div');
	elem.setAttribute("id", new_task);
	elem.appendChild(new_task_elem);
	elem.onclick=function(){remove(new_task)};
	document.getElementById('ft_list').prepend(elem);
}

function remove(old_name) {
	if (!confirm("Are you sure you want to remove this item?")) {
		return
	}
	document.getElementById(old_name).remove();
	old_name = old_name + ","
	var old_cookie_string = getCookie("data");
	console.log(old_cookie_string);
	var new_cookie_string = old_cookie_string.replace(old_name, '');
	console.log(new_cookie_string);
	setCookie("data", new_cookie_string, 5);
}

function on_load() {
	var new_task = "";
	if (document.cookie.indexOf("data") > -1) {
		console.log("here");
		var tasks_str = getCookie("data");
		console.log(tasks_str);
		var tasks = tasks_str.split(",");
		var arraylength = tasks.length - 1;
		console.log(arraylength);
		if (arraylength > 0) {
			for (var i = arraylength; i >=0; i--){
				add_task(tasks[i]);
				console.log(tasks[i]);
			}
		}
	}
	else {
		console.log("on_load");
	}
}