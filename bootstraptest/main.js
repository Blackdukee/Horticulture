 let next = document.getElementById('next');
              let previous = document.getElementById('Previous');
              let pagination = document.getElementsByClassName('pagination')[0];
              
              
              console.log( pagination.getElementsByTagName('li')[1])
              //active li on click
              let li = pagination.getElementsByTagName('li');
              let lilink = pagination.getElementsByTagName('a');
              
              for(let i = 1; i < li.length-1; i++){
                li[i].onclick = function(){
                  for(let j = 1; j < li.length-1; j++){
                    li[j].classList.remove('active');
                  }
                  li[i].classList.add('active');
                }
              }
              next.onclick = function(){
                let active = document.getElementsByClassName('active')[0];
           
                let next = active.nextElementSibling;
                
                if(next){
                  if(next == pagination.getElementsByTagName('li')[pagination.getElementsByTagName('li').length-1]){
                  
                    next.classList.add('disabled');
                    
                  }else{
                    active.classList.remove('active');
                    next.classList.add('active');

                  }
                        next.classList.remove('disabled');
                }
                if(next){
                pagination.getElementsByTagName('li')[0].classList.remove('disabled');
                
               }}
              previous.onclick = function(){
                let active = document.getElementsByClassName('active')[0];
                let previous = active.previousElementSibling;
                if(previous){
                  if(previous == pagination.getElementsByTagName('li')[0]){
                  
                    previous.classList.add('disabled');
                    
                    }else{
                    
                    active.classList.remove('active');
                    previous.classList.add('active');
                  
                    }
                      previous.classList.remove('disabled');
                }
              }