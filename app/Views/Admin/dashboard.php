 <!--Container Main start-->
 <div class="mb-4">
     <h4>Hello <?php  $first_name = session()->get('first_name') ; echo (!empty($first_name)) ?  $first_name  : '' ;?>, welcome to I Admin pannel..!</h4>
 </div>
 <div class="row">
 </div>
 <!--Container Main end-->