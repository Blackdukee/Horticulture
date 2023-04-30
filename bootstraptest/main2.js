


    function fetch_data(page) {
      let container = document.querySelector('.container');
      $.ajax({
        url: "pagination.php",
        method: "POST",
        data: { page: page },
        
        success: function (data) {
          // makaing the returned data into a dom object
          let two = new DOMParser().parseFromString(data, "text/html");
          
          globalThis.itemSize = two.querySelectorAll('.fa-heart').length;
          // getting the heart icons from the dom object
          globalThis.fav = two.querySelectorAll('.fa-heart');
          
          // getting the json array from the dom object
          let array = two.querySelector('jsontag');
          
          // making the json array global which is the array of favorties items 
          globalThis.jsonarray = JSON.parse(array.textContent);
          
          $('.gridsys').html(two.querySelectorAll('.col'));
          //prevent the pagination from being duplicated
          if (container.hasChildNodes(two.querySelector('.pagination'))) {
            container.removeChild(container.lastChild);
            container.appendChild(two.querySelector('.pagination'));
          }
        }
      });
    };
    
    fetch_data();
    
    $(document).on('click', '.page-item', function () {
      var page = $(this).attr("id");
      fetch_data(page);
    });
    
    
    // prevent the user from clicking the heart icon too fast
    let lastClickTime = new Date().getTime();
    
    
    // when the user clicks the heart icon
    $(document).on('click', '.fa-heart', function () {
      // get the heart icon
      let heart = $(this);
      // get the id of the heart icon
      let id = heart.attr("id");
      // get the last digit of the id which is the id of the item
      globalThis.digitid = +id[id.length - 1];
      // get the items from the json array
      
      const currentTime = new Date().getTime();
      if (currentTime - lastClickTime < 600) {
        return; // Ignore the click if it was too soon after the last one
      }
      
      pressed(heart[0]);
      console.log("clicked");
      lastClickTime = currentTime;
    
    });


    function pressed(heart) {
    
      
      if (heart.classList.contains("fa-regular")) {
      
        heart.classList.toggle("fa-bounce");
        // make it move for 1 second
        setTimeout(function () {
          heart.classList.toggle("fa-bounce");
        }, 1000);
        
        heart.classList.remove("fa-regular");
        heart.classList.add("fa-solid");
        
        $.ajax({
          url: "items.php",
          method: "POST",
          data: { id: digitid , remove: false},
          success: function (data) {
            console.log(data);
            stringofid = digitid.toString();
            console.log(stringofid);
            jsonarray.push(stringofid);
            console.log(jsonarray);
            array.push(digitid);
            console.log(array);
            
          }
        });
        
      } else {
        heart.classList.toggle("fa-bounce");
        setTimeout(function () {
          heart.classList.toggle("fa-bounce");
        }, 1000);
        heart.classList.remove("fa-solid");
        heart.classList.add("fa-regular");
        $.ajax({
          url: "items.php",
          method: "POST",
          data: { id: digitid , remove: true},
          success: function (data) {
            console.log(data);
            jsonarray = jsonarray.filter(item => item !== digitid.toString());
            array = array.filter(item => item !== digitid);
            console.log(array);
            console.log(jsonarray);
          }
        });
      }


    }
    
    function ifINFavorites(fav) {
    
      let heart = fav;
      let heartarray = Array.from(heart);
      globalThis.array = [] ;
    
      for( let i = 0 ; i < jsonarray.length ; i++){
            array.push(+jsonarray[i]);
      }
      console.log(array);
      for(let i = 0; i < itemSize; i++){
        if (array.includes(+heartarray[i].id[heartarray[i].id.length - 1])) {
          heartarray[i].classList.remove("fa-regular");
          heartarray[i].classList.add("fa-solid");
        }
      }
      
    }
  
  $(document).ajaxComplete(function () {
    ifINFavorites(fav);
  });
  
  
let cart = document.querySelector('.cartShopping');
console.log(cart);


cart.addEventListener('mouseover', () => {
  cart.classList.add('cartShoppingFocus');
  
    console.log(cart);
});
cart.addEventListener('mouseout', () => {
  cart.classList.remove('cartShoppingFocus');
});
