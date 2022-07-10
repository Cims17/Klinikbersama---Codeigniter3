/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Leaflet Map Js Tambah Klinik
 */


 $(function(){ 
	//MAP TAMBAH KLINIK
	var latInput = document.querySelector("[name=latitude]");
	var lngInput = document.querySelector("[name=longitude]");
	var marker;

	var mymapedit = L.map('Leaf_default_edit').setView([-7.8711, 111.4623], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>,' +
			// 'contributors,<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		accessToken : 'pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw'
	}).addTo(mymapedit);



	// L.marker([-7.8646, 111.461218]).addTo(mymapedit)
	// 	.bindPopup("<b>Hello world!</b><br />Dinas Pengairan.").openPopup();

	// L.circle([51.508, -0.11], 500, {
	// 	color: 'red',
	// 	fillColor: '#f03',
	// 	fillOpacity: 0.5
	// }).addTo(mymapedit).bindPopup("I am a circle.");

	// L.polygon([
	// 	[51.509, -0.08],
	// 	[51.503, -0.06],
	// 	[51.51, -0.047]
	// ]).addTo(mymapedit).bindPopup("I am a polygon.");


	// var popuptambah = L.popup();

	function onMapClicktambah(e) {
		var lat = e.latlng.lat;
		var lng = e.latlng.lng;
		if(!marker){
			marker = L.marker(e.latlng).addTo(mymapedit);
		} else{
			marker.setLatLng(e.latlng);
		}
		

		latInput.value = lat;
		lngInput.value = lng;
	}

	mymapedit.on('click', onMapClicktambah);

 })
