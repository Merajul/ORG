
<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; ?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>Organogram</h5>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                
                    <img src="images/ORGANOGRAM_01.jpg" class="org_gram">
               
                
            </div>
        </div>
    </div>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>

</div>

<?php include 'footer.php'; ?>
<!--        -------------------------- footer end ----------------------------->
