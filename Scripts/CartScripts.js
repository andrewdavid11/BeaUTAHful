function empty_cart(){
        if(confirm('This will empty your shopping cart, continue?')){
          document.cartForm.command.value='empty';
          document.cartForm.submit();
        }
      }

function update_cart(){
        document.cartForm.command.value='update';
        document.cartForm.submit();
      }
 
 
 /*   not using; was one potential fix for the cart issues I was having with submitting every time even without 
  * using the above functions  
function next_page(){
		document.cartForm.submit();
		window.location.assign("checkout.php");
}
*/
