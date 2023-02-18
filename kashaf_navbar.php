<?php


// Verify that program was called from kashaf_php and Faculty User
  require('kashaf_landing.php');

// Variables
  $pwidth = '1030';
  
// Output Navigation Bar  
  echo "<table width='$pwidth' align='center'><tr><td><div>\n";
		
// Links for Style Sheet and JavaScript Functions
// Link to styles used for our Navigation Bar
  echo "<link href=\"kashaf_NavBarStyles.css\" rel=\"stylesheet\" type=\"text/css\">\n";

// Link to a file with couple simple JavaScript functions used for our Navigation Bar
  echo "<script src=\"kashaf_NavBarScripts.js\" language=\"JavaScript\" type=\"text/javascript\"></script>\n";





			 
  echo "<div class='mynavbar'>
		<a class='navbartitle' id='t1' href='kashaf.php?p=home'
		>Home </a>\n";
		
  echo "<a class='navbartitle' id='t2' href='kashaf.php?p=contact'
		>Contact Us </a>\n";
  echo "<a class='navbartitle' id='t3' href='kashaf.php?p=clothing'
		>Shop Clothing </a>\n";
			

if (($logon) AND ($page != "kashaf_logoff.php")){	
  echo "<a class='navbartitle' id='t4' href='kashaf.php?p=customers'
		onMouseOut=\"HideItem('account_submenu');\"
		onMouseOver=\"ShowItem('account_submenu');\"
		>$suser Account </a>\n";  
		
  echo "<a class='navbartitle' id='t5' href='kashaf.php?p=logoff'
	>Logged in as: $suser Click to Log out </a>\n";
} else {
	
echo "<a class='navbartitle' id='t6' href='kashaf.php?p=logon'
		onMouseOut=\"HideItem('login_submenu');\"
		onMouseOver=\"ShowItem('login_submenu');\"
		>Customer Login/Register </a>\n";	
}

	



  echo "<div class='submenu' id='login_submenu'
		onMouseOver=\"ShowItem('login_submenu');\" 
		onMouseOut=\"HideItem('login_submenu');\">\n";
  
  echo "<div class='submenubox'>
		<ul>
		<li><a href='kashaf.php?p=logon' 					class='submenlink'>Login </a></li>
		<li><a href='kashaf.php?p=custregister' 	class='submenlink'>New Customer? Register </a></li>
		</ul>
		</div>
		</div>\n";
  



if (($logon) AND ($page != "kashaf_logoff.php")) {			
  echo "<div class='submenu' id='account_submenu' 
		onMouseOver=\"ShowItem('account_submenu')\" 
		onMouseOut=\"HideItem('account_submenu');\">\n";
  
  echo "<div class='submenubox'>
		<ul>
		<li><a href='kashaf.php?p=customer_profile' 		class='submenlink'>Customer Profile </a></li>
		<li><a href='kashaf.php?p=customer_past_orders'		class='submenlink'>Purchases </a></li>
		<li><a href='kashaf.php?p=wish_list' 				class='submenlink'>Wish list </a></li>		
		</ul>
		</div>
		</div>\n";
  }


		
  echo "</div>\n";

  echo "</div></td></tr></table>\n";


?>