Added toggle admin/user button. *I refer to the button (no matter current the access level) as "admin button"
	-The admin button contains a form that submits the page's CURRENT $action and OPPOSITE $access.
		-This means when the user clicks on the admin button, it refreshes the page they were on when they clicked the admin button, which is nice. 

	
	-Added two new files to a new directory. The directory is add_or_edit. The files are "addOrEditAbout.php" and "addOrEditProducts.php"
		-The purpose of this directory is to hold the files that are called whenever the user switches from "customer view" to "admin view" and  they were on public/about.php or public/products.php
		-The other files that don't have an "admin view" (meaning details.php and cart.php) should switch to admin view of the "home" page.


	-Created a new directory called home. The new dir has a new file "home/home.php" page. 
		-This is the default page for when the user first get onto the site, and is also called when the user switches from "customer view" to "admin view" when they are on a page that doesn't have an "admin view". (Unless we go with another option)
		-home/home.php looks the exact same for "admin view" and "customer view"






Added "Add To Cart" Btn. on the foreach of public/products.php
	-Links to cart/cart.php 






Added another key value pair to the href of the nav bar (accessType).
	-Now it stays in the "admin view" instead of defaulting to "customer view" when you clicked on the <a> tags of the nav bar.






Added "Home" to the Nav Bar
	-Redirects to home/home.php






Styling
	-Added a wee bit of styline to the nav bar links.
		-They're a pretty red.

	-Added productForm styling. (Not Responsive, but responsive isn't a requirement.)

	




