<footer>
   <div class="row">
      <div class="copyright">
         <div>&copy; Copyright 2016 - T.A.D - Tous droits réservés</div>
      </div>
      <div class="contact">
         <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Nous contacter</a>
      </div>
   </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- <script src="<?= $this->assetUrl('js/jquery-2.2.4.js') ?>"></script> -->


<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> 
<!-- <script src="<?= $this->assetUrl('js/jquery-ui-1.12.0.js') ?>"></script> -->


<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script> -->

<script src="https://jqueryui.com/resources/demos/datepicker/i18n/datepicker-fr.js"></script>

<script>
$( function() {
    // SELECT
    $( "#id_sport" ).selectmenu();
    $( "#level" ).selectmenu();
    $( "#nb_participant" ).selectmenu();
    $( "#time" ).selectmenu();
    // DATEPICKER
    // Datepicker dans le header
    $( "#datepicker_header" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
    $( "#datepicker_header" ).datepicker( $.datepicker.regional[ "fr" ] );
    // Datepicker dans le formulaire
    $( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
    $( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );

  } );
  </script>

<?= $this->section('scripts') ?>

</body>
</html>