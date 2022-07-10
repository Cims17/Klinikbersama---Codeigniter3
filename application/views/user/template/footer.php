 <!-- Start Footer 
    ============================================= -->
 <footer class="bg-dark text-light">
 	<div class="container">
 		<div class="f-items default-padding">
 			<div class="row">
 				<div class="col-lg-4 col-md-6 item">
 					<div class="f-item about">
						<div class="row">
							<div class="col-lg-6 ">
								<img src="<?= base_url() ?>assets/user/img/logo-light-dinas.png" alt="Logo">
							</div>
							<div class="col-lg-6">
								<img src="<?= base_url() ?>assets/user/img/logo-light.png" alt="Logo">
							</div>
						</div>
 						<p>
						 Website Klinik Bersama Kabupaten Ponorogo ini merupakan tempat pendaftaran pasien rawat jalan klinik praktik bersama yang berada di Kabupaten Ponorogo
 						</p>
 						<div class="address">
 							<ul>
 								<li>
 									<div class="icon">
 										<i class="flaticon-email"></i>
 									</div>
 									<div class="info">
 										<h5>Email:</h5>
 										<span>support@validtemplates.com</span>
 									</div>
 								</li>
 								<li>
 									<div class="icon">
 										<i class="flaticon-call"></i>
 									</div>
 									<div class="info">
 										<h5>Phone:</h5>
 										<span>+44-20-7328-4499</span>
 									</div>
 								</li>
 							</ul>
 						</div>
 					</div>
 				</div>

 				<div class="single-item col-lg-4 col-md-6 item">
 					<div class="f-item branches">
 						<div class="branches">
 							<ul>
 								<li>
 									<strong>Alamat:</strong>
 									<span>Kantor Dinas Terpadu Jln. Basuki Rahmad Ponorogo 63418 <br> Web: <a href="https://dinkes.ponorogo.go.id/" target="_blank"> dinkes.ponorogo.go.id</a></span>
 								</li>
 							</ul>
 						</div>
 					</div>
 				</div>

 			</div>
 		</div>
 	</div>
 	<!-- Start Footer Bottom -->
 	<!-- <div class="footer-bottom">
 		<div class="container">
 			<div class="row align-center">
 				<div class="col-lg-6">
 					<p>Copyright &copy; 2022. Designed by <a href="#">validtemplatess</a></p>
 				</div>
 			</div>
 		</div>
 	</div> -->
 	<!-- End Footer Bottom -->
 </footer>
 <!-- End Footer -->
 
 <!-- jQuery Frameworks
    ============================================= -->
 <script src="<?= base_url() ?>assets/user/js/jquery-1.12.4.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/popper.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/bootstrap.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/jquery.appear.js"></script>
 <script src="<?= base_url() ?>assets/user/js/jquery.easing.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/jquery.magnific-popup.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/modernizr.custom.13711.js"></script>
 <script src="<?= base_url() ?>assets/user/js/owl.carousel.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/wow.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/isotope.pkgd.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/imagesloaded.pkgd.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/count-to.js"></script>
 <script src="<?= base_url() ?>assets/user/js/jquery.nice-select.min.js"></script>
 <script src="<?= base_url() ?>assets/user/js/bootsnav.js"></script>
 <script src="<?= base_url() ?>assets/user/js/main.js"></script>
 
