
<!--        -------------------------- header end----------------------------->
<?php include 'header.php'; ?>
<!--        -------------------------- slider start----------------------------->
<div class="container-fluid content">
    <div class="row">
        <div class="col-lg-12 col-md-12 padding vission-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding heading">
                <h5>Trustee</h5>
            </div>

            <script type="text/javascript">
            function show(){
                alert('fei');
            }
            
        </script>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 col-lg-offset-1 padding vission-content-box">
                <div class="col-md-6 image_box">
                    <img class="example-image thumbnail gallery-image" style="height: 250px;float:none;" onmouseover="alert('asdfasdf');" src="images/photo/amanullah (1).png">
                    <h2 onmouseover="alert('asdfsdf');"> Mohamsdfsdfmad Shahinur Rashid </h2>
                    <h3> Aman ullah  </h3>
                   <div class="tooltip" id="tooltip">
                       <h1 class="name" >Amanullah Chowdhury</h1>
                    <h5 class="position">Chife Adviser and Walpaper Secretary</h5>
                    <P>
                    <h3>HIS TECHNICAL QUALIFICATIONS:-</h3>
                    <ul>
                        <li>Registered Pharmacists New York State U.S.A.</li>
                        <li>M.S. in Pharmaceuticals Science from the St. John University, New York.</li>
                        <li>Graduate Course in Biomedical Communication in Columbia University, New York.</li>
                        <li>Sales Management Training Program from American Hoechst Corporation, New Jersey.</li>
                        <li>Automated Chemical analysis from Calibiochem-Behring Corporation California</li>
                        </P>
                        <h3> HIS PROFESSIONAL QUALIFICATIONS :-</h3>
                        <ul>
                            <li> President Superpharmacal Laboratories & Vice President Superpharm Corporationa genuine pharmaceutical manufactures New York, from 1979 to 1981. </li>
                            <li> District Sales Manager Calibiochem Behring Corporation U.S.A. from 1977 to 1979. </li>
                            <li> Senior Sales Representative Behring Corporation, a subsidiary of American Hoechst Corporation from 1974 to 1977. </li>
                            <li> Production Supervisor, Department of Pharmacy, Tehleting and Syrup Ketchum Laboratories New York from 1972 to 1974. </li>
                        </ul>
                        <h3> HIS BUSINESS ORGANIZATION AND MANAGEMENT EXPERIENCE :-</h3>
                        <ul>
                            <li> Managing Director of Sea Fishers Group of Companies consisting of 3 Export oriented Deep Sea Fishing Companies & 4 other companies.  </li>
                            <li> Overall responsible for Planning, Marketing of Automobile namely Mitsubishi Motor Corporation. </li>
                            <li> Vice-Chairman of Rangs Group of Companies. </li>
                            <li> Chairman of 4DL Bangladesh Limited. </li>
                        </ul>
                   </div>
                </div>
                <div class="col-md-6 image_box">
                    <img class="example-image thumbnail gallery-image" style="height: 250px;float:none;"  src="images/photo/amanullah (1).png">
                    <h2> Mohammad Shahinur Rashid </h2>
                    <h3> Aman ullah  </h3>
                     <div class="tooltip">sdfsdfsdfsdfs</div>
                </div>

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
