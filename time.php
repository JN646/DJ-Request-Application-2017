<?php  
  print date("m/d/y G.i:s<br>", time()); 
  //Outputs i.e. 12/26/13 18.36:50

  print "Today is ";
  print date("j \of\ F Y, \a\\t g.i a", time());
  //Outputs i.e. Today is 26 of December 2013, at 6.36 pm
?>