<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

 <?php if ($this->uri->segment(1) == 'Peta') { ?>
 	<script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.1/dist/L.Control.Locate.min.js" charset="utf-8"></script>
 	<script src="<?= site_url() ?>Peta/Map_data_klinik"></script>
 	<!-- <script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-map-user.init.js"></script>
 -->

 <script type="text/javascript"> 


$(function(){
	
})


 </script>
 <script type="text/javascript"> 


$(function(){
	var mymap = L.map('Leaf_default').setView([-7.8711, 111.4623], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>,' +
			// 'contributors,<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		accessToken : 'pk.eyJ1IjoiY2ltczE3IiwiYSI6ImNsMHZ2MnVwajFiNTgzam8yNnZxaTFodzQifQ.5dNHHzM-4OLdSX6EuJ6QYw'
	}).addTo(mymap);

	for(i=0;i<data_klinik.length;i++) {
		var data = data_klinik[i];
		L.marker([data.latitude_klinik, data.longitude_klinik]).addTo(mymap)
			.bindPopup("<b>"+ data.nama_klinik +"</b><br><a target='_blank' "+ "href="+ data.link_gmap + ">"+ data.link_gmap + "</a>");
	}

	//cek lokasi user
	
	if(!navigator.geolocation) {
        console.log("Your browser doesn't support geolocation feature!")
    } else {
		setInterval(() => {
            navigator.geolocation.getCurrentPosition(getPosition)
        }, 10000);
    }

	

    // function getPosition(position){
    //     // console.log(position)
    //     var lat = position.coords.latitude
    //     var long = position.coords.longitude
    //     var accuracy = position.coords.accuracy

    //     console.log("Your coordinate is: Lat: "+ lat +" Long: "+ long+ " Accuracy: "+ accuracy)
    // }


	L.control.locate().addTo(mymap);
	


	var popup = L.popup();

	// var singleMarker = L.Marker([-7.8711, 111.4623]);
	// singleMarker.addTo(mymap);

	// var overlays = {
	// 	"Marker" : singleMarker,
	// }

	// L.control.layers(overlays).addTo(mymap)


function getPosition(position){
	$('#jarak_lokasi').empty()
	var lat = position.coords.latitude
    var long = position.coords.longitude

	Number.prototype.toRad = function() {
		return this * Math.PI / 180;
	 }
	 
	 var lat2 = lat; 
	 var lon2 = long; 
	 <?php foreach($get_klinik as $gk) { ?>
	 var lat<?= $gk['id_klinik'] ?> = <?= $gk['latitude_klinik'] ?>; 
	 var lon<?= $gk['id_klinik'] ?> = <?= $gk['longitude_klinik'] ?>; 
	 
	 var R<?= $gk['id_klinik'] ?> = 6371; // km 
	 //has a problem with the .toRad() method below.
	 var x<?= $gk['id_klinik'] ?> = lat2-lat<?= $gk['id_klinik'] ?>;
	 var dLat<?= $gk['id_klinik'] ?> = x<?= $gk['id_klinik'] ?>.toRad();  
	 var x<?= $gk['id_klinik'] ?> = lon2-lon<?= $gk['id_klinik'] ?>;
	 var dLon<?= $gk['id_klinik'] ?> = x<?= $gk['id_klinik'] ?>.toRad();  
	 var a<?= $gk['id_klinik'] ?> = Math.sin(dLat<?= $gk['id_klinik'] ?>/2) * Math.sin(dLat<?= $gk['id_klinik'] ?>/2) + 
					 Math.cos(lat<?= $gk['id_klinik'] ?>.toRad()) * Math.cos(lat<?= $gk['id_klinik'] ?>.toRad()) * 
					 Math.sin(dLon<?= $gk['id_klinik'] ?>/2) * Math.sin(dLon<?= $gk['id_klinik'] ?>/2);  
	 var c<?= $gk['id_klinik'] ?> = 2 * Math.atan2(Math.sqrt(a<?= $gk['id_klinik'] ?>), Math.sqrt(1-a<?= $gk['id_klinik'] ?>)); 
	 var d<?= $gk['id_klinik'] ?> = R<?= $gk['id_klinik'] ?> * c<?= $gk['id_klinik'] ?>; 

	 $("#jarak_lokasi").append("<li > <span> <?= $gk['nama_klinik'] ?></span><div class='float-right'>"+ Math.round(d<?= $gk['id_klinik'] ?>)  +" KM</div></li>");
	 
	 <?php } ?>
	//  alert(Math.round(d25));
	}

	// function onMapClick(e) {
	// 	popup
	// 		.setLatLng(e.latlng)
	// 		.setContent("You clicked the map at " + e.latlng.toString())
	// 		.openOn(mymap);
	// }

	// mymap.on('click', onMapClick);

    
})


 </script>
 <?php } ?>


 </body>

 </html>
