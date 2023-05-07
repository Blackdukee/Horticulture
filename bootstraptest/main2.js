// Description: This file contains the main javascript code for the website
let test = document.querySelectorAll('.fa-heart');
var jsonarray = [];
globalThis.spinnder = document.querySelector('.spin');
globalThis.spinner = document.querySelector('.cart-spin');
let active = document.querySelector('[name="category"]');
let allcategory = document.querySelectorAll('[name="category"]');
let tabid;
let it = document.querySelector('.tab-pane');

 


allcategory.forEach(element => {

  // when the user clicks on a category
  element.addEventListener('mouseover', function () {
    active = element;
    tabid = active.getAttribute('href').replace('#', '');
    it.id = tabid;
    it.classList.add('show');
    
    element.addEventListener('click', function () { 
      fetch_data();
    });
  });
});




function fetch_data2() {
  return new Promise(function (resolve, reject) {
    $.ajax({
      
      
      url: "showfav.php",
      method: "POST",
      data: { id: 1 },
      success: function (data) {
        resolve(data);
      },
      error: function (data) {
        reject(data);
      }
    });
  });
}

fetch_data2();
    
    
    
    function fetch_data(page) {
      let container = document.querySelector('.container2');
      $.ajax({
        url: "pagination.php",
        method: "POST",
        headers: {
          'Cache-Control': 'max-age=31536000'
        },
        data: { page: page, category: active.innerHTML  },
        
        
        success: function (data) {
            
           
          // makaing the returned data into a dom object
          let two = new DOMParser().parseFromString(data, "text/html");
                
          globalThis.itemSize = two.querySelectorAll('.fa-heart').length;
          // getting the heart icons from the dom object
          globalThis.fav = two.querySelectorAll('.fa-heart');
          
          // getting the json array from the dom object
          let array = two.querySelector('jsontag');
              
          spinnder.style.display = "none";
          // making the json array global which is the array of favorties items 
          globalThis.jsonarray = JSON.parse(array.textContent);
          
          $('.itemsgrid').html(two.querySelectorAll('.card'));
         
         

            
          //prevent the pagination from being duplicated
          if (container != null)
            if (container.hasChildNodes(two.querySelector('.pagination'))) {
              container.removeChild(container.lastChild);
              container.appendChild(two.querySelector('.pagination'));
            }
          
            
   
        }
       
      });
    };
    
    if(active != null)
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
      
      globalThis.digitid = +id.match(/\d+/g); 
      console.log(+digitid);
      
      // get the items from the json array
      
      const currentTime = new Date().getTime();
      if (currentTime - lastClickTime < 600) {
        return; // Ignore the click if it was too soon after the last one
      }
      
      pressed(heart[0]);
      console.log("clicked");
      lastClickTime = currentTime;
    
    });

  
    // adding items to the favorites list and also removing them from the list
    
    function pressed(heart) {
    
      
      if (heart.classList.contains("fa-regular")) {
      
        heart.classList.toggle("fa-bounce");
        // make it move for 1 second
        setTimeout(function () {
          heart.classList.toggle("fa-bounce");
        }, 1000);
        
        heart.classList.remove("fa-regular");
        heart.classList.add("fa-solid");
        if (isNaN(digitid) == true) {
        
            console.log(test);
        }
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
    
    
    // removing or adding the hearts icons on items when the page loads
    function ifINFavorites(fav) {
    
      let heart = fav;
      let heartarray = Array.from(heart);
      globalThis.array = [] ;
    
      for( let i = 0 ; i < jsonarray.length ; i++){
            array.push(+jsonarray[i]);
      }
      console.log();
      for(let i = 0; i < itemSize; i++){
        if (array.includes(+heartarray[i].id.match(/\d+/g))) {
          heartarray[i].classList.remove("fa-regular");
          heartarray[i].classList.add("fa-solid");
        }
      }
      
    }
    
function ifINFavorites2(fav2 , data) {
      
        let heart = fav2;
        let heartarray = Array.from(heart);
        let jsonarray = JSON.parse(data);
        globalThis.array = [] ;
        console.log(jsonarray);
        for( let i = 0 ; i < jsonarray.length ; i++){
              array.push(+jsonarray[i]);
        }
       
        for(let i = 0; i < heart.length; i++){
          if (array.includes(+heartarray[i].id.match(/\d+/g))) {
            heartarray[i].classList.remove("fa-regular");
            heartarray[i].classList.add("fa-solid");
          }else{
            heartarray[i].classList.remove("fa-solid");
            heartarray[i].classList.add("fa-regular");
          }
        }
    
}


  
  $(document).ajaxComplete(function () {
    try {
      ifINFavorites(fav);
    } catch (err) {
      if(err instanceof ReferenceError){
        console.log("it's fine")
      }else{
            console.log(err);

      }
    }
  });
  
fetch_data2().then(function(data) {
  
  ifINFavorites2(test, data);
  
}).catch(function(error) {
  console.log(error);
});
      


  
function pointerOnMouseOver(itemtochange1) {
  let itemtochange = itemtochange1;
  itemtochange.style.cursor = 'pointer';
}
function pointerRemoveforcart(itemtochange1) {
  let itemtochange = itemtochange1;
  itemtochange.style.cursor = 'default';
}


// on hover change the cursor to pointer for the passed item


 
$(document).on('mouseover', '#cart', function () {
  pointerOnMouseOver(this);

});



    function addOrMinusItemQuantity() {
      $(document).on('click', '.addbtn', function () {
        let input = $(this).parent().parent().find('input');
        if (input.val() >= 100) {
          input.val(100);
        } else {
          input.val(parseInt(input.val()) + 1);
        } 
        
      });
      
      $(document).on('click', '.minusbtn', function () {
          let input = $(this).parent().parent().find('input');
        if (input.val() <= 1) {
          input.val(1);
        } else {
                  
          input.val(parseInt(input.val()) - 1);
      
        }
      });

    }


    addOrMinusItemQuantity();
// on click show the items in the cart 

// make it as a function so that it can be called from the modal
function showitemsincart() {
  let digito = 1;
  
  let modle = document.querySelector('.modal-body');
 
  try {
    globalThis.valOfInputInItemPage = document.querySelector('.input-group').querySelector('input').value;
    
  } catch (err) { 
    if (err instanceof TypeError) {
      valOfInputInItemPage = null;
    }else{
      console.log(err);
    }
    console.log(err);
  }
  
  
  console.log(valOfInputInItemPage);
   
  if(valOfInputInItemPage != null) {

      $.ajax({
    
   
      url: "showitemINCART.php",
      method: "POST",
      data: { id: digito , val: valOfInputInItemPage },
      success: function (data) {
        console.log(data);
        let dataToDom = new DOMParser().parseFromString(data, "text/html");
        let dataToDom2 = dataToDom.querySelectorAll('.card');
        let header = dataToDom.querySelector('.empty');
            
          
        if (dataToDom2.length == 0) {
          $('.list-group').html(data);
               
        } else {
              
          $('.list-group').html(dataToDom2);
              
        }
            
      },
      error: function (data) {
        console.log("error");
      }
    });
    
    
  } else {
      
      
        $.ajax({
    
   
        url: "showitemINCART.php",
        method: "POST",
        data: { id: digito },
        success: function (data) {
        console.log(data);
        let dataToDom = new DOMParser().parseFromString(data, "text/html");
        let dataToDom2 = dataToDom.querySelectorAll('.card');
        let header = dataToDom.querySelector('.empty');
            
          
        if (dataToDom2.length == 0) {
          $('.list-group').html(data);
               
        } else {
              
          $('.list-group').html(dataToDom2);
              
        }
            
      },
      error: function (data) {
        console.log("error");
      }
    });
    
    
    
    
  }
}









// on hover change the cursor to pointer for the passed item
$(document).on('mouseover', '.card-textRemove', function () {
      pointerOnMouseOver(this);
});

  
$(document).on('click', '.card-textRemove', function () {
  
  let id = $(this).attr("id");
  let digit = +id.match(/\d+/g); 
  let item = $(this);
    
  $.ajax({
    url: "RemoveFromCart.php",
    method: "POST",
    data: { id: digit },
    caches: false,
    success: function (data) {
      console.log(data);
      showitemsincart();
    }
  });
});



$(document).on('click', '[name="addbutton"]', function () {
  let spn = document.querySelector('.spinner-border');
 
  
  if(spn != null)
  spn.style.display = "block";
  let id = $(this).attr("id");
  let digit = +id.match(/\d+/g);
          
  $.ajax({
    url: "AddToCart.php",
    method: "POST",
    data: { id: digit },
    success: function (data) {
      showitemsincart();
      console.log(data);
    }
          
  });
});


 showitemsincart();