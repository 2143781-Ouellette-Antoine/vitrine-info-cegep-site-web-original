/*
* @Author: LarochelleJ
* @Date:   2023-03-28 18:06:14
* @Last Modified by:   LarochelleJ
* @Last Modified time: 2023-03-28 20:16:20
*/

// Add the notification zone
let notifications_div = document.createElement('div');
notifications_div.setAttribute('id', 'notifications');

document.body.insertBefore(notifications_div, document.body.firstChild);

function notification(type, texte) {
	let notification = document.createElement('div');
	notification.setAttribute('id', 'notification');

	notification.innerHTML = texte;
	notification.classList.add("show");
	notification.classList.add(type);


	notifications_div.append(notification);

	setTimeout(function(){ 
		notification.className = notification.classList.remove("show");
		setTimeout(function(){
			notification.remove();
		}, 250)
	}, 6000);
}
