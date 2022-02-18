<footer class="page-footer <?php echo $settings['primary_color']; ?>">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">About Us:</h5>
                <p class="grey-text text-lighten-4">At ExaMocks, we believe that anyone and everyone can achieve their goals, provided the best resources and study material. We all know Knowledge is of no value unless you put it into practice and with that thought we are on a mission to reshape the process of exam preparation by providing best in class Online Mock Test experience to evaluate preparation level. Exam before the real exam helps in time management, imbuing confidence and most importantly eliminating the weak spots.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2022 Copyright ExaMocks
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script>
	 document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.sidenav');
		var instances = M.Sidenav.init(elems);
	  });

	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('.dropdown-trigger');
			var instances = M.Dropdown.init(elems,{
				alignment : 'left'
			});
		});
	</script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js" defer async ></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js" defer async ></script>