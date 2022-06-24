/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Profile Js
 */


 $(function(){
	for(i=0;i<data_klinik.length;i++) {
		var data = data_klinik[i];
		var mymap = L.map('user_map').setView([data.latitude_klinik, data.longitude_klinik], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw', {
		maxZoom: 18,
		attribution: '',
		id: 'mapbox/streets-v11',
		accessToken : 'pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw'
	}).addTo(mymap);

		
		L.marker([data.latitude_klinik, data.longitude_klinik]).addTo(mymap)
			.bindPopup("<b>"+ data.nama_klinik +"</b><br><a target='_blank' "+ "href="+ data.link_gmap + ">"+ data.link_gmap + "</a>");
	
	
	var popup = L.popup();

	// function onMapClick(e) {
	// 	popup
	// 		.setLatLng(e.latlng)
	// 		.setContent("You clicked the map at " + e.latlng.toString())
	// 		.openOn(mymap);
	// }

	// mymap.on('click', onMapClick);
	}
}) 

   // light_datepick
new Lightpick({
	field: document.getElementById('light_datepick'),
	inline: true,                
  });


