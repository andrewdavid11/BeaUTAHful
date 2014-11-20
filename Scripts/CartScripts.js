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
      
